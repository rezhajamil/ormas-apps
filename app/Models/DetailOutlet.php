<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetailOutlet extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getDetailList($mtd, $id_outlet)
    {
        $first_mtd = date('Y-m-01', strtotime($mtd));
        $last_mtd = date('Y-m-t', strtotime($mtd));
        $m1 = DetailOutlet::convDate($mtd);
        $last_m1 = date('Y-m-t', strtotime($m1));
        $first_m1 = date('Y-m-01', strtotime($last_m1));

        // $query =
        //     "SELECT id_outlet,no_rs,nama_outlet,sf,telp_pemilik,sub_branch,`cluster`,tap_kcp,side_id_cover,kategori,pareto,frekuensi_kunjungan,hari_kunjungan,remark_fisik,pjp,kecamatan,kabupaten,kecamatan_lighthouse,hrc_index,

        //     SUM(CASE WHEN `date` = '$last_m1' THEN cvm_trx ELSE 0 END) cvm_fm_trx,
        //     SUM(CASE WHEN `date` = '$last_m1' THEN cvm_rev ELSE 0 END) cvm_fm_rev,
        //     SUM(CASE WHEN `date` = '$mtd' THEN cvm_target_trx ELSE 0 END) cvm_target_trx,
        //     SUM(CASE WHEN `date` = '$mtd' THEN cvm_target_rev ELSE 0 END) cvm_target_rev,
        //     SUM(CASE WHEN `date` = '$mtd' THEN cvm_trx ELSE 0 END) cvm_mtd_trx,
        //     SUM(CASE WHEN `date` = '$mtd' THEN cvm_rev ELSE 0 END) cvm_mtd_rev,
        //     SUM(CASE WHEN `date` = '$m1' THEN cvm_trx ELSE 0 END) cvm_m1_trx,
        //     SUM(CASE WHEN `date` = '$m1' THEN cvm_rev ELSE 0 END) cvm_m1_rev,

        //     SUM(CASE WHEN `date` = '$last_m1' THEN combo_sakti_trx ELSE 0 END) combo_sakti_fm_trx,
        //     SUM(CASE WHEN `date` = '$last_m1' THEN combo_sakti_rev ELSE 0 END) combo_sakti_fm_rev,
        //     SUM(CASE WHEN `date` = '$mtd' THEN combo_sakti_target_trx ELSE 0 END) combo_sakti_target_trx,
        //     SUM(CASE WHEN `date` = '$mtd' THEN combo_sakti_target_rev ELSE 0 END) combo_sakti_target_rev,
        //     SUM(CASE WHEN `date` = '$mtd' THEN combo_sakti_trx ELSE 0 END) combo_sakti_mtd_trx,
        //     SUM(CASE WHEN `date` = '$mtd' THEN combo_sakti_rev ELSE 0 END) combo_sakti_mtd_rev,
        //     SUM(CASE WHEN `date` = '$m1' THEN combo_sakti_trx ELSE 0 END) combo_sakti_m1_trx,
        //     SUM(CASE WHEN `date` = '$m1' THEN combo_sakti_rev ELSE 0 END) combo_sakti_m1_rev,

        //     SUM(CASE WHEN `date` = '$last_m1' THEN internet_sakti_trx ELSE 0 END) internet_sakti_fm_trx,
        //     SUM(CASE WHEN `date` = '$last_m1' THEN internet_sakti_rev ELSE 0 END) internet_sakti_fm_rev,
        //     SUM(CASE WHEN `date` = '$mtd' THEN internet_sakti_target_trx ELSE 0 END) internet_sakti_target_trx,
        //     SUM(CASE WHEN `date` = '$mtd' THEN internet_sakti_target_rev ELSE 0 END) internet_sakti_target_rev,
        //     SUM(CASE WHEN `date` = '$mtd' THEN internet_sakti_trx ELSE 0 END) internet_sakti_mtd_trx,
        //     SUM(CASE WHEN `date` = '$mtd' THEN internet_sakti_rev ELSE 0 END) internet_sakti_mtd_rev,
        //     SUM(CASE WHEN `date` = '$m1' THEN internet_sakti_trx ELSE 0 END) internet_sakti_m1_trx,
        //     SUM(CASE WHEN `date` = '$m1' THEN internet_sakti_rev ELSE 0 END) internet_sakti_m1_rev,

        //     SUM(CASE WHEN `date` = '$last_m1' THEN hot_promo_trx ELSE 0 END) hot_promo_fm_trx,
        //     SUM(CASE WHEN `date` = '$last_m1' THEN hot_promo_rev ELSE 0 END) hot_promo_fm_rev,
        //     SUM(CASE WHEN `date` = '$mtd' THEN hot_promo_target_trx ELSE 0 END) hot_promo_target_trx,
        //     SUM(CASE WHEN `date` = '$mtd' THEN hot_promo_target_rev ELSE 0 END) hot_promo_target_rev,
        //     SUM(CASE WHEN `date` = '$mtd' THEN hot_promo_trx ELSE 0 END) hot_promo_mtd_trx,
        //     SUM(CASE WHEN `date` = '$mtd' THEN hot_promo_rev ELSE 0 END) hot_promo_mtd_rev,
        //     SUM(CASE WHEN `date` = '$m1' THEN hot_promo_trx ELSE 0 END) hot_promo_m1_trx,
        //     SUM(CASE WHEN `date` = '$m1' THEN hot_promo_rev ELSE 0 END) hot_promo_m1_rev,

        //     SUM(CASE WHEN `date` = '$last_m1' THEN digital_trx ELSE 0 END) digital_fm_trx,
        //     SUM(CASE WHEN `date` = '$last_m1' THEN digital_rev ELSE 0 END) digital_fm_rev,
        //     SUM(CASE WHEN `date` = '$mtd' THEN digital_target_trx ELSE 0 END) digital_target_trx,
        //     SUM(CASE WHEN `date` = '$mtd' THEN digital_target_rev ELSE 0 END) digital_target_rev,
        //     SUM(CASE WHEN `date` = '$mtd' THEN digital_trx ELSE 0 END) digital_mtd_trx,
        //     SUM(CASE WHEN `date` = '$mtd' THEN digital_rev ELSE 0 END) digital_mtd_rev,
        //     SUM(CASE WHEN `date` = '$m1' THEN digital_trx ELSE 0 END) digital_m1_trx,
        //     SUM(CASE WHEN `date` = '$m1' THEN digital_rev ELSE 0 END) digital_m1_rev,

        //     SUM(CASE WHEN `date` = '$last_m1' THEN voice_trx ELSE 0 END) voice_fm_trx,
        //     SUM(CASE WHEN `date` = '$last_m1' THEN voice_rev ELSE 0 END) voice_fm_rev,
        //     SUM(CASE WHEN `date` = '$mtd' THEN voice_target_trx ELSE 0 END) voice_target_trx,
        //     SUM(CASE WHEN `date` = '$mtd' THEN voice_target_rev ELSE 0 END) voice_target_rev,
        //     SUM(CASE WHEN `date` = '$mtd' THEN voice_trx ELSE 0 END) voice_mtd_trx,
        //     SUM(CASE WHEN `date` = '$mtd' THEN voice_rev ELSE 0 END) voice_mtd_rev,
        //     SUM(CASE WHEN `date` = '$m1' THEN voice_trx ELSE 0 END) voice_m1_trx,
        //     SUM(CASE WHEN `date` = '$m1' THEN voice_rev ELSE 0 END) voice_m1_rev,

        //     SUM(CASE WHEN `date` = '$last_m1' THEN vas_trx ELSE 0 END) vas_fm_trx,
        //     SUM(CASE WHEN `date` = '$last_m1' THEN vas_rev ELSE 0 END) vas_fm_rev,
        //     SUM(CASE WHEN `date` = '$mtd' THEN vas_target_trx ELSE 0 END) vas_target_trx,
        //     SUM(CASE WHEN `date` = '$mtd' THEN vas_target_rev ELSE 0 END) vas_target_rev,
        //     SUM(CASE WHEN `date` = '$mtd' THEN vas_trx ELSE 0 END) vas_mtd_trx,
        //     SUM(CASE WHEN `date` = '$mtd' THEN vas_rev ELSE 0 END) vas_mtd_rev,
        //     SUM(CASE WHEN `date` = '$m1' THEN vas_trx ELSE 0 END) vas_m1_trx,
        //     SUM(CASE WHEN `date` = '$m1' THEN vas_rev ELSE 0 END) vas_m1_rev,

        //     SUM(CASE WHEN `date` = '$last_m1' THEN productive_trx ELSE 0 END) productive_fm_trx,
        //     SUM(CASE WHEN `date` = '$last_m1' THEN productive_rev ELSE 0 END) productive_fm_rev,
        //     SUM(CASE WHEN `date` = '$mtd' THEN productive_trx ELSE 0 END) productive_mtd_trx,
        //     SUM(CASE WHEN `date` = '$mtd' THEN productive_rev ELSE 0 END) productive_mtd_rev,
        //     SUM(CASE WHEN `date` = '$m1' THEN productive_trx ELSE 0 END) productive_m1_trx,
        //     SUM(CASE WHEN `date` = '$m1' THEN productive_rev ELSE 0 END) productive_m1_rev,

        //     SUM(CASE WHEN `date` = '$last_m1' THEN st_sp ELSE 0 END) st_sp_fm,
        //     SUM(CASE WHEN `date` = '$mtd' THEN st_sp_target ELSE 0 END) st_sp_target,
        //     SUM(CASE WHEN `date` = '$mtd' THEN st_sp ELSE 0 END) st_sp_mtd,
        //     SUM(CASE WHEN `date` = '$m1' THEN st_sp ELSE 0 END) st_sp_m1,

        //     SUM(CASE WHEN `date` = '$last_m1' THEN st_vf ELSE 0 END) st_vf_fm,
        //     SUM(CASE WHEN `date` = '$mtd' THEN st_vf_target ELSE 0 END) st_vf_target,
        //     SUM(CASE WHEN `date` = '$mtd' THEN st_vf ELSE 0 END) st_vf_mtd,
        //     SUM(CASE WHEN `date` = '$m1' THEN st_vf ELSE 0 END) st_vf_m1,

        //     SUM(CASE WHEN `date` = '$last_m1' THEN so_pair_so_sp ELSE 0 END) so_pair_so_sp_fm,
        //     SUM(CASE WHEN `date` = '$last_m1' THEN so_pair_rev_so ELSE 0 END) so_pair_rev_so_fm,
        //     SUM(CASE WHEN `date` = '$last_m1' THEN so_pair_rev_pair ELSE 0 END) so_pair_rev_pair_fm,
        //     SUM(CASE WHEN `date` = '$last_m1' THEN so_pair_pair_vf ELSE 0 END) so_pair_pair_vf_fm,

        //     SUM(CASE WHEN `date` = '$m1' THEN so_pair_so_sp ELSE 0 END) so_pair_so_sp_m1,
        //     SUM(CASE WHEN `date` = '$m1' THEN so_pair_rev_so ELSE 0 END) so_pair_rev_so_m1,
        //     SUM(CASE WHEN `date` = '$m1' THEN so_pair_rev_pair ELSE 0 END) so_pair_rev_pair_m1,
        //     SUM(CASE WHEN `date` = '$m1' THEN so_pair_pair_vf ELSE 0 END) so_pair_pair_vf_m1,

        //     SUM(CASE WHEN `date` = '$mtd' THEN so_pair_so_sp ELSE 0 END) so_pair_so_sp_mtd,
        //     SUM(CASE WHEN `date` = '$mtd' THEN so_pair_rev_so ELSE 0 END) so_pair_rev_so_mtd,
        //     SUM(CASE WHEN `date` = '$mtd' THEN so_pair_so_in ELSE 0 END) so_pair_so_in_mtd,
        //     SUM(CASE WHEN `date` = '$mtd' THEN so_pair_so_out ELSE 0 END) so_pair_so_out_mtd,
        //     SUM(CASE WHEN `date` = '$mtd' THEN so_pair_rev_pair ELSE 0 END) so_pair_rev_pair_mtd,
        //     SUM(CASE WHEN `date` = '$mtd' THEN so_pair_pair_vf ELSE 0 END) so_pair_pair_vf_mtd,
        //     SUM(CASE WHEN `date` = '$mtd' THEN so_pair_pair_in ELSE 0 END) so_pair_pair_in_mtd,
        //     SUM(CASE WHEN `date` = '$mtd' THEN so_pair_pair_out ELSE 0 END) so_pair_pair_out_mtd,

        //     SUM(CASE WHEN `date` = '$last_m1' THEN renewal_akuisisi_trx ELSE 0 END) renewal_akuisisi_fm_trx,
        //     SUM(CASE WHEN `date` = '$last_m1' THEN renewal_akuisisi_rev ELSE 0 END) renewal_akuisisi_fm_rev,
        //     SUM(CASE WHEN `date` = '$mtd' THEN renewal_akuisisi_target_trx ELSE 0 END) renewal_akuisisi_target_trx,
        //     SUM(CASE WHEN `date` = '$mtd' THEN renewal_akuisisi_target_rev ELSE 0 END) renewal_akuisisi_target_rev,
        //     SUM(CASE WHEN `date` = '$mtd' THEN renewal_akuisisi_trx ELSE 0 END) renewal_akuisisi_mtd_trx,
        //     SUM(CASE WHEN `date` = '$mtd' THEN renewal_akuisisi_rev ELSE 0 END) renewal_akuisisi_mtd_rev,
        //     SUM(CASE WHEN `date` = '$m1' THEN renewal_akuisisi_trx ELSE 0 END) renewal_akuisisi_m1_trx,
        //     SUM(CASE WHEN `date` = '$m1' THEN renewal_akuisisi_rev ELSE 0 END) renewal_akuisisi_m1_rev,

        //     SUM(CASE WHEN `date` = '$last_m1' THEN omset ELSE 0 END) omset_fm,
        //     SUM(CASE WHEN `date` = '$mtd' THEN omset_target ELSE 0 END) omset_target,
        //     SUM(CASE WHEN `date` = '$mtd' THEN omset ELSE 0 END) omset_mtd,
        //     SUM(CASE WHEN `date` = '$m1' THEN omset ELSE 0 END) omset_m1,

        //     SUM(CASE WHEN `date` = '$last_m1' THEN super_seru_trx ELSE 0 END) super_seru_fm_trx,
        //     SUM(CASE WHEN `date` = '$last_m1' THEN super_seru_rev ELSE 0 END) super_seru_fm_rev,
        //     SUM(CASE WHEN `date` = '$mtd' THEN super_seru_target_trx ELSE 0 END) super_seru_target_trx,
        //     SUM(CASE WHEN `date` = '$mtd' THEN super_seru_target_rev ELSE 0 END) super_seru_target_rev,
        //     SUM(CASE WHEN `date` = '$mtd' THEN super_seru_trx ELSE 0 END) super_seru_mtd_trx,
        //     SUM(CASE WHEN `date` = '$mtd' THEN super_seru_rev ELSE 0 END) super_seru_mtd_rev,
        //     SUM(CASE WHEN `date` = '$m1' THEN super_seru_trx ELSE 0 END) super_seru_m1_trx,
        //     SUM(CASE WHEN `date` = '$m1' THEN super_seru_rev ELSE 0 END) super_seru_m1_rev

        //     FROM detail_outlets
        //     WHERE date BETWEEN '$first_m1' AND '$mtd'
        //     GROUP BY 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19
        //     ORDER BY id_outlet;";

        // $data = DB::select($query);

        $data = DetailOutlet::selectRaw("
                outlets.id_outlet,
                outlets.no_rs,
                outlets.nama_outlet,
                outlets.nama_sf,
                outlets.telp_pemilik,
                outlets.sub_branch,
                outlets.`cluster`,
                outlets.tap_kcp,
                outlets.side_id_cover,
                outlets.kategori,
                outlets.pareto,
                outlets.frekuensi_kunjungan,
                outlets.hari_kunjungan,
                outlets.remark_fisik,
                outlets.pjp,
                outlets.kecamatan,
                outlets.kabupaten,
                outlets.kecamatan_lighthouse,
                outlets.hrc_index,

                SUM(CASE WHEN `date` = '$last_m1' THEN cvm_trx ELSE 0 END) cvm_fm_trx,
                SUM(CASE WHEN `date` = '$last_m1' THEN cvm_rev ELSE 0 END) cvm_fm_rev,
                SUM(CASE WHEN `date` = '$mtd' THEN cvm_target_trx ELSE 0 END) cvm_target_trx,
                SUM(CASE WHEN `date` = '$mtd' THEN cvm_target_rev ELSE 0 END) cvm_target_rev,
                SUM(CASE WHEN `date` = '$mtd' THEN cvm_trx ELSE 0 END) cvm_mtd_trx,
                SUM(CASE WHEN `date` = '$mtd' THEN cvm_rev ELSE 0 END) cvm_mtd_rev,
                SUM(CASE WHEN `date` = '$m1' THEN cvm_trx ELSE 0 END) cvm_m1_trx,
                SUM(CASE WHEN `date` = '$m1' THEN cvm_rev ELSE 0 END) cvm_m1_rev,
                MAX(CASE WHEN `date` = '$mtd' THEN cvm_remark_trx END) cvm_remark_trx,

                SUM(CASE WHEN `date` = '$last_m1' THEN combo_sakti_trx ELSE 0 END) combo_sakti_fm_trx,
                SUM(CASE WHEN `date` = '$last_m1' THEN combo_sakti_rev ELSE 0 END) combo_sakti_fm_rev,
                SUM(CASE WHEN `date` = '$mtd' THEN combo_sakti_target_trx ELSE 0 END) combo_sakti_target_trx,
                SUM(CASE WHEN `date` = '$mtd' THEN combo_sakti_target_rev ELSE 0 END) combo_sakti_target_rev,
                SUM(CASE WHEN `date` = '$mtd' THEN combo_sakti_trx ELSE 0 END) combo_sakti_mtd_trx,
                SUM(CASE WHEN `date` = '$mtd' THEN combo_sakti_rev ELSE 0 END) combo_sakti_mtd_rev,
                SUM(CASE WHEN `date` = '$m1' THEN combo_sakti_trx ELSE 0 END) combo_sakti_m1_trx,
                SUM(CASE WHEN `date` = '$m1' THEN combo_sakti_rev ELSE 0 END) combo_sakti_m1_rev,

                SUM(CASE WHEN `date` = '$last_m1' THEN internet_sakti_trx ELSE 0 END) internet_sakti_fm_trx,
                SUM(CASE WHEN `date` = '$last_m1' THEN internet_sakti_rev ELSE 0 END) internet_sakti_fm_rev,
                SUM(CASE WHEN `date` = '$mtd' THEN internet_sakti_target_trx ELSE 0 END) internet_sakti_target_trx,
                SUM(CASE WHEN `date` = '$mtd' THEN internet_sakti_target_rev ELSE 0 END) internet_sakti_target_rev,
                SUM(CASE WHEN `date` = '$mtd' THEN internet_sakti_trx ELSE 0 END) internet_sakti_mtd_trx,
                SUM(CASE WHEN `date` = '$mtd' THEN internet_sakti_rev ELSE 0 END) internet_sakti_mtd_rev,
                SUM(CASE WHEN `date` = '$m1' THEN internet_sakti_trx ELSE 0 END) internet_sakti_m1_trx,
                SUM(CASE WHEN `date` = '$m1' THEN internet_sakti_rev ELSE 0 END) internet_sakti_m1_rev,

                SUM(CASE WHEN `date` = '$last_m1' THEN hot_promo_trx ELSE 0 END) hot_promo_fm_trx,
                SUM(CASE WHEN `date` = '$last_m1' THEN hot_promo_rev ELSE 0 END) hot_promo_fm_rev,
                SUM(CASE WHEN `date` = '$mtd' THEN hot_promo_target_trx ELSE 0 END) hot_promo_target_trx,
                SUM(CASE WHEN `date` = '$mtd' THEN hot_promo_target_rev ELSE 0 END) hot_promo_target_rev,
                SUM(CASE WHEN `date` = '$mtd' THEN hot_promo_trx ELSE 0 END) hot_promo_mtd_trx,
                SUM(CASE WHEN `date` = '$mtd' THEN hot_promo_rev ELSE 0 END) hot_promo_mtd_rev,
                SUM(CASE WHEN `date` = '$m1' THEN hot_promo_trx ELSE 0 END) hot_promo_m1_trx,
                SUM(CASE WHEN `date` = '$m1' THEN hot_promo_rev ELSE 0 END) hot_promo_m1_rev,

                SUM(CASE WHEN `date` = '$last_m1' THEN digital_trx ELSE 0 END) digital_fm_trx,
                SUM(CASE WHEN `date` = '$last_m1' THEN digital_rev ELSE 0 END) digital_fm_rev,
                SUM(CASE WHEN `date` = '$mtd' THEN digital_target_trx ELSE 0 END) digital_target_trx,
                SUM(CASE WHEN `date` = '$mtd' THEN digital_target_rev ELSE 0 END) digital_target_rev,
                SUM(CASE WHEN `date` = '$mtd' THEN digital_trx ELSE 0 END) digital_mtd_trx,
                SUM(CASE WHEN `date` = '$mtd' THEN digital_rev ELSE 0 END) digital_mtd_rev,
                SUM(CASE WHEN `date` = '$m1' THEN digital_trx ELSE 0 END) digital_m1_trx,
                SUM(CASE WHEN `date` = '$m1' THEN digital_rev ELSE 0 END) digital_m1_rev,

                MAX(CASE WHEN `date` = '$mtd' THEN p1_legacy_trx_1 END) p1_legacy_trx_1,
                MAX(CASE WHEN `date` = '$mtd' THEN p1_legacy_trx_1_4 END) p1_legacy_trx_1_4,
                SUM(CASE WHEN `date` = '$last_m1' THEN voice_trx ELSE 0 END) voice_fm_trx,
                SUM(CASE WHEN `date` = '$last_m1' THEN voice_rev ELSE 0 END) voice_fm_rev,
                SUM(CASE WHEN `date` = '$mtd' THEN voice_target_trx ELSE 0 END) voice_target_trx,
                SUM(CASE WHEN `date` = '$mtd' THEN voice_target_rev ELSE 0 END) voice_target_rev,
                SUM(CASE WHEN `date` = '$mtd' THEN voice_trx ELSE 0 END) voice_mtd_trx,
                SUM(CASE WHEN `date` = '$mtd' THEN voice_rev ELSE 0 END) voice_mtd_rev,
                SUM(CASE WHEN `date` = '$m1' THEN voice_trx ELSE 0 END) voice_m1_trx,
                SUM(CASE WHEN `date` = '$m1' THEN voice_rev ELSE 0 END) voice_m1_rev,

                SUM(CASE WHEN `date` = '$last_m1' THEN vas_trx ELSE 0 END) vas_fm_trx,
                SUM(CASE WHEN `date` = '$last_m1' THEN vas_rev ELSE 0 END) vas_fm_rev,
                SUM(CASE WHEN `date` = '$mtd' THEN vas_target_trx ELSE 0 END) vas_target_trx,
                SUM(CASE WHEN `date` = '$mtd' THEN vas_target_rev ELSE 0 END) vas_target_rev,
                SUM(CASE WHEN `date` = '$mtd' THEN vas_trx ELSE 0 END) vas_mtd_trx,
                SUM(CASE WHEN `date` = '$mtd' THEN vas_rev ELSE 0 END) vas_mtd_rev,
                SUM(CASE WHEN `date` = '$m1' THEN vas_trx ELSE 0 END) vas_m1_trx,
                SUM(CASE WHEN `date` = '$m1' THEN vas_rev ELSE 0 END) vas_m1_rev,

                SUM(CASE WHEN `date` = '$last_m1' THEN productive_trx ELSE 0 END) productive_fm_trx,
                SUM(CASE WHEN `date` = '$last_m1' THEN productive_rev ELSE 0 END) productive_fm_rev,
                SUM(CASE WHEN `date` = '$mtd' THEN productive_trx ELSE 0 END) productive_mtd_trx,
                SUM(CASE WHEN `date` = '$mtd' THEN productive_rev ELSE 0 END) productive_mtd_rev,
                SUM(CASE WHEN `date` = '$m1' THEN productive_trx ELSE 0 END) productive_m1_trx,
                SUM(CASE WHEN `date` = '$m1' THEN productive_rev ELSE 0 END) productive_m1_rev,

                SUM(CASE WHEN `date` = '$last_m1' THEN st_sp ELSE 0 END) st_sp_fm,
                SUM(CASE WHEN `date` = '$mtd' THEN st_sp_target ELSE 0 END) st_sp_target,
                SUM(CASE WHEN `date` = '$mtd' THEN st_sp ELSE 0 END) st_sp_mtd,
                SUM(CASE WHEN `date` = '$m1' THEN st_sp ELSE 0 END) st_sp_m1,

                SUM(CASE WHEN `date` = '$last_m1' THEN st_vf ELSE 0 END) st_vf_fm,
                SUM(CASE WHEN `date` = '$mtd' THEN st_vf_target ELSE 0 END) st_vf_target,
                SUM(CASE WHEN `date` = '$mtd' THEN st_vf ELSE 0 END) st_vf_mtd,
                SUM(CASE WHEN `date` = '$m1' THEN st_vf ELSE 0 END) st_vf_m1,

                SUM(CASE WHEN `date` = '$last_m1' THEN so_pair_so_sp ELSE 0 END) so_pair_so_sp_fm,
                SUM(CASE WHEN `date` = '$last_m1' THEN so_pair_rev_so ELSE 0 END) so_pair_rev_so_fm,
                SUM(CASE WHEN `date` = '$last_m1' THEN so_pair_rev_pair ELSE 0 END) so_pair_rev_pair_fm,
                SUM(CASE WHEN `date` = '$last_m1' THEN so_pair_pair_vf ELSE 0 END) so_pair_pair_vf_fm,

                SUM(CASE WHEN `date` = '$m1' THEN so_pair_so_sp ELSE 0 END) so_pair_so_sp_m1,
                SUM(CASE WHEN `date` = '$m1' THEN so_pair_rev_so ELSE 0 END) so_pair_rev_so_m1,
                SUM(CASE WHEN `date` = '$m1' THEN so_pair_rev_pair ELSE 0 END) so_pair_rev_pair_m1,
                SUM(CASE WHEN `date` = '$m1' THEN so_pair_pair_vf ELSE 0 END) so_pair_pair_vf_m1,

                SUM(CASE WHEN `date` = '$mtd' THEN so_pair_so_sp ELSE 0 END) so_pair_so_sp_mtd,
                SUM(CASE WHEN `date` = '$mtd' THEN so_pair_rev_so ELSE 0 END) so_pair_rev_so_mtd,
                SUM(CASE WHEN `date` = '$mtd' THEN so_pair_so_in ELSE 0 END) so_pair_so_in_mtd,
                SUM(CASE WHEN `date` = '$mtd' THEN so_pair_so_out ELSE 0 END) so_pair_so_out_mtd,
                SUM(CASE WHEN `date` = '$mtd' THEN so_pair_rev_pair ELSE 0 END) so_pair_rev_pair_mtd,
                SUM(CASE WHEN `date` = '$mtd' THEN so_pair_pair_vf ELSE 0 END) so_pair_pair_vf_mtd,
                SUM(CASE WHEN `date` = '$mtd' THEN so_pair_pair_in ELSE 0 END) so_pair_pair_in_mtd,
                SUM(CASE WHEN `date` = '$mtd' THEN so_pair_pair_out ELSE 0 END) so_pair_pair_out_mtd,

                SUM(CASE WHEN `date` = '$last_m1' THEN renewal_akuisisi_trx ELSE 0 END) renewal_akuisisi_fm_trx,
                SUM(CASE WHEN `date` = '$last_m1' THEN renewal_akuisisi_rev ELSE 0 END) renewal_akuisisi_fm_rev,
                SUM(CASE WHEN `date` = '$mtd' THEN renewal_akuisisi_target_trx ELSE 0 END) renewal_akuisisi_target_trx,
                SUM(CASE WHEN `date` = '$mtd' THEN renewal_akuisisi_target_rev ELSE 0 END) renewal_akuisisi_target_rev,
                SUM(CASE WHEN `date` = '$mtd' THEN renewal_akuisisi_trx ELSE 0 END) renewal_akuisisi_mtd_trx,
                SUM(CASE WHEN `date` = '$mtd' THEN renewal_akuisisi_rev ELSE 0 END) renewal_akuisisi_mtd_rev,
                SUM(CASE WHEN `date` = '$m1' THEN renewal_akuisisi_trx ELSE 0 END) renewal_akuisisi_m1_trx,
                SUM(CASE WHEN `date` = '$m1' THEN renewal_akuisisi_rev ELSE 0 END) renewal_akuisisi_m1_rev,

                SUM(CASE WHEN `date` = '$last_m1' THEN omset ELSE 0 END) omset_fm,
                SUM(CASE WHEN `date` = '$mtd' THEN omset_target ELSE 0 END) omset_target,
                SUM(CASE WHEN `date` = '$mtd' THEN omset ELSE 0 END) omset_mtd,
                SUM(CASE WHEN `date` = '$m1' THEN omset ELSE 0 END) omset_m1,

                SUM(CASE WHEN `date` = '$last_m1' THEN super_seru_trx ELSE 0 END) super_seru_fm_trx,
                SUM(CASE WHEN `date` = '$last_m1' THEN super_seru_rev ELSE 0 END) super_seru_fm_rev,
                SUM(CASE WHEN `date` = '$mtd' THEN super_seru_target_trx ELSE 0 END) super_seru_target_trx,
                SUM(CASE WHEN `date` = '$mtd' THEN super_seru_target_rev ELSE 0 END) super_seru_target_rev,
                SUM(CASE WHEN `date` = '$mtd' THEN super_seru_trx ELSE 0 END) super_seru_mtd_trx,
                SUM(CASE WHEN `date` = '$mtd' THEN super_seru_rev ELSE 0 END) super_seru_mtd_rev,
                SUM(CASE WHEN `date` = '$m1' THEN super_seru_trx ELSE 0 END) super_seru_m1_trx,
                SUM(CASE WHEN `date` = '$m1' THEN super_seru_rev ELSE 0 END) super_seru_m1_rev,
                
                MAX(CASE WHEN `date` = '$mtd' THEN pn_lh_banjir_cuan END) pn_lh_banjir_cuan,
                MAX(CASE WHEN `date` = '$mtd' THEN pn_lh_cvm_hd END) pn_lh_cvm_hd,
                MAX(CASE WHEN `date` = '$mtd' THEN pn_lh_so_double_cuan END) pn_lh_so_double_cuan,
                MAX(CASE WHEN `date` = '$mtd' THEN pn_lh_paket_sakti END) pn_lh_paket_sakti,
                MAX(CASE WHEN `date` = '$mtd' THEN pn_so_reguler END) pn_so_reguler,
                MAX(CASE WHEN `date` = '$mtd' THEN pn_super_seru END) pn_super_seru,
                MAX(CASE WHEN `date` = '$mtd' THEN pn_prodi_hq END) pn_prodi_hq,
                MAX(CASE WHEN `date` = '$mtd' THEN pl_andalan_comsak END) pl_andalan_comsak,
                MAX(CASE WHEN `date` = '$mtd' THEN pl_andalan_hot_promo END) pl_andalan_hot_promo,
                MAX(CASE WHEN `date` = '$mtd' THEN pl_tambuah END) pl_tambuah,
                MAX(CASE WHEN `date` = '$mtd' THEN pl_lapau_sa END) pl_lapau_sa,
                MAX(CASE WHEN `date` = '$mtd' THEN pl_andalan_digital END) pl_andalan_digital,
                MAX(CASE WHEN `date` = '$mtd' THEN pl_all_prodi_lokal END) pl_all_prodi_lokal,

                SUM(CASE WHEN `date` = '$mtd' THEN histori_order_w_3 ELSE 0 END) histori_order_w_3,
                SUM(CASE WHEN `date` = '$mtd' THEN histori_order_w_2 ELSE 0 END) histori_order_w_2,
                SUM(CASE WHEN `date` = '$mtd' THEN histori_order_w_1 ELSE 0 END) histori_order_w_1,
                SUM(CASE WHEN `date` = '$mtd' THEN target_weekly_validity_3d ELSE 0 END) target_weekly_validity_3d,
                SUM(CASE WHEN `date` = '$mtd' THEN target_weekly_validity_5d ELSE 0 END) target_weekly_validity_5d,
                SUM(CASE WHEN `date` = '$mtd' THEN target_weekly_validity_7d ELSE 0 END) target_weekly_validity_7d")
            ->whereBetween('date', [$first_m1, $mtd])
            ->join('outlets', 'detail_outlets.id_outlet', '=', 'outlets.id_outlet')
            ->where('outlets.status', 1);

        if ($id_outlet) {
            $data = $data->where('detail_outlets.id_outlet', $id_outlet);
        }

        $data = $data->groupBy('outlets.id_outlet', 'outlets.no_rs', 'outlets.nama_outlet', 'outlets.nama_sf', 'outlets.telp_pemilik', 'outlets.sub_branch', 'outlets.cluster', 'outlets.tap_kcp', 'outlets.side_id_cover', 'outlets.kategori', 'outlets.pareto', 'outlets.frekuensi_kunjungan', 'outlets.hari_kunjungan', 'outlets.remark_fisik', 'outlets.pjp', 'outlets.kecamatan', 'outlets.kabupaten', 'outlets.kecamatan_lighthouse', 'outlets.hrc_index')
            ->orderBy('id_outlet')
            ->paginate(100);

        return $data;
    }

    public static function getLogs($limit = 30)
    {
        $query = "SELECT MAX(created_at) AS created_at, date
            FROM detail_outlets
            GROUP BY date
            ORDER BY date DESC
            LIMIT $limit;";

        $logs = DB::select($query);

        return $logs;
    }


    static function convDate($tanggal)
    {
        $now = date('Y-m-d', strtotime($tanggal));
        $hari = date('d', strtotime($now));
        $last = date('Y-m-t', strtotime($now));


        if ($last == $tanggal) {
            return date('Y-m-d', strtotime($tanggal . "last day of previous month"));
        } else {
            if ($hari > 28 && date('m', strtotime($now)) == 3) {
                return date('Y-m-d', strtotime($tanggal . "last day of previous month"));
            } else {
                return date('Y-m-d', strtotime($now . '-1 Months'));
            }
        }
    }
}
