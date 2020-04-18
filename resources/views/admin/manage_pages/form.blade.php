


<div class="form-group">
    {!! Form::label('name','Page Name EN') !!}
    {!! Form::text('name',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('name_ru','Page Name RUSSIAN') !!}
    {!! Form::text('name_ru',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('name_he','Page Name Hebrew') !!}
    {!! Form::text('name_he',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('name_gr','Page Name GREEK') !!}
    {!! Form::text('name_gr',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('meta_title','Meta Title EN') !!}
    {!! Form::text('meta_title',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('meta_title_ru','Meta Title RUSSIAN') !!}
    {!! Form::text('meta_title_ru',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('meta_title_he','Meta Title HEBREW') !!}
    {!! Form::text('meta_title_he',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('meta_title_gr','Meta Title GREEK') !!}
    {!! Form::text('meta_title_gr',null,['class'=>'form-control']) !!}
</div>
     <div class="form-group ">

                                <label class=" control-label">Meta Keyword EN</label>

                                    <textarea name="meta_keywords" id="meta_keywords" class="form-control" rows="4"><?=@$page->meta_keywords?></textarea>


                            </div>
                          <div class="form-group ">

                                <label class=" control-label">Meta Keyword RUSSIAN</label>

                                    <textarea name="meta_keywords_ru" id="meta_keywords_ru" class="form-control" rows="4"><?=@$page->meta_keywords_ru?></textarea>


                            </div>

                              <div class="form-group ">

                                <label class=" control-label">Meta Keyword HEBREW</label>

                                    <textarea name="meta_keywords_he" id="meta_keywords_he" class="form-control" rows="4"><?=@$page->meta_keywords_he?></textarea>


                            </div>
                            <div class="form-group ">

                                <label class=" control-label">Meta Keyword GREEK</label>

                                    <textarea name="meta_keywords_gr" id="meta_keywords_gr" class="form-control" rows="4"><?=@$page->meta_keywords_gr?></textarea>


                            </div>

          <div class="form-group ">

                                <label class=" control-label">Meta description EN</label>

                                    <textarea name="meta_description" id="meta_description" class="form-control" rows="4"><?=@$page->meta_description?></textarea>


                            </div>
                               <div class="form-group ">

                                <label class=" control-label">Meta description RUSSIAN</label>

                                    <textarea name="meta_description_ru" id="meta_description_ru" class="form-control" rows="4"><?=@$page->meta_description_ru?></textarea>


                            </div>

        <div class="form-group ">

                                <label class=" control-label">Meta description HEBREW</label>

                                    <textarea name="meta_description_he" id="meta_description_he" class="form-control" rows="4"><?=@$page->meta_description_he?></textarea>


                            </div>
                               <div class="form-group ">

                                <label class=" control-label">Meta description GREEK</label>

                                    <textarea name="meta_description_gr" id="meta_description_gr" class="form-control" rows="4"><?=@$page->meta_description_gr?></textarea>


                            </div>
        <div class="form-group ">

                                <label class=" control-label">Content EN</label>

                                    <textarea name="content" id="content" class="form-control" rows="4"><?=@$page->content?></textarea>


                            </div>


   <div class="form-group ">

                                <label class=" control-label">Content RUSSIAN</label>

                                    <textarea name="content_ru" id="content_ru" class="form-control" rows="3"><?=@$page->content_ru?></textarea>


                            </div>

                               <div class="form-group ">

                                <label class=" control-label">Content HEBREW</label>

                                    <textarea name="content_he" id="content_he" class="form-control" rows="3"><?=@$page->content_he?></textarea>


                            </div>
                               <div class="form-group ">

                                <label class=" control-label">Content GREEK</label>

                                    <textarea name="content_gr" id="content_gr" class="form-control" rows="3"><?=@$page->content_gr?></textarea>


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
						CKEDITOR.replace( 'content_he',{
                           toolbar: [

                                { name: 'basicstyles', items : [ 'Bold','Italic','Underline' ] },
                                { name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
                                    { name: 'colors', items : [ 'TextColor','BGColor' ] },
                                ]
                        })
						CKEDITOR.replace( 'content_gr',{
                           toolbar: [

                                { name: 'basicstyles', items : [ 'Bold','Italic','Underline' ] },
                                { name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
                                    { name: 'colors', items : [ 'TextColor','BGColor' ] },
                                ]
                        })


</script>
@endsection






