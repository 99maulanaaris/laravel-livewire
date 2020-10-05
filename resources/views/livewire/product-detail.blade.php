<div class="container">
  <div class="row mb-2">
        <div class="col-md-9">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="{{route('home')}}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item "><a href="{{route('products')}}" class="text-dark">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Product Detail</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        @if (session()->has('message'))
            <div class="alert alert-success">
              {{session('message')}}
            </div>
        @endif
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="card gambar-product">
          <div class="card-body">
            <img src="/assets/jersey/{{$product->gambar}}" class="img-fluid">
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <h3><strong>{{$product->nama}}</strong></h3>
        <h4>
          Rp. {{number_format($product->harga)}}
          @if ($product->is_ready === 1)
          <span class="badge badge-success"><i class="fas fa-check"></i> Ready Stok</span>
          @else
          <span class="badge badge-danger"><i class="fas fa-times"></i> Stok Habis</span>
          @endif
        </h4>
        <hr>
        <div class="row">
          <div class="col">
            <form wire:submit.prevent="save">
              <table class="table" style="border-top:hidden">
                <tr>
                  <td>Liga</td>
                  <td>:</td>
                  <td><img src="/assets/liga/{{$product->liga->gambar}}" class="img-fluid" width="50px"></td>
                </tr>
                <tr>
                  <td>Jenis</td>
                  <td>:</td>
                  <td>{{$product->jenis}}</td>
                </tr>
                <tr>
                  <td>Berat</td>
                  <td>:</td>
                  <td>{{$product->berat}}</td>
                </tr>
                <tr>
                  <td>Jumlah</td>
                  <td>:</td>
                  <td>
                    <input id="jumlah_pesanan" type="text" class="form-control @error('jumlah_pesanan') is-invalid @enderror" wire:model="jumlah_pesanan" value="{{ old('jumlah_pesanan') }}" required autocomplete="name" autofocus>
                    @error('jumlah_pesanan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </td>
                </tr>
                @if ($jumlah_pesanan > 1)
                @else
                <tr>
                  <td colspan="3"><strong>NameSet (Isi Jika Pakai Nameset )</strong></td>
                </tr>
                <tr>
                  <td>Harga Nameset</td>
                  <td>:</td>
                  <td>{{number_format($product->harga_nameset)}}</td>
                </tr>
                
                <tr>
                  <td>Nama</td>
                  <td>:</td>
                  <td>
                    <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" wire:model="nama" value="{{ old('nama') }}" autocomplete="off" autofocus>
                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </td>
                </tr>

                <tr>
                  <td>Nomer</td>
                  <td>:</td>
                  <td>
                    <input id="nomer" type="number" class="form-control @error('nomer') is-invalid @enderror" wire:model="nomer" value="{{ old('nomer') }}"  autocomplete="off" autofocus>
                    @error('nomer')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </td>
                </tr>
                @endif
                <tr>
                  <td colspan="3">
                    <button type="submit" class="btn btn-dark btn-block" @if ($product->is_ready !== 1) hidden @endif> <i class="fas fa-shopping-cart"></i> Masukan Keranjang</button>
                  </td>
                </tr>
                

              </table>
            </form>
          </div>
        </div>
      </div>
    </div>

</div>