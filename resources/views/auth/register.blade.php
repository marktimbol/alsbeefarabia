@extends('public.layout.public')

@section('pageTitle', 'Register')

@section('bodyClass', 'page')

@section('content')


    <div class="row">
    
        <div class="col-md-12">
            <h2>Register</h2>
        </div>

        <div class="col-md-6">             
            <form method="POST" action="/auth/register">
                {!! csrf_field() !!}
                
                @include('errors.form')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="name" name="name" id="name" class="form-control" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Repeat Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>        

                <div>
                    <button type="submit" class="btn btn-default"><i class="fa fa-user"></i> Register</button>
                </div>
            </form>
        </div>
    </div>
   
@endsection