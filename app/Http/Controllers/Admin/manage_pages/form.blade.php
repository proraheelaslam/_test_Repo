


<div class="form-group">
    {!! Form::label('name','Page Name EN') !!}
    {!! Form::text('name',null,['class'=>'form-control']) !!}                                   
</div>
<div class="form-group">
    {!! Form::label('name_ru','Page Name RU') !!}
    {!! Form::text('name_ru',null,['class'=>'form-control']) !!}                                   
</div>
<div class="form-group">
    {!! Form::label('name_iw','Page Name IW') !!}
    {!! Form::text('name_iw',null,['class'=>'form-control']) !!}                                   
</div>

<div class="form-group">
    {!! Form::label('name_el','Page Name EL') !!}
    {!! Form::text('name_el',null,['class'=>'form-control']) !!}                                   
</div>
<div class="form-group">
    {!! Form::label('meta_title','Meta Title EN') !!}
    {!! Form::text('meta_title',null,['class'=>'form-control']) !!}                                   
</div>
<div class="form-group">
    {!! Form::label('meta_title_ru','Meta Title RU') !!}
    {!! Form::text('meta_title_ru',null,['class'=>'form-control']) !!}                                   
</div>
<div class="form-group">
    {!! Form::label('meta_title_iw','Meta Title IW') !!}
    {!! Form::text('meta_title_iw',null,['class'=>'form-control']) !!}                                   
</div>
<div class="form-group">
    {!! Form::label('meta_title_el','Meta Title EL') !!}
    {!! Form::text('meta_title_el',null,['class'=>'form-control']) !!}                                   
</div>
     <div class="form-group ">
                                                    
                                <label class=" control-label">Meta Keyword EN</label>

                                    <textarea name="meta_keywords" id="meta_keywords" class="form-control" rows="4"><?=@$page->meta_keywords?></textarea>
                              

                            </div>
                          <div class="form-group ">
                                                    
                                <label class=" control-label">Meta Keyword RU</label>

                                    <textarea name="meta_keywords_ru" id="meta_keywords_ru" class="form-control" rows="4"><?=@$page->meta_keywords_ru?></textarea>
                              

                            </div>
                            
                              <div class="form-group ">
                                                    
                                <label class=" control-label">Meta Keyword IW</label>

                                    <textarea name="meta_keywords_iw" id="meta_keywords_iw" class="form-control" rows="4"><?=@$page->meta_keywords_de?></textarea>
                              

                            </div>
                            <div class="form-group ">
                                                    
                                <label class=" control-label">Meta Keyword EL</label>

                                    <textarea name="meta_keywords_el" id="meta_keywords_el" class="form-control" rows="4"><?=@$page->meta_keywords_de?></textarea>
                              

                            </div>
     
          <div class="form-group ">
                                                    
                                <label class=" control-label">Meta description EN</label>

                                    <textarea name="meta_description" id="meta_description" class="form-control" rows="4"><?=@$page->meta_description?></textarea>
                              

                            </div>
                               <div class="form-group ">
                                                    
                                <label class=" control-label">Meta description RU</label>

                                    <textarea name="meta_description_ru" id="meta_description_ru" class="form-control" rows="4"><?=@$page->meta_description_ru?></textarea>
                              

                            </div>
     
        <div class="form-group ">
                                                    
                                <label class=" control-label">Meta description IW</label>

                                    <textarea name="meta_description_iw" id="meta_description_iw" class="form-control" rows="4"><?=@$page->meta_description_iw?></textarea>
                              

                            </div>
                               <div class="form-group ">
                                                    
                                <label class=" control-label">Meta description EL</label>

                                    <textarea name="meta_description_el" id="meta_description_el" class="form-control" rows="4"><?=@$page->meta_description_el?></textarea>
                              

                            </div>
        <div class="form-group ">
                                                    
                                <label class=" control-label">Content EN</label>

                                    <textarea name="content" id="content" class="form-control" rows="4"><?=@$page->content?></textarea>
                              

                            </div>
     

   <div class="form-group ">
                                                    
                                <label class=" control-label">Content RU</label>

                                    <textarea name="content_ru" id="content_ru" class="form-control" rows="3"><?=@$page->content_ru?></textarea>
                              

                            </div>
                            
                               <div class="form-group ">
                                                    
                                <label class=" control-label">Content IW</label>

                                    <textarea name="content_iw" id="content_iw" class="form-control" rows="3"><?=@$page->content_iw?></textarea>
                              

                            </div>
                               <div class="form-group ">
                                                    
                                <label class=" control-label">Content EL</label>

                                    <textarea name="content_el" id="content_el" class="form-control" rows="3"><?=@$page->content_el?></textarea>
                              

                            </div>



    
    


 <div class="form-group">
    {!! Form::submit(isset($page) ? 'Update' : 'Add' ,['class'=>'btn btn-success']) !!}
</div>


@section('scripts')



<script>

CKEDITOR.replace( 'content',{
                           toolbar: [
                                    
                                { name: 'basicstyles', items : [ 'Bold','Italic','Underline' ] },
                                { name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
                                    { name: 'colors', items : [ 'TextColor','BGColor' ] },
                                ]
                        })


CKEDITOR.replace( 'content_ru',{
                           toolbar: [
                                    
                                { name: 'basicstyles', items : [ 'Bold','Italic','Underline' ] },
                                { name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
                                    { name: 'colors', items : [ 'TextColor','BGColor' ] },
                                ]
                        })
						CKEDITOR.replace( 'content_iw',{
                           toolbar: [
                                    
                                { name: 'basicstyles', items : [ 'Bold','Italic','Underline' ] },
                                { name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
                                    { name: 'colors', items : [ 'TextColor','BGColor' ] },
                                ]
                        })
						CKEDITOR.replace( 'content_el',{
                           toolbar: [
                                    
                                { name: 'basicstyles', items : [ 'Bold','Italic','Underline' ] },
                                { name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
                                    { name: 'colors', items : [ 'TextColor','BGColor' ] },
                                ]
                        })


</script>
@endsection






