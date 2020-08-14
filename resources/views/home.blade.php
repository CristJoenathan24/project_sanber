@extends('layouts.app')

@section('content')
<div class="header" style="background-image: url('{{asset('photos/background-1.jpg')}}'); height:25vw">
    <div class="container text-center align-middle" style="color: white;">
        <div class="row align-items-center">
            <div class="col-md-12" style="margin-top: 8vw">
                <h1>Welcome To Our Website</h1>
            </div>
            <div class="col-md-12">
                <h3>The Place that every programmer gather and exchange opinion</h1>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
