@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-6">

                <div class="card">
                    <div class="card-header">Anmelden</div>
                    {{-- Start content --}}
                    <div class="card-body">

                        @include('components.errors')

                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">E-Mail</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="password">Passwort</label>
                                <input type="password" id="password" name="password" class="form-control" required autocomplete="current-password">
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">Login speichern</label>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Anmelden">
                            </div>
                        </form>

                    </div>
                    {{-- End content --}}
                </div>

            </div>
        </div>
    </div>
@endsection
