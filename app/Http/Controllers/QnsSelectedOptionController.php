<?php

namespace App\Http\Controllers;

use App\Models\QnsSelectedOption;
use Illuminate\Http\Request;

class QnsSelectedOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QnsSelectedOption  $qnsSelectedOption
     * @return \Illuminate\Http\Response
     */
    public function show(QnsSelectedOption $qnsSelectedOption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QnsSelectedOption  $qnsSelectedOption
     * @return \Illuminate\Http\Response
     */
    public function edit(QnsSelectedOption $qnsSelectedOption)
    {
        $selected = QnsSelectedOption::with(['question.option', 'question.qns', 'response'])->where('id', $qnsSelectedOption->id)->first();

        if ($selected->question->type == 'kotak_centang') {
            $checkbox = [];
            $answer = QnsSelectedOption::where('response_id', $selected->response->id)->where('question_id', $selected->question_id)->get();

            foreach ($answer as $key => $ans) {
                array_push($checkbox, $ans->option_id);
            }
        } else {
            $checkbox = [];
        }

        return view('dashboard.qns_selected_option.edit', compact('selected', 'checkbox'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QnsSelectedOption  $qnsSelectedOption
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QnsSelectedOption $qnsSelectedOption)
    {
        // ddd($request);

        $selected = QnsSelectedOption::with(['question.qns', 'response'])->find($qnsSelectedOption->id);
        if ($request->option) {
            $selected->option_id = $request->option;
            $selected->other_text = null;
            $selected->save();
        } else if ($request->other_text) {
            $selected->option_id = null;
            $selected->other_text = $request->other_text;
            $selected->save();
        } else if ($request->options) {
            QnsSelectedOption::where('response_id', $selected->response->id)->where('question_id', $selected->question_id)->delete();

            foreach ($request->options as $key => $option) {
                QnsSelectedOption::create(
                    [
                        'response_id' => $selected->response->id,
                        'question_id' => $selected->question_id,
                        'option_id' => $option,
                        'other_text' => NULL,
                    ]
                );
            }
        } else {
            $request->validate([
                'options' => ['required']
            ]);
        }

        return redirect()->route('qns.result_detail', $selected->question->qns->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QnsSelectedOption  $qnsSelectedOption
     * @return \Illuminate\Http\Response
     */
    public function destroy(QnsSelectedOption $qnsSelectedOption)
    {
        //
    }
}
