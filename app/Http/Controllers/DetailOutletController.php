<?php

namespace App\Http\Controllers;

use App\Models\DetailOutlet;
use Illuminate\Http\Request;

class DetailOutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $details = [];
        $mtd = '';
        $m1 = '';
        $month_m1 = '';
        $month_mtd = '';

        if ($request->date) {
            $details = DetailOutlet::getDetailList($request->date);
            $mtd = date('d F', strtotime($request->date));
            $m1 = date('d F', strtotime($request->date . '-1 Months'));
            $month_m1 = date('F', strtotime($request->date));
            $month_mtd = date('F', strtotime($request->date . '-1 Months'));
        }

        // ddd($details[0]);

        return view('dashboard.detail_outlet.index', compact('details', 'mtd', 'm1', 'month_mtd', 'month_m1'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.detail_outlet.create');
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
        $request->validate([
            'csv' => ['required', 'file']
        ]);

        if (file_exists($request->csv)) {
            $file = fopen($request->csv, "r");

            $idx = 0;

            $correct = ['date', 'no_rs', 'id_outlet', 'nama_outlet', 'sf', 'telp_pemilik', 'sub_branch', 'cluster', 'tap_kcp', 'side_id_cover', 'kategori', 'pareto', 'frekuensi_kunjungan', 'hari_kunjungan', 'remark_fisik', 'pjp', 'kecamatan', 'kabupaten', 'cvm_target_trx', 'cvm_target_rev', 'cvm_trx', 'cvm_rev', 'cvm_remark_trx', 'combo_sakti_target_trx', 'combo_sakti_target_rev', 'combo_sakti_trx', 'combo_sakti_rev', 'internet_sakti_target_trx', 'internet_sakti_target_rev', 'internet_sakti_trx', 'internet_sakti_rev', 'hot_promo_target_trx', 'hot_promo_target_rev', 'hot_promo_trx', 'hot_promo_rev', 'digital_target_trx', 'digital_target_rev', 'digital_trx', 'digital_rev', 'p1_legacy_trx_1', 'p1_legacy_trx_1_4', 'voice_target_trx', 'voice_target_rev', 'voice_trx', 'voice_rev', 'vas_target_trx', 'vas_target_rev', 'vas_trx', 'vas_rev', 'productive_trx', 'productive_rev', 'st_sp_target', 'st_sp', 'st_vf_target', 'st_vf', 'so_pair_so_sp', 'so_pair_rev_so', 'so_pair_rev_pair', 'so_pair_pair_vf', 'so_pair_so_in', 'so_pair_so_out', 'so_pair_pair_in', 'so_pair_pair_out', 'so_usim', 'renewal_akuisisi_target_trx', 'renewal_akuisisi_target_rev', 'renewal_akuisisi_trx', 'renewal_akuisisi_rev', 'omset_target', 'omset', 'super_seru_target_trx', 'super_seru_target_rev', 'super_seru_trx', 'super_seru_rev', 'kecamatan_lighthouse', 'hrc_index', 'pn_lh_banjir_cuan', 'pn_lh_cvm_hd', 'pn_lh_so_double_cuan', 'pn_lh_paket_sakti', 'pn_so_reguler', 'pn_super_seru', 'pn_prodi_hq', 'pl_andalan_comsak', 'pl_andalan_hot_promo', 'pl_tambuah', 'pl_lapau_sa', 'pl_andalan_digital', 'pl_all_prodi_lokal', 'histori_order_w_3', 'histori_order_w_2', 'histori_order_w_1', 'target_weekly_validity_3d', 'target_weekly_validity_5d', 'target_weekly_validity_7d'];
            $get_row = fgetcsv($file, 200000);

            $possible_delimiters = [';', ',', '|'];

            $detected_delimiter = null;

            foreach ($possible_delimiters as $delimiter) {
                if (count(str_getcsv($get_row[0], $delimiter)) > 1) {
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

            if (count($get_row) <= 200000) {
                $header = str_split($get_row[0]);

                foreach ($get_row as $key => $col) {
                    // ddd($header);
                    if ($col != $correct[$key]) {
                        $col_num = $key + 1;
                        $col_correct = $correct[$key];
                        return back()->withErrors(['csv' => "Header kolom ke $col_num seharusnya $col_correct bukan $col"])->withInput();
                    }
                }
            }

            while (($row = fgetcsv($file, 20000, $detected_delimiter)) !== FALSE) {

                $data = [];

                for ($i = 0; $i < 75; $i++) {
                    $data[$correct[$i]] = $row[$i];
                }
                $data['created_by'] = auth()->user()->id;

                // ddd($row);
                if ($idx < 20001) {
                    // echo '<pre>' . $idx . var_export($data, true) . '</pre>';
                    $detail_outlet = DetailOutlet::create($data);
                    // ddd($detail_outlet);
                } else if ($idx > 20001) {
                    break;
                }
                $idx++;
            }
        }

        return redirect()->route('detail_outlet.index')->with('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailOutlet  $detailOutlet
     * @return \Illuminate\Http\Response
     */
    public function show(DetailOutlet $detailOutlet)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailOutlet  $detailOutlet
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailOutlet $detailOutlet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailOutlet  $detailOutlet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailOutlet $detailOutlet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailOutlet  $detailOutlet
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailOutlet $detailOutlet)
    {
        //
    }
}
