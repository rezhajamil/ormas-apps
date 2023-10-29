<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
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

        $results = Result::select('results.*', 'outlets.nama_outlet')->join('outlets', 'results.id_outlet', '=', 'outlets.id_outlet', 'left')->whereBetween('date', [$start_date, $end_date])->orderBy('results.created_at', 'DESC')->paginate(500);
        $jenis = Result::select('jenis')->orderBy('jenis')->distinct()->get();
        $produk = Result::select('produk')->orderBy('produk')->distinct()->get();

        return view('dashboard.result.index', compact('results', 'jenis', 'produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis = Result::select('jenis')->orderBy('jenis')->distinct()->get();
        $produk = Result::select('produk')->orderBy('produk')->distinct()->get();

        return view('dashboard.result.create', compact('jenis', 'produk'));
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
                        $result = Result::create($data);
                        // ddd($result);
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

            $result = Result::create([
                'id_outlet' => $request->id_outlet,
                'trx' => $request->transaksi,
                'rev' => $request->revenue,
                'jenis' => strtoupper($request->jenis),
                'produk' => strtoupper($request->produk),
                'date' => date('Y-m-d', strtotime($request->date)),
            ]);
        }

        return redirect()->route('result.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Result $result)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {
        $jenis = Result::select('jenis')->orderBy('jenis')->distinct()->get();
        $produk = Result::select('produk')->orderBy('produk')->distinct()->get();

        return view('dashboard.result.edit', compact('result', 'jenis', 'produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Result $result)
    {
        $request->validate([
            'id_outlet' => ['required', 'numeric'],
            'transaksi' => ['required', 'numeric'],
            'revenue' => ['required', 'numeric'],
            'jenis' => ['required'],
            'produk' => ['required'],
            'date' => ['required']
        ]);

        $result->id_outlet = $request->id_outlet;
        $result->trx = $request->transaksi;
        $result->rev = $request->revenue;
        $result->jenis = strtoupper($request->jenis);
        $result->produk = strtoupper($request->produk);
        $result->date = date('Y-m-d', strtotime($request->date));
        $result->save();

        return redirect()->route('result.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        $result->delete();

        return back();
    }
}
