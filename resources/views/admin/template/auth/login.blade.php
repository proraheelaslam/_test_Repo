@extends('admin.layout.auth')

@section('content')
<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/admin/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->

 <div class="container">

    

      <form class="form-signin" role="form" method="POST" action="{{ url('/admin/login') }}">
        {{ csrf_field() }}
        <h2 class="form-signin-heading">sign in now</h2>
        <div class="login-wrap">
            <div class="user-login-info">
                @if (session('status'))
                    <div class="alert alert-success">
                        <button type="button" class="close close-sm" data-dismiss="alert">
                            <i class="fa fa-times"></i>
                        </button>
                        {{ session('status') }}
                    </div>
                @endif

                <input placeholder="Email" type="text" class="form-control" name="email" value="{{ old('email') }}" autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
               
                <input id="password" type="password" class="form-control" name="password" placeholder="Password">

                <label class="checkbox">
                <input name="remember" type="checkbox"> Remember me
                <span class="pull-right">
                    <a href="{{ url('/admin/password/reset') }}"> Forgot Your Password?</a>

                </span>
            </label>

               

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong style="color: red;">{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            

            <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>

           

        </div>

          

      </form>

    </div>

@endsection
