<div class="container">
    {{-- SLIDER --}}
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="/assets/slider/slider1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="/assets/slider/slider1.png" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    {{-- PILIH LIGA --}}

    <section class="pilih-liga mt-4">
        <h3><strong>Pilih Liga</strong></h3>
        <div class="row mt-4">
            @foreach ($ligas as $liga)
                
            <div class="col">
                <div class="card shadow">
                    <div class="card-body text-center">
                    <img src="/assets/liga/{{$liga->gambar}}" class="img-fluid">
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </section>

    <section class="products mt-5 mb-4">
        <h3><strong>Best Products</strong></h3>
        <div class="row mt-4">
            @foreach ($products as $product)
                
            <div class="col-md-3">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <img src="/assets/jersey/{{$product->gambar}}" class="img-fluid">
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <h5><strong>{{$product->nama}}</strong></h5>
                                <h5>Rp. {{number_format($product->harga)}}</h5>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <a href="#" class="btn btn-dark btn-block">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </section>
</div>
