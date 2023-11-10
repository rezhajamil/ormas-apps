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
            $table->date('date');
            $table->text('no_rs');
            $table->text('id_outlet');
            $table->text('nama_outlet');
            $table->text('sf');
            $table->text('telp_pemilik');
            $table->text('sub_branch');
            $table->text('cluster');
            $table->text('tap_kcp');
            $table->text('side_id_cover');
            $table->text('kategori');
            $table->text('pareto');
            $table->text('frekuensi_kunjungan');
            $table->text('hari_kunjungan');
            $table->text('remark_fisik');
            $table->text('pjp');
            $table->text('kecamatan');
            $table->text('kabupaten');
            $table->text('cvm_target_trx');
            $table->text('cvm_target_rev');
            $table->text('cvm_trx');
            $table->text('cvm_rev');
            $table->text('cvm_remark_trx');
            $table->text('combo_sakti_target_trx');
            $table->text('combo_sakti_target_rev');
            $table->text('combo_sakti_trx');
            $table->text('combo_sakti_rev');
            $table->text('internet_sakti_target_trx');
            $table->text('internet_sakti_target_rev');
            $table->text('internet_sakti_trx');
            $table->text('internet_sakti_rev');
            $table->text('hot_promo_target_trx');
            $table->text('hot_promo_target_rev');
            $table->text('hot_promo_trx');
            $table->text('hot_promo_rev');
            $table->text('digital_target_trx');
            $table->text('digital_target_rev');
            $table->text('digital_trx');
            $table->text('digital_rev');
            $table->text('p1_legacy_trx');
            $table->text('voice_target_trx');
            $table->text('voice_target_rev');
            $table->text('voice_trx');
            $table->text('voice_rev');
            $table->text('vas_target_trx');
            $table->text('vas_target_rev');
            $table->text('vas_trx');
            $table->text('vas_rev');
            $table->text('productive_trx');
            $table->text('productive_rev');
            $table->text('st_sp_target');
            $table->text('st_sp');
            $table->text('st_vf_target');
            $table->text('st_vf');
            $table->text('so_pair_so_sp');
            $table->text('so_pair_rev_so');
            $table->text('so_pair_rev_pair');
            $table->text('so_pair_pair_vf');
            $table->text('so_pair_so_in');
            $table->text('so_pair_so_out');
            $table->text('so_pair_pair_in');
            $table->text('so_pair_pair_out');
            $table->text('so_usim');
            $table->text('renewal_akuisisi_target_trx');
            $table->text('renewal_akuisisi_target_rev');
            $table->text('renewal_akuisisi_trx');
            $table->text('renewal_akuisisi_rev');
            $table->text('omset_target');
            $table->text('omset');
            $table->text('super_seru_target_trx');
            $table->text('super_seru_target_rev');
            $table->text('super_seru_trx');
            $table->text('super_seru_rev');
            $table->text('kecamatan_lighthouse');
            $table->text('hrc_index');
            $table->unsignedInteger('created_by');
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
