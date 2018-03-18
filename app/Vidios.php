<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vidios extends Model
{
    protected $fillable=['judul','link','link_id','berita_id','cover'];

    public function berita()
    {
    	return $this->belongsTo('App\Berita');
    }
    // public function categori()
    // {
    // 	return $this->belongsTo('App\Categori');
    // }
}
