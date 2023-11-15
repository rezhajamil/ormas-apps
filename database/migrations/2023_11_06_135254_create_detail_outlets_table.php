<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailOutletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_outlets', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->text('no_rs')->nullable();
            $table->text('id_outlet')->nullable();
            $table->text('nama_outlet')->nullable();
            $table->text('sf')->nullable();
            $table->text('telp_pemilik')->nullable();
            $table->text('sub_branch')->nullable();
            $table->text('cluster')->nullable();
            $table->text('tap_kcp')->nullable();
            $table->text('side_id_cover')->nullable();
            $table->text('kategori')->nullable();
            $table->text('pareto')->nullable();
            $table->text('frekuensi_kunjungan')->nullable();
            $table->text('hari_kunjungan')->nullable();
            $table->text('remark_fisik')->nullable();
            $table->text('pjp')->nullable();
            $table->text('kecamatan')->nullable();
            $table->text('kabupaten')->nullable();
            $table->text('cvm_target_trx')->nullable();
            $table->text('cvm_target_rev')->nullable();
            $table->text('cvm_trx')->nullable();
            $table->text('cvm_rev')->nullable();
            $table->text('cvm_remark_trx')->nullable();
            $table->text('combo_sakti_target_trx')->nullable();
            $table->text('combo_sakti_target_rev')->nullable();
            $table->text('combo_sakti_trx')->nullable();
            $table->text('combo_sakti_rev')->nullable();
            $table->text('internet_sakti_target_trx')->nullable();
            $table->text('internet_sakti_target_rev')->nullable();
            $table->text('internet_sakti_trx')->nullable();
            $table->text('internet_sakti_rev')->nullable();
            $table->text('hot_promo_target_trx')->nullable();
            $table->text('hot_promo_target_rev')->nullable();
            $table->text('hot_promo_trx')->nullable();
            $table->text('hot_promo_rev')->nullable();
            $table->text('digital_target_trx')->nullable();
            $table->text('digital_target_rev')->nullable();
            $table->text('digital_trx')->nullable();
            $table->text('digital_rev')->nullable();
            $table->text('p1_legacy_trx_1')->nullable();
            $table->text('p1_legacy_trx_1_4')->nullable();
            $table->text('voice_target_trx')->nullable();
            $table->text('voice_target_rev')->nullable();
            $table->text('voice_trx')->nullable();
            $table->text('voice_rev')->nullable();
            $table->text('vas_target_trx')->nullable();
            $table->text('vas_target_rev')->nullable();
            $table->text('vas_trx')->nullable();
            $table->text('vas_rev')->nullable();
            $table->text('productive_trx')->nullable();
            $table->text('productive_rev')->nullable();
            $table->text('st_sp_target')->nullable();
            $table->text('st_sp')->nullable();
            $table->text('st_vf_target')->nullable();
            $table->text('st_vf')->nullable();
            $table->text('so_pair_so_sp')->nullable();
            $table->text('so_pair_rev_so')->nullable();
            $table->text('so_pair_rev_pair')->nullable();
            $table->text('so_pair_pair_vf')->nullable();
            $table->text('so_pair_so_in')->nullable();
            $table->text('so_pair_so_out')->nullable();
            $table->text('so_pair_pair_in')->nullable();
            $table->text('so_pair_pair_out')->nullable();
            $table->text('so_usim')->nullable();
            $table->text('renewal_akuisisi_target_trx')->nullable();
            $table->text('renewal_akuisisi_target_rev')->nullable();
            $table->text('renewal_akuisisi_trx')->nullable();
            $table->text('renewal_akuisisi_rev')->nullable();
            $table->text('omset_target')->nullable();
            $table->text('omset')->nullable();
            $table->text('super_seru_target_trx')->nullable();
            $table->text('super_seru_target_rev')->nullable();
            $table->text('super_seru_trx')->nullable();
            $table->text('super_seru_rev')->nullable();
            $table->text('kecamatan_lighthouse')->nullable();
            $table->text('hrc_index')->nullable();
            $table->text('pn_lh_banjir_cuan')->nullable();
            $table->text('pn_lh_cvm_hd')->nullable();
            $table->text('pn_lh_so_double_cuan')->nullable();
            $table->text('pn_lh_paket_sakti')->nullable();
            $table->text('pn_so_reguler')->nullable();
            $table->text('pn_super_seru')->nullable();
            $table->text('pn_prodi_hq')->nullable();
            $table->text('pl_andalan_comsak')->nullable();
            $table->text('pl_andalan_hot_promo')->nullable();
            $table->text('pl_tambuah')->nullable();
            $table->text('pl_lapau_sa')->nullable();
            $table->text('pl_andalan_digital')->nullable();
            $table->text('pl_all_prodi_lokal')->nullable();
            $table->text('histori_order_w_3')->nullable();
            $table->text('histori_order_w_2')->nullable();
            $table->text('histori_order_w_1')->nullable();
            $table->text('target_weekly_validity_3d')->nullable();
            $table->text('target_weekly_validity_5d')->nullable();
            $table->text('target_weekly_validity_7d')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->timestamps();

            $table->index('date');
            $table->index('no_rs');
            $table->index('id_outlet');
            $table->index('nama_outlet');
            $table->index('sf');
            $table->index('telp_pemilik');
            $table->index('sub_branch');
            $table->index('cluster');
            $table->index('tap_kcp');
            $table->index('side_id_cover');
            $table->index('kategori');
            $table->index('pareto');
            $table->index('frekuensi_kunjungan');
            $table->index('hari_kunjungan');
            $table->index('remark_fisik');
            $table->index('pjp');
            $table->index('kecamatan');
            $table->index('kabupaten');
            $table->index('kecamatan_lighthouse');
            $table->index('hrc_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_outlets');
    }
}
