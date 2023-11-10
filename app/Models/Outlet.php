<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Outlet extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function target()
    {
        return $this->hasMany(Target::class, 'id_outlet', 'id_outlet');
    }

    public function result()
    {
        return $this->hasMany(Result::class, 'id_outlet', 'id_outlet');
    }
    public function fm()
    {
        return $this->hasMany(FM::class, 'id_outlet', 'id_outlet');
    }

    public function detail_mobile($id_outlet, $mtd)
    {
        $first_mtd = date('Y-m-01', strtotime($mtd));
        $last_mtd = date('Y-m-t', strtotime($mtd));
        $m1 = date('Y-m-d', strtotime($mtd . '-1 Months'));
        $last_m1 = DetailOutlet::convDate($mtd);
        $first_m1 = date('Y-m-01', strtotime($last_m1));

        $query =
            "SELECT
            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$last_m1' THEN productive_trx ELSE 0 END) fm_productive_trx,
            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN productive_trx ELSE 0 END) m1_productive_trx,
            SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN productive_trx ELSE 0 END) mtd_productive_trx,
            COALESCE(ROUND(((SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN productive_trx ELSE 0 END)/SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN productive_trx ELSE 0 END)-1)*100),2),0) mom_productive_trx,
            (SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN productive_trx ELSE 0 END)-SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN productive_trx ELSE 0 END)) gap_productive_trx,
            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$last_m1' THEN productive_rev ELSE 0 END) fm_productive_rev,
            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN productive_rev ELSE 0 END) m1_productive_rev,
            SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN productive_rev ELSE 0 END) mtd_productive_rev,
            COALESCE(ROUND(((SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN productive_rev ELSE 0 END)/SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN productive_rev ELSE 0 END)-1)*100),2),0) mom_productive_rev,
            (SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN productive_rev ELSE 0 END)-SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN productive_rev ELSE 0 END)) gap_productive_rev,

            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$last_m1' THEN cvm_trx ELSE 0 END) fm_cvm_trx,
            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN cvm_trx ELSE 0 END) m1_cvm_trx,
            SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN cvm_trx ELSE 0 END) mtd_cvm_trx,
            COALESCE(ROUND(((SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN cvm_trx ELSE 0 END)/SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN cvm_trx ELSE 0 END)-1)*100),2),0) mom_cvm_trx,
            (SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN cvm_trx ELSE 0 END)-SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN cvm_trx ELSE 0 END)) gap_cvm_trx,
            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$last_m1' THEN cvm_rev ELSE 0 END) fm_cvm_rev,
            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN cvm_rev ELSE 0 END) m1_cvm_rev,
            SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN cvm_rev ELSE 0 END) mtd_cvm_rev,
            COALESCE(ROUND(((SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN cvm_rev ELSE 0 END)/SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN cvm_rev ELSE 0 END)-1)*100),2),0) mom_cvm_rev,
            (SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN cvm_rev ELSE 0 END)-SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN cvm_rev ELSE 0 END)) gap_cvm_rev,

            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$last_m1' THEN super_seru_trx ELSE 0 END) fm_super_seru_trx,
            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN super_seru_trx ELSE 0 END) m1_super_seru_trx,
            SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN super_seru_trx ELSE 0 END) mtd_super_seru_trx,
            COALESCE(ROUND(((SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN super_seru_trx ELSE 0 END)/SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN super_seru_trx ELSE 0 END)-1)*100),2),0) mom_super_seru_trx,
            (SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN super_seru_trx ELSE 0 END)-SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN super_seru_trx ELSE 0 END)) gap_super_seru_trx,
            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$last_m1' THEN super_seru_rev ELSE 0 END) fm_super_seru_rev,
            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN super_seru_rev ELSE 0 END) m1_super_seru_rev,
            SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN super_seru_rev ELSE 0 END) mtd_super_seru_rev,
            COALESCE(ROUND(((SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN super_seru_rev ELSE 0 END)/SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN super_seru_rev ELSE 0 END)-1)*100),2),0) mom_super_seru_rev,
            (SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN super_seru_rev ELSE 0 END)-SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN super_seru_rev ELSE 0 END)) gap_super_seru_rev,

            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$last_m1' THEN combo_sakti_trx ELSE 0 END) fm_combo_sakti_trx,
            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN combo_sakti_trx ELSE 0 END) m1_combo_sakti_trx,
            SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN combo_sakti_trx ELSE 0 END) mtd_combo_sakti_trx,
            COALESCE(ROUND(((SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN combo_sakti_trx ELSE 0 END)/SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN combo_sakti_trx ELSE 0 END)-1)*100),2),0) mom_combo_sakti_trx,
            (SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN combo_sakti_trx ELSE 0 END)-SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN combo_sakti_trx ELSE 0 END)) gap_combo_sakti_trx,
            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$last_m1' THEN combo_sakti_rev ELSE 0 END) fm_combo_sakti_rev,
            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN combo_sakti_rev ELSE 0 END) m1_combo_sakti_rev,
            SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN combo_sakti_rev ELSE 0 END) mtd_combo_sakti_rev,
            COALESCE(ROUND(((SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN combo_sakti_rev ELSE 0 END)/SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN combo_sakti_rev ELSE 0 END)-1)*100),2),0) mom_combo_sakti_rev,
            (SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN combo_sakti_rev ELSE 0 END)-SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN combo_sakti_rev ELSE 0 END)) gap_combo_sakti_rev,

            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$last_m1' THEN hot_promo_trx ELSE 0 END) fm_hot_promo_trx,
            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN hot_promo_trx ELSE 0 END) m1_hot_promo_trx,
            SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN hot_promo_trx ELSE 0 END) mtd_hot_promo_trx,
            COALESCE(ROUND(((SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN hot_promo_trx ELSE 0 END)/SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN hot_promo_trx ELSE 0 END)-1)*100),2),0) mom_hot_promo_trx,
            (SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN hot_promo_trx ELSE 0 END)-SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN hot_promo_trx ELSE 0 END)) gap_hot_promo_trx,
            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$last_m1' THEN hot_promo_rev ELSE 0 END) fm_hot_promo_rev,
            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN hot_promo_rev ELSE 0 END) m1_hot_promo_rev,
            SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN hot_promo_rev ELSE 0 END) mtd_hot_promo_rev,
            COALESCE(ROUND(((SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN hot_promo_rev ELSE 0 END)/SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN hot_promo_rev ELSE 0 END)-1)*100),2),0) mom_hot_promo_rev,
            (SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN hot_promo_rev ELSE 0 END)-SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN hot_promo_rev ELSE 0 END)) gap_hot_promo_rev,

            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$last_m1' THEN internet_sakti_trx ELSE 0 END) fm_internet_sakti_trx,
            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN internet_sakti_trx ELSE 0 END) m1_internet_sakti_trx,
            SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN internet_sakti_trx ELSE 0 END) mtd_internet_sakti_trx,
            COALESCE(ROUND(((SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN internet_sakti_trx ELSE 0 END)/SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN internet_sakti_trx ELSE 0 END)-1)*100),2),0) mom_internet_sakti_trx,
            (SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN internet_sakti_trx ELSE 0 END)-SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN internet_sakti_trx ELSE 0 END)) gap_internet_sakti_trx,
            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$last_m1' THEN internet_sakti_rev ELSE 0 END) fm_internet_sakti_rev,
            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN internet_sakti_rev ELSE 0 END) m1_internet_sakti_rev,
            SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN internet_sakti_rev ELSE 0 END) mtd_internet_sakti_rev,
            COALESCE(ROUND(((SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN internet_sakti_rev ELSE 0 END)/SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN internet_sakti_rev ELSE 0 END)-1)*100),2),0) mom_internet_sakti_rev,
            (SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN internet_sakti_rev ELSE 0 END)-SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN internet_sakti_rev ELSE 0 END)) gap_internet_sakti_rev,

            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$last_m1' THEN digital_trx ELSE 0 END) fm_digital_trx,
            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN digital_trx ELSE 0 END) m1_digital_trx,
            SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN digital_trx ELSE 0 END) mtd_digital_trx,
            COALESCE(ROUND(((SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN digital_trx ELSE 0 END)/SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN digital_trx ELSE 0 END)-1)*100),2),0) mom_digital_trx,
            (SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN digital_trx ELSE 0 END)-SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN digital_trx ELSE 0 END)) gap_digital_trx,
            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$last_m1' THEN digital_rev ELSE 0 END) fm_digital_rev,
            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN digital_rev ELSE 0 END) m1_digital_rev,
            SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN digital_rev ELSE 0 END) mtd_digital_rev,
            COALESCE(ROUND(((SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN digital_rev ELSE 0 END)/SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN digital_rev ELSE 0 END)-1)*100),2),0) mom_digital_rev,
            (SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN digital_rev ELSE 0 END)-SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN digital_rev ELSE 0 END)) gap_digital_rev,

            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$last_m1' THEN voice_trx ELSE 0 END) fm_voice_trx,
            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN voice_trx ELSE 0 END) m1_voice_trx,
            SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN voice_trx ELSE 0 END) mtd_voice_trx,
            COALESCE(ROUND(((SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN voice_trx ELSE 0 END)/SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN voice_trx ELSE 0 END)-1)*100),2),0) mom_voice_trx,
            (SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN voice_trx ELSE 0 END)-SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN voice_trx ELSE 0 END)) gap_voice_trx,
            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$last_m1' THEN voice_rev ELSE 0 END) fm_voice_rev,
            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN voice_rev ELSE 0 END) m1_voice_rev,
            SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN voice_rev ELSE 0 END) mtd_voice_rev,
            COALESCE(ROUND(((SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN voice_rev ELSE 0 END)/SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN voice_rev ELSE 0 END)-1)*100),2),0) mom_voice_rev,
            (SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN voice_rev ELSE 0 END)-SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN voice_rev ELSE 0 END)) gap_voice_rev,

            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$last_m1' THEN st_sp ELSE 0 END) fm_st_sp_trx,
            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN st_sp ELSE 0 END) m1_st_sp_trx,
            SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN st_sp ELSE 0 END) mtd_st_sp_trx,
            COALESCE(ROUND(((SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN st_sp ELSE 0 END)/SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN st_sp ELSE 0 END)-1)*100),2),0) mom_st_sp_trx,
            (SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN st_sp ELSE 0 END)-SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN st_sp ELSE 0 END)) gap_st_sp_trx,

            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$last_m1' THEN so_pair_so_sp ELSE 0 END) fm_so_pair_so_sp_trx,
            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN so_pair_so_sp ELSE 0 END) m1_so_pair_so_sp_trx,
            SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN so_pair_so_sp ELSE 0 END) mtd_so_pair_so_sp_trx,
            COALESCE(ROUND(((SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN so_pair_so_sp ELSE 0 END)/SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN so_pair_so_sp ELSE 0 END)-1)*100),2),0) mom_so_pair_so_sp_trx,
            (SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN so_pair_so_sp ELSE 0 END)-SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN so_pair_so_sp ELSE 0 END)) gap_so_pair_so_sp_trx,

            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$last_m1' THEN so_pair_rev_so ELSE 0 END) fm_so_pair_rev_so,
            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN so_pair_rev_so ELSE 0 END) m1_so_pair_rev_so,
            SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN so_pair_rev_so ELSE 0 END) mtd_so_pair_rev_so,
            COALESCE(ROUND(((SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN so_pair_rev_so ELSE 0 END)/SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN so_pair_rev_so ELSE 0 END)-1)*100),2),0) mom_so_pair_rev_so,
            (SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN so_pair_rev_so ELSE 0 END)-SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN so_pair_rev_so ELSE 0 END)) gap_so_pair_rev_so,

            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$last_m1' THEN st_vf ELSE 0 END) fm_st_vf_trx,
            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN st_vf ELSE 0 END) m1_st_vf_trx,
            SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN st_vf ELSE 0 END) mtd_st_vf_trx,
            COALESCE(ROUND(((SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN st_vf ELSE 0 END)/SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN st_vf ELSE 0 END)-1)*100),2),0) mom_st_vf_trx,
            (SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN st_vf ELSE 0 END)-SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN st_vf ELSE 0 END)) gap_st_vf_trx,

            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$last_m1' THEN so_pair_pair_vf ELSE 0 END) fm_so_pair_pair_vf_trx,
            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN so_pair_pair_vf ELSE 0 END) m1_so_pair_pair_vf_trx,
            SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN so_pair_pair_vf ELSE 0 END) mtd_so_pair_pair_vf_trx,
            COALESCE(ROUND(((SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN so_pair_pair_vf ELSE 0 END)/SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN so_pair_pair_vf ELSE 0 END)-1)*100),2),0) mom_so_pair_pair_vf_trx,
            (SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN so_pair_pair_vf ELSE 0 END)-SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN so_pair_pair_vf ELSE 0 END)) gap_so_pair_pair_vf_trx,

            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$last_m1' THEN so_pair_rev_pair ELSE 0 END) fm_so_pair_rev_pair,
            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN so_pair_rev_pair ELSE 0 END) m1_so_pair_rev_pair,
            SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN so_pair_rev_pair ELSE 0 END) mtd_so_pair_rev_pair,
            COALESCE(ROUND(((SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN so_pair_rev_pair ELSE 0 END)/SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN so_pair_rev_pair ELSE 0 END)-1)*100),2),0) mom_so_pair_rev_pair,
            (SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN so_pair_rev_pair ELSE 0 END)-SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN so_pair_rev_pair ELSE 0 END)) gap_so_pair_rev_pair,

            SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN so_pair_pair_in ELSE 0 END) pair_in,
            SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN so_pair_pair_out ELSE 0 END) pair_out,
            COALESCE(ROUND(((SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN so_pair_pair_in ELSE 0 END)/SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN so_pair_rev_pair ELSE 0 END))*100),2),0) per_pair_in,
            COALESCE(ROUND(((SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN so_pair_pair_out ELSE 0 END)/SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN so_pair_rev_pair ELSE 0 END))*100),2),0) per_pair_out,

            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$last_m1' THEN omset ELSE 0 END) fm_omset,
            SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN omset ELSE 0 END) m1_omset,
            SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN omset ELSE 0 END) mtd_omset,
            COALESCE(ROUND(((SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN omset ELSE 0 END)/SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN omset ELSE 0 END)-1)*100),2),0) mom_omset,
            (SUM(CASE WHEN `date` BETWEEN '$first_mtd' AND '$mtd' THEN omset ELSE 0 END)-SUM(CASE WHEN `date` BETWEEN '$first_m1' AND '$m1' THEN omset ELSE 0 END)) gap_omset
            FROM detail_outlets
            WHERE id_outlet='$id_outlet';";

        // die($query);


        $detail = DB::select(DB::raw($query));

        return $detail;
    }

    function convDate($tanggal)
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
