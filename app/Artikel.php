<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $fillable = [
        'judul' , 'slug', 'foto',
        'konten', 'id_tag', 'id_kategori'
    ];
    public function artikel(){
        return $this->belongsTo('App\Artikel','artikel_tag','id_tag','id_artikel');
    }
    public function user(){
        return $this->belongsTo('App\User','id_user');
    }
    public function kategori(){
        return $this->belongsTo('App\kategori','id_kategori');
    }
    public function tag(){
        return $this->belongsToMany('App\Tag','artikel_tag','id_artikel','id_tag');
        
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

}