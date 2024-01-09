<?php

namespace App\Http\Controllers;

use App\Models\DetailOutlet;
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
        $outlets = Outlet::orderBy('kabupaten')->orderBy('kecamatan')->orderBy('nama_outlet')->paginate(500);

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
        ini_set('memory_limit', -1);
        ini_set('max_execution_time', '0');
        if ($request->hasFile('csv')) {
            $request->validate([
                'csv' => ['required', 'file']
            ]);

            if (file_exists($request->csv)) {
                $file = fopen($request->csv, "r");

                $idx = 0;

                $get_row = fgetcsv($file, 200000);

                $possible_delimiters = [',', ';', '|'];

                $detected_delimiter = null;

                foreach ($possible_delimiters as $delimiter) {
                    if (count(str_getcsv($get_row[0], $delimiter)) >= 1) {
                        // die($delimiter);
                        $detected_delimiter = $delimiter;
                        break;
                    }
                }

                if (!$detected_delimiter) {
                    fclose($file);
                    return back()->withErrors(['csv' => 'Unable to detect the delimiter.'])->withInput();
                }

                // Use the detected delimiter for further processing
                rewind($file);

                // ddd($get_row);
                // if (count($get_row) <= 20) {
                //     $header = str_split($get_row[0]);
                //     $correct = ['no_rs', 'id_outlet', 'nama_outlet', 'telp_pemilik', 'nama_sf', 'branch', 'sub_branch', 'cluster', 'kabupaten', 'kecamatan', 'tap_kcp', 'side_id_cover', 'kategori', 'pareto', 'frekuensi_kunjungan', 'hari_kunjungan', 'remark_fisik', 'pjp', 'kecamatan_lighthouse', 'hrc_index'];
                //     foreach ($get_row as $key => $col) {
                //         // ddd($header);
                //         if ($col != $correct[$key]) {
                //             $col_num = $key + 1;
                //             $col_correct = $correct[$key];
                //             return back()->withErrors(['csv' => "Header kolom ke $col_num seharusnya $col_correct bukan $col"])->withInput();
                //         }
                //     }
                // }

                while (($row = fgetcsv($file, 200000, $detected_delimiter)) !== FALSE) {

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
                    if ($idx < 20001) {
                        // echo '<pre>' . $idx . var_export($data, true) . '</pre>';
                        if ($idx > 0) {
                            $outlet = Outlet::create($data);
                        } else {
                            DB::table('outlets')->truncate();
                        }
                        // ddd($outlet);
                    } else if ($idx > 20001) {
                        break;
                    }
                    $idx++;
                }
            }
        } else {
            $request->validate([
                'kabupaten' => ['required'],
                'kecamatan' => ['required'],
                'no_rs' => ['required', 'numeric'],
                'id_outlet' => ['required', 'numeric'],
                'nama_outlet' => ['required'],
                'telp_pemilik' => ['nullable', 'numeric'],
                'nama_sf' => ['nullable'],
                'tap_kcp' => ['nullable'],
                'side_id_cover' => ['nullable'],
                'kategori' => ['nullable'],
                'pareto' => ['nullable'],
                'frekuensi_kunjungan' => ['nullable'],
                'hari_kunjungan' => ['nullable'],
                'remark_fisik' => ['nullable'],
                'pjp' => ['nullable'],
                'kecamatan_lighthouse' => ['nullable'],
                'hrc_index' => ['nullable'],
            ]);

            $outlet = Outlet::create([
                'kabupaten' => $request->kabupaten,
                'kecamatan' => $request->kecamatan,
                'no_rs' => $request->no_rs,
                'id_outlet' => $request->id_outlet,
                'nama_outlet' => strtoupper($request->nama_outlet),
                'telp_pemilik' => $request->telp_pemilik,
                'nama_sf' => strtoupper($request->nama_sf),
                'tap_kcp' => strtoupper($request->tap_kcp),
                'side_id_cover' => strtoupper($request->side_id_cover),
                'kategori' => strtoupper($request->kategori),
                'pareto' => strtoupper($request->pareto),
                'frekuensi_kunjungan' => strtoupper($request->frekuensi_kunjungan),
                'hari_kunjungan' => strtoupper($request->hari_kunjungan),
                'remark_fisik' => strtoupper($request->remark_fisik),
                'pjp' => strtoupper($request->pjp),
                'kecamatan_lighthouse' => strtoupper($request->kecamatan_lighthouse),
                'hrc_index' => strtoupper($request->hrc_index),
            ]);
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
        $taps = Outlet::select('tap_kcp')->distinct()->orderBy('tap_kcp')->get();
        $kabupaten = DB::table('territory')->select('kabupaten')->where('cluster', 'SOLOK SAWAH LUNTO')->distinct()->get();
        $kecamatan = DB::table('territory')->select('kecamatan')->where('kabupaten', $outlet->kabupaten)->distinct()->get();
        $kategori = ['PLATINUM', 'GOLD', 'SILVER', 'BRONZE'];
        $pareto = ['PARETO', 'NON'];
        $frekuensi = ['F1', 'F2', 'F3', 'F4'];
        $hari = ['SENIN', 'SELASA', 'RABU', 'KAMIS', 'JUMAT', 'SABTU'];
        $fisik = ['FISIK', 'NON FISIK'];
        $pjp = ['PJP', 'NON PJP'];
        $lighthouse = ['YES', 'NO'];

        return view('dashboard.outlet.edit', compact('outlet', 'taps', 'kabupaten', 'kecamatan', 'kategori', 'pareto', 'frekuensi', 'hari', 'fisik', 'pjp', 'lighthouse'));
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
        $request->validate([
            'kabupaten' => ['required'],
            'kecamatan' => ['required'],
            'no_rs' => ['required', 'numeric'],
            'id_outlet' => ['required', 'numeric'],
            'nama_outlet' => ['required'],
            'telp_pemilik' => ['nullable', 'numeric'],
            'nama_sf' => ['nullable'],
            'tap_kcp' => ['nullable'],
            'side_id_cover' => ['nullable'],
            'kategori' => ['nullable'],
            'pareto' => ['nullable'],
            'frekuensi_kunjungan' => ['nullable'],
            'hari_kunjungan' => ['nullable'],
            'remark_fisik' => ['nullable'],
            'pjp' => ['nullable'],
            'kecamatan_lighthouse' => ['nullable'],
            'hrc_index' => ['nullable'],
        ]);

        $outlet->kabupaten = $request->kabupaten;
        $outlet->kecamatan = $request->kecamatan;
        $outlet->no_rs = $request->no_rs;
        $outlet->id_outlet = $request->id_outlet;
        $outlet->nama_outlet = strtoupper($request->nama_outlet);
        $outlet->telp_pemilik = $request->telp_pemilik;
        $outlet->nama_sf = strtoupper($request->nama_sf);
        $outlet->tap_kcp = strtoupper($request->tap_kcp);
        $outlet->side_id_cover = strtoupper($request->side_id_cover);
        $outlet->kategori = strtoupper($request->kategori);
        $outlet->pareto = strtoupper($request->pareto);
        $outlet->frekuensi_kunjungan = strtoupper($request->frekuensi_kunjungan);
        $outlet->hari_kunjungan = strtoupper($request->hari_kunjungan);
        $outlet->remark_fisik = strtoupper($request->remark_fisik);
        $outlet->pjp = strtoupper($request->pjp);
        $outlet->kecamatan_lighthouse = strtoupper($request->kecamatan_lighthouse);
        $outlet->hrc_index = strtoupper($request->hrc_index);
        $outlet->save();

        return redirect()->route('outlet.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outlet $outlet)
    {
        $outlet->delete();

        return back();
    }

    public function change_status($id)
    {
        $outlet = Outlet::find($id);
        $outlet->status = !$outlet->status;
        $outlet->save();

        return back();
    }

    public function get_outlet(Request $request)
    {
        $outlets = Outlet::where('nama_outlet', 'like', '%' . $request->search . '%')->orWhere('id_outlet', 'like', '%' . $request->search . '%')->orderBy('nama_outlet')->limit(5)->get();

        return response()->json($outlets);
    }

    public function get_outlet_by_digipos(Request $request)
    {
        $outlet = Outlet::where('id_outlet', $request->search)->first();

        return response()->json($outlet);
    }

    public function detail(Request $request, $id_outlet)
    {
        $start_date = $request->start_date ?? date('Y-m-01');
        $date = $request->date ?? date('Y-m-d');

        $outlet = Outlet::where('id_outlet', $id_outlet)->where('status', 1)->orderBy('id', 'DESC')->first();

        $detail = Outlet::detail_mobile($id_outlet, $date);

        // ddd($detail[0]);

        return view('dashboard.outlet.detail', compact('detail', 'outlet', 'start_date', 'date'));
    }
}
