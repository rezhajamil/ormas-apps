<?php

namespace App\Http\Controllers;

use App\Models\Qns;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $quiz = Qns::where('type', 'quiz')->where('status', 1)->get();
        $survey = Qns::where('type', 'survey')->where('status', 1)->get();

        return view('home.index', compact('user', 'quiz', 'survey'));
    }
}
