<?php

use Illuminate\Database\Seeder;
use App\Categori;
use App\Berita;
use App\User;

class BeritasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Sample categori
        $categori1 = Categori::create(['categori'=>'RPG']);
        $categori2 = Categori::create(['categori'=>'FPS']);
        $categori3 = Categori::create(['Categori'=>'RACING']);

        //sample berita
        $berita1 = Berita::create(['judul'=>'Legend of Zenonia','judul_slug'=>'lalala lili','spoiler'=>'Kisah Petualangan','deskripsi'=>'Kisah Petualangan','deskripsi2'=>'Perang dunia ke 2','views'=>'0','categori_id'=>$categori1->id,'authors'=>'Admin']);
        
        $berita2 = Berita::create(['judul'=>'Battlefiled','judul_slug'=>'lalala lili','spoiler'=>'Perang dunia ke 1','deskripsi'=>'Perang dunia ke 1','deskripsi2'=>'Perang dunia ke 2','views'=>'0','categori_id'=>$categori2->id,'authors'=>'Admin']);
        $berita3 = Berita::create(['judul'=>'Asphalt Runner','judul_slug'=>'lalala lili','spoiler'=>'Game Balap Mobil','deskripsi'=>'Game Balapan Mobil Terbaru','deskripsi2'=>'Perang dunia ke 2','views'=>'0','categori_id'=>$categori3->id,'authors'=>'Admin']);
        $berita4 = Berita::create(['judul'=>'COD MWII','judul_slug'=>'lalala lili','spoiler'=>'Game Perang','deskripsi'=>'Perang dunia ke 2','deskripsi2'=>'Perang dunia ke 2','views'=>'0','categori_id'=>$categori3->id,'authors'=>'Admin']);

        //Sempel Peminjaman Buku
  /* minjam      $member = User::where('email','member@gmail.com')->first();
        BorrowLog::create(['user_id'=>$member->id,'berita_id'=>$berita1->id,'is_returned'=> 0]);
        BorrowLog::create(['user_id'=>$member->id,'berita_id'=>$berita2->id,'is_returned'=> 0]);
        BorrowLog::create(['user_id'=>$member->id,'berita_id'=>$berita3->id,'is_returned'=> 1]);
  */
    
    }
}
