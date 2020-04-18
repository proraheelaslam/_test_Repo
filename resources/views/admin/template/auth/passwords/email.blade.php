@extends('admin.layout.auth')

<!-- Main Content -->
@section('content')
<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/password/email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->



 <div class="container">


                        

      <form class="form-signin" role="form" method="POST" action="{{ url('/admin/forget_password') }}">
        {{ csrf_field() }}
        <h2 class="form-signin-heading">Reset Password</h2>
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

                 <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong style="color: red;">{{ $errors->first('email') }}</strong>
                    </span>
                @endif
             

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong style="color: red;">{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            
            <button type="submit" class="btn btn-lg btn-login btn-block">
                Send Password Reset Link
            </button>
            <a href="{{ url('/admin/login') }}"> Back to login</a>
        </div>
      </form>

    </div>


@endsection
