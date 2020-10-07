<?php

namespace App\Http\Livewire;

use App\Pesanan;
use App\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Checkout extends Component
{

    public $total_harga, $nohp, $alamat;

    public function mount()
    {

        if (!Auth::user()) {

            return redirect()->route('login');
        }

        //Jika No Hp dan alamat sudah pernah di isi maka tampilkan 

        $this->nohp = Auth::user()->no_hp;
        $this->alamat = Auth::user()->alamat;

        // Ambil Total Harga Dari Table Pesanan

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        if (!empty($pesanan)) {

            $this->total_harga = $pesanan->total_harga + $pesanan->kode_unik;
        } else {

            return redirect()->route('home');
        }
    }

    public function checkout()
    {
        $this->validate([
            'nohp' => 'required',
            'alamat' => 'required',

        ]);

        // Simpan No hp dan Alamat k Database User

        $user = User::where('id', Auth::user()->id)->first();
        $user->no_hp = $this->nohp;
        $user->alamat = $this->alamat;
        $user->update();

        // Update status Pesanan yang sudah di check out

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan->status = 1;
        $pesanan->update();

        $this->emit('Keranjang');
        session()->flash('message', 'Sukses CheckOut');

        return redirect()->route('history');
    }

    public function render()
    {
        return view('livewire.checkout');
    }
}
