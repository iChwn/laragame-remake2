<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alert;

class Categori extends Model
{
    protected $fillable = ['categori'];

    public function berita()
    {
    	return $this->hasMany('App\Berita');
    }

    public static function boot()
    {
    	parent::boot();

    	self::deleting(function($categori){
    		//mengecek apakah categori mempunai berita
    		if($categori->berita->count() > 0) {
    			//menyiapkan pesan error
    			$html = 'Categori tidak bisa dihapus karena memiliki berita : ';
    			$html = '<ul>';
    			foreach ($categori->berita as $data) {
    				$html = "<li>$data->judul</li>";
    			}
    			$html .='</ul>';
                Alert::error('Tidak bisa menghapus kategori karna masih memiliki berita ','Gagal !!')->persistent('Close');
    			
    			//membatalkan
    			return false;
    		}
    	});
    }
}
