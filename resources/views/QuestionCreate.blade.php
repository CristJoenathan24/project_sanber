@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="card">
        <div class="card-header">
            <h3>Make A Discussion</h3>
        </div>
        <div class="card-body">
            <form role="form" method="POST" action="/question">
                @csrf
                @method("POST")
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Masukan Title" value="{{ old('title','') }}">
                </div>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="question">Question</label>
                    <input type="text" class="form-control" id="question" name="question" placeholder="Masukan question Anda" value="{{ old('question','') }}">
                </div>
                @error('question')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="tag">Tag</label>
                    <input type="text" class="form-control" id="tag" name="tag" placeholder="Masukan tag Anda" value="{{ old('tag','') }}">
                </div>
                @error('tag')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
