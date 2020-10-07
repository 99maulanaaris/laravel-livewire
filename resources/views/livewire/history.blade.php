<div>
    <div class="container">
  <div class="row mb-2">
        <div class="col-md-9">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item "><a href="{{route('home')}}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">History</li>
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

   <div class="row mt-4">
       <div class="col">
            <div class="table-responsive">
                <table class="table text-center text-uppercase">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Tanggal Pesan</td>
                            <td>Kode Pemesanan</td>
                            <td>Pesanan</td>
                            <td>Status</td>
                            <td><strong>Total Harga</strong></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody >
                        <tr>
                            @forelse ($pesanan as $pesan)
                            <tr>
                                
                                <td>{{$loop->iteration}}</td>
                                
                                <td>{{$pesan->created_at}}</td>
                                
                                <td>{{$pesan->kode_pesanan}}</td>

                                <td>
                                @php
                                    $pesanan_detail = \App\PesananDetail::where('pesanan_id',$pesan->id)->get();    
                                @endphp
                                @foreach ($pesanan_detail as $pesanan)
                                    <img src="/assets/jersey/{{$pesanan->product->gambar}}" class="img-fluid" width="40">
                                    {{$pesanan->product->nama}}
                                    <br>
                                @endforeach
                                </td>


                                <td>
                                    @if ($pesan->status == 1)
                                    Belum Lunas
                                    @else
                                    Lunas
                                    @endif
                                </td>

                                <td><strong>Rp. {{number_format($pesanan->total_harga)}}</strong></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7">Data Kosong</td>
                            </tr>
                            @endforelse
                           
                        </tr>
                    </tbody>
                </table>
            </div>
       </div>
   </div>

   <div class="row">
       <div class="col">
           <div class="card">
            <div class="card-body shadow">
                <p>Transfer Ke rekening dibawah ini</p>
                <div class="media">
                    <img class="mr-3" src="/assets/bri.png" alt="Bank BRI" width="70px">
                    <div class="media-body">
                        <h5 class="mt-0">Bank BRI</h5>
                        No.Rekening : 192168-11778-09 a/n <strong>Maulana</strong>
                    </div>
                </div>
            </div>
           </div>
       </div>
   </div>

</div>

</div>
