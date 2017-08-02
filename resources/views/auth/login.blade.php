@extends('layouts.fullscreen')

@section('content')
<div class="container full-height">
    <div class="row">
        <div class="col s12">
            <div class="content">
                <br>
                <br>
                <img src="images/chill-pill-logo-2.png" style="width:100px; margin: 0 auto; display: block;">
                <h5>Chill Pill</h5>
                <br>
                <br>
                <div class="row">
                    <form class="col s12" role="form" method="POST" action="{{ route('custom-login') }}" style="margin-bottom: 10px;">
                    {{ csrf_field() }}
                      <div class="row">
                        <div class="input-field col s8 offset-s2">
                          <input id="email" class="validate" type="email" name="email" value="{{ old('email') }}" required>
                          <label for="first_name">Username</label>
                        </div>
                      
                        <div class="input-field col s8 offset-s2">
                          <input class="validate" id="password" type="password" name="password" required>
                          <label for="password">Password</label>
                        </div>

                        <p class="center-align">
                          <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }} />
                          <label for="remember">Please keep me logged in</label>
                        </p>
                        @if ($errors->has('email'))
                          <p class="help-block center-align">
                            <strong>{{ $errors->first('email') }}</strong>
                          </p>
                        @endif
                      </div>
                      <button class="btn waves-effect waves-light" type="submit" name="action">Login
                        <i class="material-icons right">send</i>
                      </button>
                    </form>
                    <hr>
                    <p>No account yet? <a href="{{ route('signup') }}">Create One</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
