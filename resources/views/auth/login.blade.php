@extends('layouts.app')

@section('content')
<div class="container" style="width:40%">
    <div class="form-horizontal">
        <div class="form-group">
            <div class="col-sm-10">
                <a class="btn btn-block btn-social btn-facebook" href="/login/facebook">
                    <span class="fa fa-facebook"></span> Sign in with Facebook
                </a>
                <a class="btn btn-block btn-social btn-twitter" href="/login/twitter">
                    <span class="fa fa-twitter"></span> Sign in with Twitter
                </a>
                <a class="btn btn-block btn-social btn-linkedin" href="/login/linkedin">
                    <span class="fa fa-linkedin"></span> Sign in with Linkedin
                </a>
            </div>
        </div>
    </div>

    <div class="col-sm-10">
        <div class="hr-sect">or</div>
    </div>

    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <div class="col-sm-10">
                <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus> @if ($errors->has('email'))
                <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span> @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <div class="col-sm-10">
                <input id="password" type="password" class="form-control" placeholder="Password" class="form-control" name="password" required> @if ($errors->has('password'))
                <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span> @endif
            </div>
            <a class="btn btn-link" href="{{ route('password.request') }}">
            Forgot Your Password?
        </a>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" {{ old( 'remember') ? 'checked' : '' }}> Remember Me
                    </label>
                </div>
            </div>
        </div>

    </form>
</div>
@endsection
