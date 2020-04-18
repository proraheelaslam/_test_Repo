<div class="form-group required">
    {!! Form::label('type_id','Type', array('class' => 'control-label')) !!}
    {!!Form::Select('type_id', $types, null,['class'=>'form-control populate type_id', 'id'=>'type_id'])!!}
</div>

<div class="form-group required">
    {!! Form::label('question','Question', array('class' => 'control-label')) !!}
    {!! Form::text('question',null,['class'=>'form-control','required' => 'required']) !!}                                   
</div>

<div class="form-group required">
    {!! Form::label('answer','Answer', array('class' => 'control-label')) !!}
    {!! Form::textarea('answer',null,['class'=>'form-control','rows' => 2, 'cols' => 40 ,'id' => 'answer']) !!}                                   
</div>

<div class="form-group">
    {!! Form::submit(isset($faq) ? 'Update' : 'Save' ,['class'=>'btn btn-success pull-right']) !!}
</div>

@section('scripts')

<script type="text/javascript">

    $('#faq_form').validator('update');
    CKEDITOR.replace('answer',{});

    // $("#chk").change( function() {
    //   if ( $(this).is(":checked") ) {
    // 	 $(this).val(1);
    //   } else if ( $(this).not(":checked") ) {
    // 	 $(this).val(0);
    //   }
    // });

</script>
@endsection