<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMutabaahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mutabaahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->date('tanggal_isi');
            $table->integer('sholat_subuh');
            $table->integer('sholat_dzuhur');
            $table->integer('sholat_ashar');
            $table->integer('sholat_maghrib');
            $table->integer('sholat_isya');
            $table->integer('qobla_subuh');
            $table->integer('qobla_dzuhur');
            $table->integer('bada_dzuhur');
            $table->integer('bada_maghrib');
            $table->integer('bada_isya');
            $table->integer('tahajud');
            $table->integer('witir');
            $table->integer('dhuha');
            $table->integer('al_matsurat');
            $table->integer('tilawah_quran');
            $table->integer('baca_terjemahan_quran');
            $table->integer('tahfizh_quran');
            $table->string('surah_terakhir');
            $table->integer('shaum_sunnah');
            $table->integer('infaq');
            $table->integer('baca_buku');
            $table->integer('kajian_keilmuan');
            $table->integer('tarawih')->nullable();
            $table->integer('shaum_ramadhan')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mutabaahs');
    }
}
