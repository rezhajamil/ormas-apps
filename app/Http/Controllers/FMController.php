<?php

namespace App\Http\Controllers;

use App\Models\FM;
use Illuminate\Http\Request;

class FMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $start_date = $request->start_date ?? '';
        $end_date = $request->end_date ?? '';

        $fms = Fm::select('fm.*', 'outlets.nama_outlet')->join('outlets', 'fm.id_outlet', '=', 'outlets.id_outlet', 'left')->whereBetween('date', [$start_date, $end_date])->orderBy('fm.created_at', 'DESC')->paginate(500);
        $jenis = Fm::select('jenis')->orderBy('jenis')->distinct()->get();
        $produk = Fm::select('produk')->orderBy('produk')->distinct()->get();

        return view('dashboard.fm.index', compact('fms', 'jenis', 'produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis = Fm::select('jenis')->orderBy('jenis')->distinct()->get();
        $produk = Fm::select('produk')->orderBy('produk')->distinct()->get();

        return view('dashboard.fm.create', compact('jenis', 'produk'));
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
                    $correct = ['id_outlet', 'trx', 'rev', 'jenis', 'produk', 'date'];
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
                        'id_outlet' => $row[0],
                        'trx' => $row[1],
                        'rev' => $row[2],
                        'jenis' => strtoupper($row[3]),
                        'produk' => strtoupper($row[4]),
                        'date' => date('Y-m-d', strtotime($row[5]))
                    ];


                    // ddd($row);
                    if ($idx < 1001) {
                        // echo '<pre>' . $idx . var_export($data, true) . '</pre>';
                        $fm = Fm::create($data);
                        // ddd($fm);
                    } else if ($idx > 1001) {
                        break;
                    }
                    $idx++;
                }
            }
        } else {
            $request->validate([
                'id_outlet' => ['required', 'numeric'],
                'transaksi' => ['required', 'numeric'],
                'revenue' => ['required', 'numeric'],
                'jenis' => ['required'],
                'produk' => ['required'],
                'date' => ['required']
            ]);

            $fm = Fm::create([
                'id_outlet' => $request->id_outlet,
                'trx' => $request->transaksi,
                'rev' => $request->revenue,
                'jenis' => strtoupper($request->jenis),
                'produk' => strtoupper($request->produk),
                'date' => date('Y-m-d', strtotime($request->date)),
            ]);
        }

        return redirect()->route('fm.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fm  $fm
     * @return \Illuminate\Http\Response
     */
    public function show(Fm $fm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fm  $fm
     * @return \Illuminate\Http\Response
     */
    public function edit(Fm $fm)
    {
        $jenis = Fm::select('jenis')->orderBy('jenis')->distinct()->get();
        $produk = Fm::select('produk')->orderBy('produk')->distinct()->get();

        return view('dashboard.fm.edit', compact('fm', 'jenis', 'produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fm  $fm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fm $fm)
    {
        $request->validate([
            'id_outlet' => ['required', 'numeric'],
            'transaksi' => ['required', 'numeric'],
            'revenue' => ['required', 'numeric'],
            'jenis' => ['required'],
            'produk' => ['required'],
            'date' => ['required']
        ]);

        $fm->id_outlet = $request->id_outlet;
        $fm->trx = $request->transaksi;
        $fm->rev = $request->revenue;
        $fm->jenis = strtoupper($request->jenis);
        $fm->produk = strtoupper($request->produk);
        $fm->date = date('Y-m-d', strtotime($request->date));
        $fm->save();

        return redirect()->route('fm.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fm  $fm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fm $fm)
    {
        $fm->delete();

        return back();
    }
}
