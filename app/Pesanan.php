<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    public function pesanan_details(){
        
        return $this->hasMany(PesananDetail::class);
    }

    public function user(){
        
        return $this->belongsTo(User::class);
    }
}
