<?php

namespace App\Http\Livewire;

use App\Pesanan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class History extends Component
{
    public $pesanan, $pesanan_detail;

    public function render()
    {

        // Mengambil History Pesanan yang sudah CheckOut

        if (Auth::user()) {

            $this->pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', '!=', 0)->get();
        }

        return view('livewire.history');
    }
}
