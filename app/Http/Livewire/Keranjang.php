<?php

namespace App\Http\Livewire;

use App\Pesanan;
use App\PesananDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Keranjang extends Component
{
    protected $pesanan, $pesanan_details = [];


    public function destroy($id)
    {
        $pesanan_detail = PesananDetail::find($id);
        if (!empty($pesanan_detail)) {

            // Ambil Pesanan Dengan Id Yang Di kirimkan

            $pesanans = Pesanan::where('id', $pesanan_detail->pesanan_id)->first();

            //Cek Ada Berapa banyak jersey dalam pesanan
            $jumlah_pesanan_detail = PesananDetail::where('pesanan_id', $pesanans->id)->count();

            if ($jumlah_pesanan_detail === 1) {

                // Jika Hanya satu produk maka di hapus
                $pesanans->delete();
            } else {

                // Jika Pesanan lebih dari satu maka total harga dari pesanan akan dikurangi dengan 
                // total harga dari total harga id pesanan detail yang dikirimkan

                $pesanans->total_harga = $pesanans->total_harga - $pesanan_detail->total_harga;
                $pesanans->update();
            }

            $pesanan_detail->delete();
        }
        $this->emit('Keranjang');
        session()->flash('message', 'Pesanan Dihapus');
    }

    public function render()
    {
        if (Auth::user()) {
            $this->pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

            if ($this->pesanan) {
                $this->pesanan_details = PesananDetail::where('pesanan_id', $this->pesanan->id)->get();
            }
        }

        return view('livewire.keranjang', [

            'pesanan' => $this->pesanan,
            'pesanan_details' => $this->pesanan_details
        ]);
    }
}
