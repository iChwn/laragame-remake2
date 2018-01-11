<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable=['judul','judul_slug','spoiler','categori_id','deskripsi','deskripsi2','cover','views'];

    public function categori()
    {
    	return $this->belongsTo('App\Categori');
    }
}
