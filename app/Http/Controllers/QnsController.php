<?php

namespace App\Http\Controllers;

use App\Models\Qns;
use App\Models\QnsOption;
use App\Models\QnsQuestion;
use Illuminate\Http\Request;

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
        $request->validate([
            'name' => ['required', 'string'],
            'start_date' => ['date', 'nullable'],
            'end_date' => ['date', 'nullable'],
            'question' => ['required'],
            'type' => ['required'],
            'option' => ['required'],
        ]);

        // ddd($request);

        $qns = Qns::create([
            'creator_id' => auth()->user()->id,
            'type' => $request->type,
            'name' => $request->name,
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
        $qns = Qns::with(['creator', 'question.option', 'response'])->find($id);
        // ddd($qns);
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
}
