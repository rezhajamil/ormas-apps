<?php

namespace App\Http\Controllers;

use App\Models\Target;
use Illuminate\Http\Request;

class TargetController extends Controller
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

        $targets = Target::select('targets.*', 'outlets.nama_outlet')->join('outlets', 'targets.id_outlet', '=', 'outlets.id_outlet', 'left')->orderBy('targets.created_at', 'DESC')->whereBetween('date', [$start_date, $end_date])->paginate(500);
        $jenis = Target::select('jenis')->orderBy('jenis')->distinct()->get();
        $produk = Target::select('produk')->orderBy('produk')->distinct()->get();

        return view('dashboard.target.index', compact('targets', 'jenis', 'produk'));
    }

    /**
     * Show the form for creating a new resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis = Target::select('jenis')->orderBy('jenis')->distinct()->get();
        $produk = Target::select('produk')->orderBy('produk')->distinct()->get();

        return view('dashboard.target.create', compact('jenis', 'produk'));
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
                        $target = Target::create($data);
                        // ddd($target);
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

            $target = Target::create([
                'id_outlet' => $request->id_outlet,
                'trx' => $request->transaksi,
                'rev' => $request->revenue,
                'jenis' => strtoupper($request->jenis),
                'produk' => strtoupper($request->produk),
                'date' => date('Y-m-d', strtotime($request->date)),
            ]);
        }

        return redirect()->route('target.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Target  $target
     * @return \Illuminate\Http\Response
     */
    public function show(Target $target)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Target  $target
     * @return \Illuminate\Http\Response
     */
    public function edit(Target $target)
    {
        $jenis = Target::select('jenis')->orderBy('jenis')->distinct()->get();
        $produk = Target::select('produk')->orderBy('produk')->distinct()->get();

        return view('dashboard.target.edit', compact('target', 'jenis', 'produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Target  $target
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Target $target)
    {
        $request->validate([
            'id_outlet' => ['required', 'numeric'],
            'transaksi' => ['required', 'numeric'],
            'revenue' => ['required', 'numeric'],
            'jenis' => ['required'],
            'produk' => ['required'],
            'date' => ['required']
        ]);

        $target->id_outlet = $request->id_outlet;
        $target->trx = $request->transaksi;
        $target->rev = $request->revenue;
        $target->jenis = strtoupper($request->jenis);
        $target->produk = strtoupper($request->produk);
        $target->date = date('Y-m-d', strtotime($request->date));
        $target->save();

        return redirect()->route('target.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Target  $target
     * @return \Illuminate\Http\Response
     */
    public function destroy(Target $target)
    {
        $target->delete();

        return back();
    }
}
