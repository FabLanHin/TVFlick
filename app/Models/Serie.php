<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;

    protected $fillable = [
    	'user_id', 'nameSerie', 'seasonSerie', 'platform', 'genreSerie', 'actorsSerie', 'rateSerie', 'statusSerie', 'synopsisSerie', 
    ];


    public function seasons(){
    	return $this->hasMany('App\Models\Season');
    }
}
