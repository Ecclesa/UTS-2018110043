@extends('layout.master')

@section('title','Home')

@section('content')
<p>
<div style="padding-left: 125px; padding-right: 125px">
    <div class="card-body">
        <form action="/home/search" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" name="cari" placeholder="Mencari Pokemon ..">
                <button type="submit" id="button-search" class="btn btn-danger">Search Pokemon</button>
            </div>
        </form>
    </div>
</div>
</p>



<div class="nav-scroller py-1 mb-1" style="padding-left: 125px; padding-right: 125px">
    <nav class="nav d-flex justify-content-between">

        <div class="col-xl-6 col-md-3">
            <div style="font-size: 25px" class="card-body; bg-warning text-black mb-4 text-center">

                <a href="/home/surprise">Surprise Me!</a>

            </div>
        </div>


        <div class="col-xl-6 col-md-3">
            <a style="font-size: 20px" class="btn btn-primary btn-block dropdown-toggle" href="#"
                data-toggle="dropdown">Order by</a>
            <div class="dropdown-menu  btn-block">
                <a class="dropdown-item" href="/home/lowest">Lowest Number</a>
                <a class="dropdown-item" href="/home/highest">Highest Number</a>
                <a class="dropdown-item" href="/home/AZ">A-Z</a>
                <a class="dropdown-item" href="/home/ZA">Z-A</a>
            </div>
        </div>

    </nav>
</div>






<div class="container px-4 px-lg-5 mt-5">
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
        @forelse ($pokemons as $pokemon)
            <div class="col mb-5">
                <div class="card h-100">
                    <div class="badge bg-dark text-white position-absolute"
                        style="top: 0.5rem; right: 0.5rem; font-size: 10px">
                        {{ str_pad($pokemon->id, 5, '# 00', STR_PAD_LEFT) }}
                    </div>
                    <a href="/detail/{{ $pokemon->id }}"><img class="card-img-top"
                            style="width: 200x; height: 200px; padding:15px" src="../img/{{ $pokemon->image }}" alt="..."></a>
                    <div class="card-body p-4">
                        <div class="text-center">
                            <h2 class="fw-bolder">
                                {{ $pokemon->name }}
                            </h2>
                            <h2 class="container">
                                @php
                                    $type = json_decode($pokemon->types);
                                @endphp
                                @foreach ($type as $types)
                                    <div class="badge bg-dark text-white">
                                        {{ $types }}
                                    </div>
                                @endforeach
                            </h2>


                        </div>
                    </div>
                </div>
            </div>
        @empty
        @endforelse
    </div>
</div>
@endsection
