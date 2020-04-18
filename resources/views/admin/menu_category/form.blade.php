

 	<div class="form-group">
	    {!! Form::label('name_en','English Name', array('class' => 'control-label')) !!}
	    {!! Form::text('name_en',null,['class'=>'form-control','required' => 'required']) !!}
	</div>

    <div class="form-group">
        {!! Form::label('name_gr','Greek Name', array('class' => 'control-label')) !!}
        {!! Form::text('name_gr',null,['class'=>'form-control','required' => 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('name_ru','Russian Name', array('class' => 'control-label')) !!}
        {!! Form::text('name_ru',null,['class'=>'form-control','required' => 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('name_he','Hebrew Name', array('class' => 'control-label')) !!}
        {!! Form::text('name_he',null,['class'=>'form-control','required' => 'required']) !!}
    </div>

 <div class="form-group">
    {!! Form::submit(isset($countries) ? 'Update' : 'Save' ,['class'=>'btn btn-success pull-right']) !!}
</div>


@section('scripts')


<script type="text/javascript">

    $('#category_form').validator('update');


$("#chk").change( function() {
  if ( $(this).is(":checked") ) {
    // do something if a1 is checked
	 $(this).val(1);
  } else if ( $(this).not(":checked") ) {
    // do something if a1 is unchecked
	 $(this).val(0);
  }
});


</script>
@endsection
