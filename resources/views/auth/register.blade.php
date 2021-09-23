@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-6">

                <div class="card">
                    <div class="card-header">Registrieren</div>
                    {{-- Start content --}}
                    <div class="card-body">

                        @include('components.errors')

                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="email">E-Mail</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Passwort</label>
                                <input type="password" id="password" name="password" class="form-control" required autocomplete="current-password">
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Passwort wiederholen</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required autocomplete="new-password">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Registrieren">
                            </div>
                        </form>

                    </div>
                    {{-- End content --}}
                </div>

            </div>
        </div>
    </div>
@endsection
