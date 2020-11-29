@extends('partials.layout')

@section('content')
<div class="container d-flex flex-column justify-content-center align-items-center mt-5">

    <h1 class="d-flex justify-content-center">Login</h1>


    <form class="form-horizontal w-50 text-center" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

        <div class="form-group mt-3{{ $errors->has('email') ? ' has-error' : '' }}">

            <div>
                <input id="email" placeholder="Email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group mt-3{{ $errors->has('password') ? ' has-error' : '' }}">

            <div>
                <input id="password" placeholder="Senha" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
        </div>


        <div>
            <a href="{{route('home')}}" class="btn btn-danger">Voltar</a>
            <button type="submit" class="btn btn-primary ">
                Login
            </button>
        </div>

    </form>


</div>
@endsection