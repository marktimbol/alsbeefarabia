@extends('public.layout.public')

@section('pageTitle', 'Login')

@section('header_styles')
    <link rel="stylesheet" href="{{ elixir('css/sweetalert.css') }}" />
@endsection

@section('bodyClass', 'page')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Login</h2>
        </div>

        <div class="col-md-6">
            <form method="POST" action="/auth/login">
                {!! csrf_field() !!}
                
                @include('errors.form')

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" />
                </div>

                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember"> Remember Me
                    </label>
                </div>

                <div>
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-unlock-alt"></i> Login
                    </button>

                    <a href="{{ url('password/email') }}">Forgot password?</a>
                </div>
            </form>
        </div>
    </div>
  
@endsection

@section('footer_scripts')
    <script src="{{ elixir('js/sweetalert.js') }}"></script>
@endsection