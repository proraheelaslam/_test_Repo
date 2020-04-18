
@extends('admin.layout.auth')

@section('content')
<div class="container">

    
      <form class="form-signin" role="form" method="POST" action="{{ url('/admin/login') }}">
       {{ csrf_field() }}
        <h2 class="form-signin-heading">sign in now</h2>
        <div class="login-wrap">
            <div class="user-login-info">
                <input type="text" class="form-control" placeholder="Email Address" name="email" value="{{ old('email') }}" autofocus>
                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong style="color:red">{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                <input type="password" class="form-control" placeholder="Password" name="password">
                     @if ($errors->has('password'))
                          <span class="help-block">
                              <strong style="color:red">{{ $errors->first('password') }}</strong>
                          </span>
                        @endif
            </div>
            <label class="checkbox">
                <input type="checkbox" name="remember" > Remember me
                <span class="pull-right">
                    <a data-toggle="modal" href="{{ url('/admin/password/reset') }}"> Forgot Password?</a>

                </span>
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>

           

        </div>

          <!-- Modal -->
          
          <!-- modal -->

      </form>

    </div>
  
@endsection
