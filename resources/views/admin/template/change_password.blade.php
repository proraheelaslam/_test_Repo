@extends('admin.template.template')

@section('content')

 <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->
        @include('admin/template/flash_messages')

            <div class="row">
                <div class="col-lg-12">




                        <section class="panel">
                            <header class="panel-heading">
                               {{$title}}
                            </header>
                            <div class="panel-body">
                                <div class="position-center">
                                    {!! Form::open(['url' => 'admin/change_password', 'files' => true]) !!}



                                    <div class="form-group">
                                        <label for="current-password">Old Password</label>
                                        <input class="form-control" name="current-password" id="current-password" type="password">
                                    </div>

                                    <div class="form-group">
                                        <label for="new-password">New Password</label>
                                        <input class="form-control" name="new-password" id="new-password" type="password">
                                    </div>

                                    <div class="form-group">
                                        <label for="new-password_confirmation">Password Confirmation</label>
                                        <input class="form-control" name="new-password_confirmation" id="new-password_confirmation" type="password">
                                    </div>




                                     <div class="form-group">
                                        {!! Form::submit('Change Password' ,['class'=>'btn btn-success']) !!}
                                    </div>


                                    {!! Form::close() !!}
                                </div>

                            </div>
                        </section>

                </div>

            </div>

        </section>
    </section>
    <!--main content end-->

@endsection

@section('scripts')
<script type="text/javascript">


</script>
@endsection
