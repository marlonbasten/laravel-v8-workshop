@extends('layouts.app')

@section('title', 'Startseite')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-10">

                <div class="card">
                    <div class="card-header">Startseite</div>
                    {{-- Start content --}}
                    <div class="card-body">

                        <p>Hey, willkommen im Laravel 8 Workshop!</p>

                        @if ($file)
                            <img src="{{ asset('storage/'.$file->path) }}" alt="{{ $file->name }}">
                        @endif

                        <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="image" id="image">
                            <input type="submit" class="btn btn-primary" value="Hochladen">
                        </form>

                    </div>
                    {{-- End content --}}
                </div>

            </div>
        </div>
    </div>
@endsection