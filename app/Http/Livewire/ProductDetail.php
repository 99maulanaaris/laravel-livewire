<?php

namespace App\Http\Livewire;

use App\Pesanan;
use App\PesananDetail;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductDetail extends Component
{

    public $product, $nama, $nomer, $jumlah_pesanan;


    public function mount($id)
    {

        $productDetail = Product::find($id);

        if ($productDetail) {

            $this->product = $productDetail;
        }
    }



    public function save()
    {

        $this->validate([
            'jumlah_pesanan' => 'required',

        ]);

        // Validasi Jika Belum Login
        if (!Auth::user()) {
            return redirect()->route('login');
        }

        // Menghitung Total Harga
        if ($this->nama) {

            $total_harga = $this->jumlah_pesanan * $this->product->harga + $this->product->harga_nameset;
        } else {

            $total_harga = $this->jumlah_pesanan * $this->product->harga;
        }

        // Cek Apakah User Mempunyai Data Pesanan Utama

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();


        // Menyimpan / Update Pesanan Utama

        if (empty($pesanan)) {
            Pesanan::create([
                'user_id' => Auth::user()->id,
                'total_harga' => $total_harga,
                'status' => 0,
                'kode_unik' => mt_rand(100, 999),
            ]);
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            $pesanan->kode_pesanan = 'MP-' . $pesanan->id . '-' . date('d-m-Y');
            $pesanan->update();
        } else {

            $pesanan->total_harga = $pesanan->total_harga + $total_harga;
            $pesanan->update();
        }


        //Menyimpan Pesanan Detail
        PesananDetail::create([
            'product_id' => $this->product->id,
            'pesanan_id' => $pesanan->id,
            'jumlah_pesanan' => $this->jumlah_pesanan,
            'total_harga' => $total_harga,
            'nameset' => $this->nama ? true : false,
            'nama' => $this->nama,
            'nomer' => $this->nomer,
        ]);

        session()->flash('message', 'Sukses Masuk Kernjang');
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.product-detail');
    }
}
