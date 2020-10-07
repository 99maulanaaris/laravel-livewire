<div class="container">
  <div class="row mb-2">
        <div class="col-md-9">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="{{route('home')}}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item "><a href="{{route('keranjang')}}" class="text-dark">Keranjang</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        @if (session()->has('message'))
            <div class="alert alert-danger">
              {{session('message')}}
            </div>
        @endif
      </div>
    </div>

    <div class="row">
        <div class="col">
            <a href="{{route('keranjang')}}" class="btn btn-sm btn-dark">
                <i class="fas fa-arrow-left"></i>
                Kembali
            </a>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col">
            <h4>Informasi Pembayaran</h4>
            <hr>
            <p>Transfer Ke rekening dibawah ini sebesar : <strong> Rp.{{number_format($total_harga)}}</strong></p>
            <div class="media">
                <img class="mr-3" src="/assets/bri.png" alt="Bank BRI" width="70px">
                <div class="media-body">
                    <h5 class="mt-0">Bank BRI</h5>
                    No.Rekening : 192168-11778-09 a/n <strong>Maulana</strong>
                </div>
            </div>
        </div>
        <div class="col">
            <h4>Informasi Penggiriman</h4>
            <hr>
            <form wire:submit.prevent="checkout">

                <div class="form-group">
                    <label for="">No Hp</label>
                        
                    <input id="nohp" type="text" class="form-control @error('nohp') is-invalid @enderror" wire:model="nohp" value="{{ old('nohp') }}" autocomplete="off" autofocus>
                    @error('nohp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="alamat">alamat</label>
                
                    <textarea wire:model="alamat"class="form-control @error('alamat') is-invalid @enderror"></textarea>
                    @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-dark btn-block"><i class="fas fa-arrow-right"></i> Check Out</button>


            </form>
        </div>
    </div>

</div>
