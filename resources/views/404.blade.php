@extends('layout.master')

@section('title','404 Not Found')

@section('content')
<div style="padding-top: 50px" class="container px-4 px-lg-5 mb-5">
    <div class="card h-100">
        <div class="row">
            <div class="col">
                <div style="padding-top: 200px;">
                </div>
                <div style="font-size:50px; padding-left:50px" class="text-center">
                    Page Not Found!
                </div>
                <div style="font-size:25px; padding-left:50px" class="text-center">
                    Sorry! The page you're looking for is not here.
                </div>
                <div class="col">
                    <div style="font-size:50px; padding-left:40px" class="text-center">
                        <a style="font-size:25px" class="btn btn-primary btn-lg" href="/home">Go Back</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="container px-4 px-lg-5 mt-5">
                    <img style="width: 100%; padding-top:20px; padding-left:25px" class="card-img-top"
                        src="../img/psyduck.jpg">
                    <div class="card-body p-4">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
        </div>
    </div>
</div>

@endsection
