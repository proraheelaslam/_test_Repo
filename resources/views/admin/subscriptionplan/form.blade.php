

 	<div class="form-group ">
	    {!! Form::label('name','Name', array('class' => 'control-label')) !!}
	    {!! Form::text('name',null,['class'=>'form-control','required' => 'required']) !!}                                   
	</div>

	<div class="form-group">
	    {!! Form::label('duration','Duration(Month)', array('class' => 'control-label')) !!}
	    {!! Form::text('duration',null,['class'=>'form-control','required' => 'required']) !!}                                   
	</div>



 	<div class="form-group ">
	    {!! Form::label('fee','Fee', array('class' => 'control-label')) !!}
	    {!! Form::text('fee',null,['class'=>'form-control','required' => 'required']) !!}                                   
	</div>
    

 
   <div class="form-group">
    {!! Form::label('detail','Detail') !!}
    {!! Form::textarea('detail',null,['class'=>'form-control','id' => 'detail']) !!}                                   

  </div>

 <div class="form-group">
    {!! Form::submit(isset($subscriptionplan) ? 'Update' : 'Save' ,['class'=>'btn btn-success pull-right']) !!}
</div>


@section('scripts')


<script type="text/javascript">

    $('#category_form').validator('update');


  
</script>
@endsection