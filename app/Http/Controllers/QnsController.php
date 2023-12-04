<?php

namespace App\Http\Controllers;

use App\Models\Qns;
use App\Models\QnsOption;
use App\Models\QnsQuestion;
use App\Models\QnsResponse;
use App\Models\QnsSelectedOption;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QnsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = 'qns';

        $qns = Qns::getAll();

        return view('dashboard.qns.index', compact('menu', 'qns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $menu = 'qns';

        if ($request->type == 'survey') {
            return view('dashboard.qns.create_survey', compact('menu'));
        } else if ($request->type == 'quiz') {
            return view('dashboard.qns.create_quiz', compact('menu'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->type == 'survey') {

            $request->validate([
                'name' => ['required', 'string'],
                'start_date' => ['date', 'nullable'],
                'end_date' => ['date', 'nullable'],
                'question' => ['required'],
                'type' => ['required'],
                'option' => ['required'],
            ]);

            $qns = Qns::create([
                'creator_id' => auth()->user()->id,
                'type' => $request->type,
                'name' => ucwords($request->name),
                'description' => $request->description,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'status' => 1,
            ]);

            $start = 0;

            foreach ($request->question as $k_question => $d_question) {

                $question = QnsQuestion::create([
                    'qns_id' => $qns->id,
                    'type' => $request->question_type[$k_question],
                    'text' => $d_question,
                ]);

                for ($i = $start; $i < $start + $request->option_count[$k_question]; $i++) {
                    $option = QnsOption::create([
                        'question_id' => $question->id,
                        'text' => $request->option[$i],
                    ]);
                }
                $start += $request->option_count[$k_question];
            }
        } else if ($request->type == 'quiz') {
            $request->validate([
                'name' => ['required', 'string'],
                'duration' => ['required', 'numeric'],
                'start_date' => ['date', 'nullable'],
                'end_date' => ['date', 'nullable'],
                'question' => ['required'],
                'option' => ['required'],
            ]);
            // ddd($request);

            $qns = Qns::create([
                'creator_id' => auth()->user()->id,
                'type' => $request->type,
                'name' => ucwords($request->name),
                'duration' => $request->duration,
                'description' => $request->description,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'status' => 1,
            ]);

            $start = 0;
            $correct_ans = [];

            for ($i = 1; $i <= count($request->question); $i++) {
                $var = "correct_option_$i";
                array_push($correct_ans, $request->{"$var"});
            }

            // ddd($correct_ans);

            foreach ($request->question as $k_question => $d_question) {

                $question = QnsQuestion::create([
                    'qns_id' => $qns->id,
                    'type' => 'pilgan',
                    'text' => $d_question,
                ]);

                for ($i = $start; $i < $start + $request->option_count[$k_question]; $i++) {
                    $option = QnsOption::create([
                        'question_id' => $question->id,
                        'text' => $request->option[$i],
                    ]);

                    if (in_array($i, $correct_ans)) {
                        QnsQuestion::where('id', $question->id)->update([
                            'correct_option' => $option->id
                        ]);
                    }
                }
                $start += $request->option_count[$k_question];
            }
        }


        return redirect()->route('qns.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Qns  $qns
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = 'qns';
        $qns = Qns::with(['creator', 'question.option.correct_option', 'response'])->find($id);
        // ddd($qns->question[0]->option[0]);
        if ($qns->type == 'survey') {
            return view('dashboard.qns.show_survey', compact('menu', 'qns'));
        } else if ($qns->type == 'quiz') {
            return view('dashboard.qns.show_quiz', compact('menu', 'qns'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Qns  $qns
     * @return \Illuminate\Http\Response
     */
    public function edit(Qns $qns)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Qns  $qns
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Qns $qns)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Qns  $qns
     * @return \Illuminate\Http\Response
     */
    public function destroy(Qns $qns)
    {
        //
    }

    public function answer(Request $request, $id)
    {
        if (isset($request->user)) {
            $user = User::where('username', $request->user)->first();
        } else {
            $user = auth()->user();
        }
        // ddd($request->user);

        $qns = Qns::with(['creator', 'question.option', 'response'])->find($id);
        $history = QnsResponse::where('qns_id', $id)->where('id_digipos', $user->id_digipos)->first();

        if ($qns->type == 'survey') {
            return view('home.qns.answer_survey', compact('user', 'qns', 'history'));
        } else if ($qns->type == 'quiz') {
            if ($request->start) {
                if (!$history) {
                    $history = QnsResponse::create([
                        'qns_id' => $qns->id,
                        'user_id' => $user->id,
                        'telp_responder' => $user->telp,
                        'telp' => $user->telp,
                        'time_start' => now(),
                        'finish' => 0,
                    ]);
                }
            }

            $correct_count = QnsSelectedOption::join('qns_questions', 'qns_selected_options.option_id', '=', 'qns_questions.correct_option')
                ->where('qns_selected_options.response_id', $history->id ?? '')
                ->count();

            // ddd($correct_count);

            return view('home.qns.answer_quiz', compact('user', 'qns', 'history', 'correct_count'));
        }
    }

    public function store_answer(Request $request, $id)
    {
        $qns = Qns::with(['creator', 'question.option', 'response'])->find($id);
        if (isset($request->user)) {
            $user = User::where('username', $request->user)->first();
        } else {
            $user = auth()->user();
        }

        if ($qns->type == 'survey') {

            $history = QnsResponse::where('qns_id', $id)->where('id_digipos', $request->id_digipos)->whereMonth('created_at', date('m'))->count();

            if ($history) {
                return redirect()->route('qns.answer', $id)->with('error', 'Outlet Ini Sudah Pernah Mengisi Survey Bulan Ini');
            }

            $response = QnsResponse::create([
                'qns_id' => $qns->id,
                'id_digipos' => $request->id_digipos,
                'telp_responder' => $request->telp,
                'telp' => $request->telp,
                'user_id' => $user->id,
                'time_start' => now(),
                'finish' => 1,
            ]);



            foreach ($qns->question as $k_question => $d_question) {
                $selected_option = "selected_option_$k_question";
                $other_text = "other_text_$k_question";
                $answer = $request->{$selected_option};
                $answer_text = $request->{$other_text};

                if (is_array($answer)) {
                    foreach ($answer as $k_ans => $d_answer) {
                        QnsSelectedOption::create([
                            'response_id' => $response->id,
                            'question_id' => $d_question->id,
                            'option_id' => $d_answer,
                            'other_text' => null,
                        ]);
                    }
                } else {
                    if ($answer != null) {
                        QnsSelectedOption::create([
                            'response_id' => $response->id,
                            'question_id' => $d_question->id,
                            'option_id' => $answer,
                            'other_text' => null,
                        ]);
                    } else {
                        QnsSelectedOption::create([
                            'response_id' => $response->id,
                            'question_id' => $d_question->id,
                            'option_id' => null,
                            'other_text' => $answer_text,
                        ]);
                    }
                }
            }


            return redirect()->route('qns.answer', ['id' => $id, 'user' => $user->username])->with('success', 'Terimakasih Sudah Mengisi Survey');
        } else if ($qns->type == 'quiz') {
            $response = QnsResponse::where('qns_id', $qns->id)->where('user_id', $user->id)->first();
            $response->update([
                'finish' => 1,
            ]);

            foreach ($qns->question as $k_question => $d_question) {
                $selected_option = "selected_option_$k_question";
                $answer = $request->{$selected_option};

                QnsSelectedOption::create([
                    'response_id' => $response->id,
                    'question_id' => $d_question->id,
                    'option_id' => $answer,
                    'other_text' => null,
                ]);
            }

            return redirect()->route('qns.answer', ['id' => $id, 'user' => $user->username])->with('success', 'Terimakasih Sudah Mengerjakan Quiz');
        }
    }

    public function result(Request $request, $id)
    {
        $qns = Qns::with(['creator', 'question.option.correct_option', 'question.option.selected_option', 'response.responder', 'response.selected_option.question', 'response.selected_option.option.correct_option'])->find($id);

        $resume = QnsResponse::select('cluster', DB::raw('count(user_id) as count'))->join('users', 'qns_responses.user_id', '=', 'users.id')->where('qns_id', $id)->groupBy('cluster')->orderBy('cluster')->orderBy('users.name')->get();


        if ($qns->type == 'survey') {
            return view('dashboard.qns.result_survey', compact('qns', 'resume'));
        } else if ($qns->type == 'quiz') {
            $result = QnsResponse::select('cluster', 'users.name', DB::raw('count(correct_option) as correct'))
                ->join('qns_selected_options', 'qns_selected_options.response_id', '=', 'qns_responses.id')
                ->join('qns_questions', 'qns_selected_options.option_id', '=', 'qns_questions.correct_option')
                ->join('users', 'qns_responses.user_id', '=', 'users.id')
                ->join('qns', 'qns.id', '=', 'qns_responses.qns_id')
                ->where('qns_responses.qns_id', $id)
                ->groupBy('cluster')
                ->groupBy('users.name')
                ->orderBy('cluster')
                ->orderBy('users.name')
                ->get();

            // ddd($result);

            return view('dashboard.qns.result_quiz', compact('qns', 'resume', 'result'));
        }
    }

    public function result_detail(Request $request, $id)
    {
        $qns = Qns::with(['creator', 'question.option.correct_option', 'question.option.selected_option', 'response.responder', 'response.selected_option.option'])->where('id', $id)->first();

        // ddd($qns);

        return view('dashboard.qns.result_detail_survey', compact('qns'));
    }
}
