<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    use HasFactory;
    protected $table = "states";
    protected $guarded = [];

    public function r_countries(){
        return $this->belongsTo(Countries::class,'country_id', 'id');
    } 
}
