<div class="form-group">
    {!! Form::label('type_en','Type EN', array('class' => 'control-label')) !!}
    {!! Form::text('type_en',null,['class'=>'form-control','required' => 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('type_gr','Type Greek', array('class' => 'control-label')) !!}
    {!! Form::text('type_gr',null,['class'=>'form-control','required' => 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('type_ru','Type RUSSIAN', array('class' => 'control-label')) !!}
    {!! Form::text('type_ru',null,['class'=>'form-control','required' => 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('type_he','Type Hebrew', array('class' => 'control-label')) !!}
    {!! Form::text('type_he',null,['class'=>'form-control','required' => 'required']) !!}
</div>


<div class="form-group">
    {!! Form::submit(isset($faq) ? 'Update' : 'Save' ,['class'=>'btn btn-success pull-right']) !!}
    <a class="btn btn-danger pull-right mr-5" href="<?=URL::to('/')?>/{{$resource}}">Cancel</a>
</div>

@section('scripts')
<script type="text/javascript">
    $('#faq_form').validator('update');
</script>
@endsection
