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
                            News Letter
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                {!! Form::open(['url' => 'admin/news_letter','method' => 'POST','id' => 'news_letter_form']) !!}
                                <div class="form-group">
                                    {!! Form::label('title','Title', array('class' => 'control-label')) !!}
                                    {!! Form::text('title',null,['class'=>'form-control','required' => 'required','max'=>'100']) !!}                                   
                                </div>
                                <div class="form-group">
                                    {!! Form::label('message','Message', array('class' => 'control-label')) !!}
                                    {!! Form::textarea('message',null,['class'=>'form-control','rows' => 2, 'cols' => 40 ,'id' => 'message']) !!}                                   
                                </div>
                                <div class="form-group">
                                    {!! Form::submit('Send' ,['class'=>'btn btn-success pull-right']) !!}
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
    $('#news_letter_form').validator('update');
    CKEDITOR.replace('message',{});
</script>
@endsection