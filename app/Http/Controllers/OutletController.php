<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outlets = Outlet::orderBy('kabupaten')->orderBy('kecamatan')->orderBy('nama_outlet')->get();

        return view('dashboard.outlet.index', compact('outlets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $taps = Outlet::select('tap_kcp')->distinct()->orderBy('tap_kcp')->get();
        $kabupaten = DB::table('territory')->select('kabupaten')->where('cluster', 'SOLOK SAWAH LUNTO')->distinct()->get();
        $kategori = ['PLATINUM', 'GOLD', 'SILVER', 'BRONZE'];
        $pareto = ['PARETO', 'NON'];
        $frekuensi = ['F1', 'F2', 'F3', 'F4'];
        $hari = ['SENIN', 'SELASA', 'RABU', 'KAMIS', 'JUMAT', 'SABTU'];
        $fisik = ['FISIK', 'NON FISIK'];
        $pjp = ['PJP', 'NON PJP'];
        $lighthouse = ['YES', 'NO'];

        return view('dashboard.outlet.create', compact('taps', 'kabupaten', 'kategori', 'pareto', 'frekuensi', 'hari', 'fisik', 'pjp', 'lighthouse'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('csv')) {
            $request->validate([
                'csv' => ['required', 'file']
            ]);

            if (file_exists($request->csv)) {
                $file = fopen($request->csv, "r");

                $idx = 0;

                $get_row = fgetcsv($file, 10000, ";");
                // ddd($get_row);
                if (count($get_row) <= 20) {
                    $header = str_split($get_row[0]);
                    $correct = ['no_rs', 'id_outlet', 'nama_outlet', 'telp_pemilik', 'nama_sf', 'branch', 'sub_branch', 'cluster', 'kabupaten', 'kecamatan', 'tap_kcp', 'side_id_cover', 'kategori', 'pareto', 'frekuensi_kunjungan', 'hari_kunjungan', 'remark_fisik', 'pjp', 'kecamatan_lighthouse', 'hrc_index'];
                    foreach ($get_row as $key => $col) {
                        // ddd($header);
                        if ($col != $correct[$key]) {
                            $col_num = $key + 1;
                            $col_correct = $correct[$key];
                            return back()->withErrors(['csv' => "Header kolom ke $col_num seharusnya $col_correct bukan $col"])->withInput();
                        }
                    }
                }

                while (($row = fgetcsv($file, 10000, ";")) !== FALSE) {

                    $data = [
                        'no_rs' => $row[0],
                        'id_outlet' => $row[1],
                        'nama_outlet' => $row[2],
                        'telp_pemilik' => $row[3],
                        'nama_sf' => $row[4],
                        'branch' => $row[5],
                        'sub_branch' => $row[6],
                        'cluster' => $row[7],
                        'kabupaten' => $row[8],
                        'kecamatan' => $row[9],
                        'tap_kcp' => $row[10],
                        'side_id_cover' => $row[11],
                        'kategori' => $row[12],
                        'pareto' => $row[13],
                        'frekuensi_kunjungan' => $row[14],
                        'hari_kunjungan' => $row[15],
                        'remark_fisik' => $row[16],
                        'pjp' => $row[17],
                        'kecamatan_lighthouse' => $row[18],
                        'hrc_index' => $row[19],
                        'status' => 1,
                    ];


                    // ddd($row);
                    if ($idx < 1001) {
                        // echo '<pre>' . $idx . var_export($data, true) . '</pre>';
                        $outlet = Outlet::create($data);
                        // ddd($outlet);
                    } else if ($idx > 1001) {
                        break;
                    }
                    $idx++;
                }
            }
        }
        return redirect()->route('outlet.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function show(Outlet $outlet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function edit(Outlet $outlet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Outlet $outlet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outlet $outlet)
    {
        //
    }

    public function change_status($id)
    {
        $outlet = Outlet::find($id);
        $outlet->status = !$outlet->status;
        $outlet->save();

        return back();
    }
}
