<?php

use Illuminate\Database\Seeder;
use App\Peraturan;
use App\Bantuan;
use App\Topic;
use App\Question;

class Soal extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Peraturan1 = Peraturan::create(['peraturan'=>'Gunakan browser laptop/komputer dan memiliki koneksi yang stabil']);
        $Peraturan2 = Peraturan::create(['peraturan'=>'Terdapat 100 soal pilihan ganda']);
        $Peraturan3 = Peraturan::create(['peraturan'=>'Waktu pengerjaan: 60 menit']);
        $Peraturan4 = Peraturan::create(['peraturan'=>'Ketika waktu habis, jawaban akan otomatis tersubmit seadanya']);
        $Peraturan5 = Peraturan::create(['peraturan'=>'Logout atau menutup browser saat pengerjaan sama dengan diskualifikasi']);
        $Peraturan6 = Peraturan::create(['peraturan'=>'Hasil seleksi online akan diumumkan pada 24 Juli 2018']);
        $Peraturan7 = Peraturan::create(['peraturan'=>'Dipersilahkan berdoa sebelum memulai']);

    	$bantuan1 = Bantuan::create(['name'=>'Amalyara Putri', 'no'=>'082220704908', 'line'=>'amalyara19']);
    	$bantuan2 = Bantuan::create(['name'=>'Ekrak Puji Lestari', 'no'=>'089655687940', 'line'=>'ekri98']);
    }
}
