@extends('layouts.app')

@section('content')
<div>
    <!--rencana pake forelse karena buat index nampilin banyak-->
    <!--sama mau dikecilin biar jadi kotak aj gitu klu ini kan terlalu full tempatnya-->
    <div class="card mt-5">
        <div class="card-header">
            <h3 class="class-title">judul pertanyaan disini</h3>
            <span class="fc-light mr-3">waktu dibuat</span>
            <span class="fc-light mr-3">view count</span>
            <span class="fc-light mr-3">user point </span>
            <span class="fc-light mr-3">nama penanya</span>
        </div>

        <div class="card-body">
            <p>sdasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss</p>
            <form action="#" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="delete" class="btn btn-danger btn-md float-right">
              </form>
            <a href="#" class="btn btn-md btn-info float-right mr-2">edit</a>
            <p><a href="#" class="text-primary">tag</a></p> <!--klo dipencet kebuka semua pertanyaan yg sama tagnya tp klo ribet ga usa-->


            <a href=""class="btn btn-primary btn-sm">check answer</a><!--kepikirannya klo di klik pindah kehalaman show buat jawab-->
        </div>


    </div>
</div>
@endsection
