@extends('public.layout.public')

@section('pageTitle', 'Recover your password')

@section('header_styles')
    <link rel="stylesheet" href="{{ elixir('css/sweetalert.css') }}" />
@endsection

@section('bodyClass', 'page')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Recover your password</h2>
        </div>

        <div class="col-md-6">

            <form method="POST" action="/password/email">
                {!! csrf_field() !!}

                @include('errors.form')

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="name" class="form-control" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-default">
                        Send Password Reset Link
                    </button>
                </div>
            </form>
        </div>
    </div>
  
@endsection

@section('footer_scripts')
    <script src="{{ elixir('js/sweetalert.js') }}"></script>
@endsection