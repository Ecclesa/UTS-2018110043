@extends('layout.master')

@section('title','Detail')

@section('content')
<div class="container px-4 px-lg-5 mt-5">
    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start py-6">


        @forelse ($pokemons as $pokemon)

            @if ($pokemon->id != 1)
                @php
                    $poke = $pokemon->id - 2;
                @endphp
                <div class="col mb-1  col-md-6 col-sm-6 col-xs-12">
                    <a class="btn btn-danger btn-block" href="/detail/{{ $pokemon->id - 1 }}">
                        {{ str_pad($pokemon->id - 1, 5, '# 00', STR_PAD_LEFT) }}
                        {{ $evolutions[$poke]->name }} </a>
                </div>
            @else
                <div class="col mb-1  col-md-6 col-sm-6 col-xs-12">
                    <a class="btn btn-danger btn-block" hidden></a>
                </div>
            @endif

            @if ($pokemon->id != 151)
                @php
                    $poke = $pokemon->id;
                @endphp
                <div class="col mb-1  col-md-6 col-sm-6 col-xs-12">
                    <a class="btn btn-danger btn-block" href="/detail/{{ $pokemon->id + 1 }}">
                        {{ str_pad($pokemon->id + 1, 5, '# 00', STR_PAD_LEFT) }}
                        {{ $evolutions[$poke]->name }} </a>
                </div>
            @endif

        @empty
        @endforelse

    </div>
</div>

<div class="container px-4 px-lg-5 mt-5">
    @forelse ($pokemons as $pokemon)
        <div class="card h-100">
            <div class="row">
                <div class="col">
                    <img style="width: 100%; padding-top:175px; padding-left:25px" class="card-img-top"
                        src="../img/{{ $pokemon->image }}">
                    <div class="card-body p-4">
                    </div>
                </div>
                <div style="padding-top:55px;padding-right:75px" class="col">
                    <div style="font-size:20px">{{ str_pad($pokemon->id, 5, '# 00', STR_PAD_LEFT) }} </div>
                    <div style="font-size:55px">{{ $pokemon->name }}</div>
                    <div style="font-size:35px">Abilities</div>
                    <div style="font-size:20px">
                        @php
                            $abi = json_decode($pokemon->abilities);
                        @endphp
                        @foreach ($abi as $abil)
                            <div class="badge bg-dark text-white">
                                {{ $abil }}
                            </div>
                        @endforeach
                    </div>
                    <div style="font-size:35px">Profile</div>
                    <hr style="height:2px;border-width:0;color:gray;background-color:gray; opacity: 0.2">
                    <div class="row">
                        <div style="font-size:15px" class="col-auto font-weight-bold">
                            Height
                        </div>
                        <div style="font-size:15px" class="col">
                            {{ substr($pokemon->height * 3.28084, 0, -4) }} ft. ({{ $pokemon->height }}m)
                        </div>
                        <div style="font-size:15px" class="col-auto font-weight-bold">
                            Weight
                        </div>
                        <div style="font-size:15px" class="col">
                            {{ substr($pokemon->weight * 2.20462, 0, -3) }} lbs ({{ $pokemon->weight }}kg)
                        </div>
                    </div>
                    <hr style="height:2px;border-width:0;color:gray;background-color:gray; opacity: 0.2;">
                    <div class="row">
                        <div style="font-size:15px" class="col-auto font-weight-bold">
                            Species
                        </div>
                        <div style="font-size:15px" class="col">
                            {{ $pokemon->species }}
                        </div>
                        <div style="font-size:15px" class="col-auto font-weight-bold">
                            Types
                        </div>
                        <div style="font-size:15px" class="col">
                            @php
                                $type = json_decode($pokemon->types);
                            @endphp
                            @foreach ($type as $types)
                                <div class="badge bg-dark text-white">
                                    {{ $types }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <p style="font-size:35px; margin-top:30px">
                        Stats
                    </p>
                    <div class="row" style="padding:15px">
                        <div style="font-size:15px" class="col-auto">
                            <p class="col-auto font-weight-bold">HP</p>
                            <p class="col-auto font-weight-bold">Attack</p>
                            <p class="col-auto font-weight-bold">Defense</p>
                            <p class="col-auto font-weight-bold">Sp. Attack</p>
                            <p class="col-auto font-weight-bold">Sp. Defense</p>
                            <p class="col-auto font-weight-bold">Speed</p>
                        </div>
                        <div class="col">
                            <div class="progress" style="height: 15px">
                                <div class="progress-bar  bg-danger text-left" role="progressbar"
                                    style="width: {{ $pokemon->hp }}%; padding-left:7px"
                                    aria-valuenow="{{ $pokemon->hp }}" aria-valuemin="0" aria-valuemax="100">
                                    {{ $pokemon->hp }}
                                </div>
                            </div>
                            <div class="progress" style="height: 15px">
                                <div class="progress-bar  bg-warning text-left" role="progressbar"
                                    style="width: {{ $pokemon->attack }}%; padding-left:7px" aria-valuenow="{{ $pokemon->attack }}"
                                    aria-valuemin="0" aria-valuemax="100">
                                    {{ $pokemon->attack }}
                                </div>
                            </div>
                            <div class="progress" style="height: 15px">
                                <div class="progress-bar  bg-warning text-left" role="progressbar"
                                    style="width: {{ $pokemon->defense }}%; padding-left:7px"
                                    aria-valuenow="{{ $pokemon->defense }}" aria-valuemin="0" aria-valuemax="100">
                                    {{ $pokemon->defense }}
                                </div>
                            </div>
                            <div class="progress" style="height: 15px">
                                <div class="progress-bar  bg-primary text-left" role="progressbar"
                                    style="width: {{ $pokemon->sp_attack }}%; padding-left:7px"
                                    aria-valuenow="{{ $pokemon->sp_attack }}" aria-valuemin="0" aria-valuemax="100">
                                    {{ $pokemon->sp_attack }}
                                </div>
                            </div>
                            <div class="progress" style="height: 15px">
                                <div class="progress-bar  bg-success text-left" role="progressbar"
                                    style="width: {{ $pokemon->sp_defense }}%; padding-left:7px"
                                    aria-valuenow="{{ $pokemon->sp_defense }}" aria-valuemin="0" aria-valuemax="100">
                                    {{ $pokemon->sp_defense }}
                                </div>
                            </div>
                            <div class="progress" style="height: 15px">
                                <div class="progress-bar  bg-danger text-left" role="progressbar"
                                    style="width: {{ $pokemon->speed }}%; padding-left:7px" aria-valuenow="{{ $pokemon->speed }}"
                                    aria-valuemin="0" aria-valuemax="100">
                                    {{ $pokemon->speed }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                <div class="text-center" style="font-size:25px">
                    Evolutions
                </div>
                @php
                    $evo = json_decode($pokemon->evolutions);
                @endphp
                <div class="d-flex justify-content-center">
                    @if ($evo != null)
                        @forelse($evo as $evolusi)
                            <div class="col-3 col-sm-3" style="width:250px; height:250px">
                                <div class="card h-100">
                                    <div class="badge bg-dark text-white position-absolute"
                                        style="top: 0.5rem; right: 0.5rem; font-size: 10px">
                                        {{ str_pad($evolutions[$evolusi - 1]->id, 5, '# 00', STR_PAD_LEFT) }}
                                    </div>
                                    <center><a href="/detail/{{ $evolutions[$evolusi - 1]->id }}"><img
                                                class="card-img-top" style="width: 200px; height: 200px;padding:15px"
                                                src="../img/{{ $evolutions[$evolusi - 1]->image }}" alt="..."></a>
                                    </center>
                                    <div class="card-body p-1">
                                        <div class="text-center">
                                            <h2 class="fw-bolder">
                                                {{ $evolutions[$evolusi - 1]->name }}
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    @else
                        <div class="d-flex justify-content-center"
                            style="border:1px solid black; padding:10px; font-size:25px">
                            <a>No Evolution for this pokemon</a>
                        </div>
                    @endif
                </div>
            </div>

            @empty
        @endforelse
    </div>
@endsection


