<?php

namespace App\Http\Controllers;

use App\Models\QnsResponse;
use App\Models\QnsSelectedOption;
use Illuminate\Http\Request;

class QnsResponseController extends Controller
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
     * @param  \App\Models\QnsResponse  $qnsResponse
     * @return \Illuminate\Http\Response
     */
    public function show(QnsResponse $qnsResponse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QnsResponse  $qnsResponse
     * @return \Illuminate\Http\Response
     */
    public function edit(QnsResponse $qnsResponse)
    {
        $response = QnsResponse::with(['qns.question.option', 'selected_option.option'])->where('id', $qnsResponse->id)->first();

        // ddd($response);
        return view('dashboard.qns_response.edit', compact('response'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QnsResponse  $qnsResponse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QnsResponse $qnsResponse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QnsResponse  $qnsResponse
     * @return \Illuminate\Http\Response
     */
    public function destroy(QnsResponse $qnsResponse)
    {
        $selected = QnsSelectedOption::where('response_id', $qnsResponse->id)->delete();

        $response = $qnsResponse->delete();

        return back();
    }
}
