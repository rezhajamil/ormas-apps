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

    public static function detail_mobile($id_outlet, $start_date, $end_date)
    {
        $start_date_m1 = date('Y-m-d', strtotime('-1 month', strtotime($start_date)));
        $end_date_m1 = date('Y-m-d', strtotime('-1 month', strtotime($end_date)));
        $full_date_m1 = date('Y-m-t', strtotime('-1 month', strtotime($end_date)));

        $query =
            "SELECT 
            SUM(CASE WHEN a.date BETWEEN '$start_date' AND '$end_date' AND a.produk='PRODUCTIVE' THEN a.rev ELSE 0 END) AS rev_productive_mtd,
            SUM(CASE WHEN a.date BETWEEN '$start_date_m1' AND '$end_date_m1' AND a.produk='PRODUCTIVE' THEN a.rev ELSE 0 END) AS rev_productive_m1,
            SUM(CASE WHEN a.date BETWEEN '$start_date_m1' AND '$full_date_m1' AND a.produk='PRODUCTIVE' THEN a.rev ELSE 0 END) AS rev_productive_full_m1,
            SUM(CASE WHEN a.date BETWEEN '$start_date' AND '$end_date' AND a.produk='PRODUCTIVE' THEN a.trx ELSE 0 END) AS trx_productive_mtd,
            SUM(CASE WHEN a.date BETWEEN '$start_date_m1' AND '$end_date_m1' AND a.produk='PRODUCTIVE' THEN a.trx ELSE 0 END) AS trx_productive_m1,
            SUM(CASE WHEN a.date BETWEEN '$start_date_m1' AND '$full_date_m1' AND a.produk='PRODUCTIVE' THEN a.trx ELSE 0 END) AS trx_productive_full_m1,

            SUM(CASE WHEN a.date BETWEEN '$start_date' AND '$end_date' AND a.produk='CVM' THEN a.rev ELSE 0 END) AS rev_cvm_mtd,
            SUM(CASE WHEN a.date BETWEEN '$start_date_m1' AND '$end_date_m1' AND a.produk='CVM' THEN a.rev ELSE 0 END) AS rev_cvm_m1,
            SUM(CASE WHEN a.date BETWEEN '$start_date_m1' AND '$full_date_m1' AND a.produk='CVM' THEN a.rev ELSE 0 END) AS rev_cvm_full_m1,
            SUM(CASE WHEN a.date BETWEEN '$start_date' AND '$end_date' AND a.produk='CVM' THEN a.trx ELSE 0 END) AS trx_cvm_mtd,
            SUM(CASE WHEN a.date BETWEEN '$start_date_m1' AND '$end_date_m1' AND a.produk='CVM' THEN a.trx ELSE 0 END) AS trx_cvm_m1,
            SUM(CASE WHEN a.date BETWEEN '$start_date_m1' AND '$full_date_m1' AND a.produk='CVM' THEN a.trx ELSE 0 END) AS trx_cvm_full_m1,

            SUM(CASE WHEN a.date BETWEEN '$start_date' AND '$end_date' AND a.produk='SUPER SERU' THEN a.rev ELSE 0 END) AS rev_super_seru_mtd,
            SUM(CASE WHEN a.date BETWEEN '$start_date_m1' AND '$end_date_m1' AND a.produk='SUPER SERU' THEN a.rev ELSE 0 END) AS rev_super_seru_m1,
            SUM(CASE WHEN a.date BETWEEN '$start_date_m1' AND '$full_date_m1' AND a.produk='SUPER SERU' THEN a.rev ELSE 0 END) AS rev_super_seru_full_m1,
            SUM(CASE WHEN a.date BETWEEN '$start_date' AND '$end_date' AND a.produk='SUPER SERU' THEN a.trx ELSE 0 END) AS trx_super_seru_mtd,
            SUM(CASE WHEN a.date BETWEEN '$start_date_m1' AND '$end_date_m1' AND a.produk='SUPER SERU' THEN a.trx ELSE 0 END) AS trx_super_seru_m1,
            SUM(CASE WHEN a.date BETWEEN '$start_date_m1' AND '$full_date_m1' AND a.produk='SUPER SERU' THEN a.trx ELSE 0 END) AS trx_super_seru_full_m1,

            SUM(CASE WHEN a.date BETWEEN '$start_date' AND '$end_date' AND a.produk='COMBO SAKTI' THEN a.rev ELSE 0 END) AS rev_combo_sakti_mtd,
            SUM(CASE WHEN a.date BETWEEN '$start_date_m1' AND '$end_date_m1' AND a.produk='COMBO SAKTI' THEN a.rev ELSE 0 END) AS rev_combo_sakti_m1,
            SUM(CASE WHEN a.date BETWEEN '$start_date_m1' AND '$full_date_m1' AND a.produk='COMBO SAKTI' THEN a.rev ELSE 0 END) AS rev_combo_sakti_full_m1,
            SUM(CASE WHEN a.date BETWEEN '$start_date' AND '$end_date' AND a.produk='COMBO SAKTI' THEN a.trx ELSE 0 END) AS trx_combo_sakti_mtd,
            SUM(CASE WHEN a.date BETWEEN '$start_date_m1' AND '$end_date_m1' AND a.produk='COMBO SAKTI' THEN a.trx ELSE 0 END) AS trx_combo_sakti_m1,
            SUM(CASE WHEN a.date BETWEEN '$start_date_m1' AND '$full_date_m1' AND a.produk='COMBO SAKTI' THEN a.trx ELSE 0 END) AS trx_combo_sakti_full_m1,

            SUM(CASE WHEN a.date BETWEEN '$start_date' AND '$end_date' AND a.produk='HOT PROMO' THEN a.rev ELSE 0 END) AS rev_hot_promo_mtd,
            SUM(CASE WHEN a.date BETWEEN '$start_date_m1' AND '$end_date_m1' AND a.produk='HOT PROMO' THEN a.rev ELSE 0 END) AS rev_hot_promo_m1,
            SUM(CASE WHEN a.date BETWEEN '$start_date_m1' AND '$full_date_m1' AND a.produk='HOT PROMO' THEN a.rev ELSE 0 END) AS rev_hot_promo_full_m1,
            SUM(CASE WHEN a.date BETWEEN '$start_date' AND '$end_date' AND a.produk='HOT PROMO' THEN a.trx ELSE 0 END) AS trx_hot_promo_mtd,
            SUM(CASE WHEN a.date BETWEEN '$start_date_m1' AND '$end_date_m1' AND a.produk='HOT PROMO' THEN a.trx ELSE 0 END) AS trx_hot_promo_m1,
            SUM(CASE WHEN a.date BETWEEN '$start_date_m1' AND '$full_date_m1' AND a.produk='HOT PROMO' THEN a.trx ELSE 0 END) AS trx_hot_promo_full_m1,

            SUM(CASE WHEN a.date BETWEEN '$start_date' AND '$end_date' AND a.produk='INTERNET SAKTI' THEN a.rev ELSE 0 END) AS rev_internet_sakti_mtd,
            SUM(CASE WHEN a.date BETWEEN '$start_date_m1' AND '$end_date_m1' AND a.produk='INTERNET SAKTI' THEN a.rev ELSE 0 END) AS rev_internet_sakti_m1,
            SUM(CASE WHEN a.date BETWEEN '$start_date_m1' AND '$full_date_m1' AND a.produk='INTERNET SAKTI' THEN a.rev ELSE 0 END) AS rev_internet_sakti_full_m1,
            SUM(CASE WHEN a.date BETWEEN '$start_date' AND '$end_date' AND a.produk='INTERNET SAKTI' THEN a.trx ELSE 0 END) AS trx_internet_sakti_mtd,
            SUM(CASE WHEN a.date BETWEEN '$start_date_m1' AND '$end_date_m1' AND a.produk='INTERNET SAKTI' THEN a.trx ELSE 0 END) AS trx_internet_sakti_m1,
            SUM(CASE WHEN a.date BETWEEN '$start_date_m1' AND '$full_date_m1' AND a.produk='INTERNET SAKTI' THEN a.trx ELSE 0 END) AS trx_internet_sakti_full_m1,

            SUM(CASE WHEN a.date BETWEEN '$start_date' AND '$end_date' AND a.produk='DIGITAL' THEN a.rev ELSE 0 END) AS rev_digital_mtd,
            SUM(CASE WHEN a.date BETWEEN '$start_date_m1' AND '$end_date_m1' AND a.produk='DIGITAL' THEN a.rev ELSE 0 END) AS rev_digital_m1,
            SUM(CASE WHEN a.date BETWEEN '$start_date_m1' AND '$end_date_m1' AND a.produk='DIGITAL' THEN a.rev ELSE 0 END) AS rev_digital_full_m1,
            SUM(CASE WHEN a.date BETWEEN '$start_date' AND '$end_date' AND a.produk='DIGITAL' THEN a.trx ELSE 0 END) AS trx_digital_mtd,
            SUM(CASE WHEN a.date BETWEEN '$start_date_m1' AND '$end_date_m1' AND a.produk='DIGITAL' THEN a.trx ELSE 0 END) AS trx_digital_m1,
            SUM(CASE WHEN a.date BETWEEN '$start_date_m1' AND '$end_date_m1' AND a.produk='DIGITAL' THEN a.trx ELSE 0 END) AS trx_digital_full_m1,

            SUM(CASE WHEN a.date BETWEEN '$start_date' AND '$end_date' AND a.produk='VOICE' THEN a.rev ELSE 0 END) AS rev_voice_mtd,
            SUM(CASE WHEN a.date BETWEEN '$start_date_m1' AND '$end_date_m1' AND a.produk='VOICE' THEN a.rev ELSE 0 END) AS rev_voice_m1,
            SUM(CASE WHEN a.date BETWEEN '$start_date_m1' AND '$end_date_m1' AND a.produk='VOICE' THEN a.rev ELSE 0 END) AS rev_voice_full_m1,
            SUM(CASE WHEN a.date BETWEEN '$start_date' AND '$end_date' AND a.produk='VOICE' THEN a.trx ELSE 0 END) AS trx_voice_mtd,
            SUM(CASE WHEN a.date BETWEEN '$start_date_m1' AND '$end_date_m1' AND a.produk='VOICE' THEN a.trx ELSE 0 END) AS trx_voice_m1,
            SUM(CASE WHEN a.date BETWEEN '$start_date_m1' AND '$end_date_m1' AND a.produk='VOICE' THEN a.trx ELSE 0 END) AS trx_voice_full_m1

            FROM results a
            WHERE a.id_outlet='$id_outlet' AND a.date BETWEEN '$start_date_m1' AND '$end_date'";

        // ddd($query);


        $detail = DB::select(DB::raw($query));

        return $detail;
    }
}
