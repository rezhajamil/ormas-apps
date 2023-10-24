<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TerritoryController extends Controller
{
    public function get_kecamatan(Request $request)
    {
        $kecamatan = DB::table('territory')->select('kecamatan')->where('kabupaten', $request->kabupaten)->distinct()->get();

        return response()->json($kecamatan);
    }
}
