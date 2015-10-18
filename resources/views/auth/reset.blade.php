@extends('public.layout.public')

@section('pageTitle', 'Reset Your Password')

@section('header_styles')
    <link rel="stylesheet" href="{{ elixir('css/sweetalert.css') }}" />
@endsection

@section('bodyClass', 'page')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Reset your password</h2>
        </div>

        <div class="col-md-6">

            <form method="POST" action="/password/reset">

                {!! csrf_field() !!}
             
                <input type="hidden" name="token" value="{{ $token }}">

                @include('errors.form')

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" />
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" />
                </div>

                <div>
                    <button type="submit" class="btn btn-default">
                        Reset Password
                    </button>
                </div>
            </form>
        </div>
    </div>
  
@endsection

@section('footer_scripts')
    <script src="{{ elixir('js/sweetalert.js') }}"></script>
@endsection