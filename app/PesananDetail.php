<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    public function pesanan(){
        
        return $this->belongsTo(Pesanan::class);
    }

    public function product(){
        
        return $this->belongsTo(Product::class);
    }
}
