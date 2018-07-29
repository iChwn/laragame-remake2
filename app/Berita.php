<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
	use \Conner\Tagging\Taggable;
    protected $fillable=['judul','judul_slug','spoiler','categori_id','deskripsi','deskripsi2','cover','views','authors'];

    public function categori()
    {
    	return $this->belongsTo('App\Categori');
    }

    public function vidios()
    {
    	return $this->belongsTo('App\Vidios');
    }
}
