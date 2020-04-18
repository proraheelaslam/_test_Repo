
<div class="form-group">
    {!! Form::label('name','Name', array('class' => 'control-label')) !!}
    {!! Form::text('name',null,['class'=>'form-control','required' => 'required']) !!}                                   
</div>


<div class="form-group">
    {!! Form::label('subject','Email Subject', array('class' => 'control-label')) !!}
    {!! Form::text('subject',null,['class'=>'form-control']) !!}                                   
</div>



<div class="form-group">
    {!! Form::label('content','Content', array('class' => 'control-label')) !!}

    {!! Form::textarea('content',null,['class'=>'form-control', 'rows' => 2, 'cols' => 40 ,'required' => 'required' , 'id' => 'content']) !!}

    <p>Please do not change the text with in {}.</p>                         
</div>

@if(!isset($email))

<div class="form-group">
    {!! Form::label('key','Key', array('class' => 'control-label')) !!}
    {!! Form::text('key',null,['class'=>'form-control','required' => 'required']) !!}                                   
</div>
@endif


 <div class="form-group">
    {!! Form::submit(isset($email) ? 'Update' : 'Add' ,['class'=>'btn btn-success']) !!}
</div>


@section('scripts')


<script type="text/javascript">
    
    $('#approver_form').validator('update');
    CKEDITOR.replace( 'content',{ });
</script>
@endsection