<div class="form-group required">
    {!! Form::label('type_id','Type', array('class' => 'control-label')) !!}
    {!!Form::Select('type_id', $types, null,['class'=>'form-control populate type_id', 'id'=>'type_id'])!!}
</div>

<div class="form-group required">
    {!! Form::label('question','English Question', array('class' => 'control-label')) !!}
    {!! Form::text('question',null,['class'=>'form-control','required' => 'required']) !!}
</div>

<div class="form-group required">
    {!! Form::label('question','Greek Question', array('class' => 'control-label')) !!}
    {!! Form::text('greek_question',null,['class'=>'form-control','required' => 'required']) !!}
</div>

<div class="form-group required">
    {!! Form::label('question','Russian Question', array('class' => 'control-label')) !!}
    {!! Form::text('russian_question',null,['class'=>'form-control','required' => 'required']) !!}
</div>

<div class="form-group required">
    {!! Form::label('question','Hebrew  Question', array('class' => 'control-label')) !!}
    {!! Form::text('hebrew_question',null,['class'=>'form-control','required' => 'required']) !!}
</div>

<div class="form-group required">
    {!! Form::label('answer','English Answer', array('class' => 'control-label')) !!}
    {!! Form::textarea('answer',null,['class'=>'form-control','rows' => 2, 'cols' => 40 ,'id' => 'answer']) !!}
</div>

<div class="form-group required">
    {!! Form::label('answer','Greek Answer', array('class' => 'control-label')) !!}
    {!! Form::textarea('greek_answer',null,['class'=>'form-control','rows' => 2, 'cols' => 40 ,'id' => 'answer']) !!}
</div>
<div class="form-group required">
    {!! Form::label('answer','Russian  Answer', array('class' => 'control-label')) !!}
    {!! Form::textarea('russian_answer',null,['class'=>'form-control','rows' => 2, 'cols' => 40 ,'id' => 'answer']) !!}
</div>
<div class="form-group required">
    {!! Form::label('answer','Hebrew Answer', array('class' => 'control-label')) !!}
    {!! Form::textarea('hebrew_answer',null,['class'=>'form-control','rows' => 2, 'cols' => 40 ,'id' => 'answer']) !!}
</div>


<div class="form-group">
    {!! Form::submit(isset($faq) ? 'Update' : 'Save' ,['class'=>'btn btn-success pull-right']) !!}
</div>

@section('scripts')

<script type="text/javascript">

    $('#faq_form').validator('update');
    CKEDITOR.replace('answer',{});
    CKEDITOR.replace('greek_answer',{});
    CKEDITOR.replace('russian_answer',{});
    CKEDITOR.replace('hebrew_answer',{});

    // $("#chk").change( function() {
    //   if ( $(this).is(":checked") ) {
    // 	 $(this).val(1);
    //   } else if ( $(this).not(":checked") ) {
    // 	 $(this).val(0);
    //   }
    // });

</script>
@endsection
