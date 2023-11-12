<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetailOutlet extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getDetailList($mtd)
    {
        $first_mtd = date('Y-m-01', strtotime($mtd));
        $last_mtd = date('Y-m-t', strtotime($mtd));
        $m1 = date('Y-m-d', strtotime($mtd . '-1 Months'));
        $last_m1 = DetailOutlet::convDate($mtd);
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
                id_outlet,
                no_rs,
                nama_outlet,
                sf,
                telp_pemilik,
                sub_branch,
                `cluster`,
                tap_kcp,
                side_id_cover,
                kategori,
                pareto,
                frekuensi_kunjungan,
                hari_kunjungan,
                remark_fisik,
                pjp,
                kecamatan,
                kabupaten,
                kecamatan_lighthouse,
                hrc_index,

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
                SUM(CASE WHEN `date` = '$m1' THEN super_seru_rev ELSE 0 END) super_seru_m1_rev")
            ->whereBetween('date', [$first_m1, $mtd])
            ->groupBy('id_outlet', 'no_rs', 'nama_outlet', 'sf', 'telp_pemilik', 'sub_branch', 'cluster', 'tap_kcp', 'side_id_cover', 'kategori', 'pareto', 'frekuensi_kunjungan', 'hari_kunjungan', 'remark_fisik', 'pjp', 'kecamatan', 'kabupaten', 'kecamatan_lighthouse', 'hrc_index')
            ->orderBy('id_outlet')
            ->paginate(500);

        return $data;
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
