<link rel="stylesheet" type="text/css" href="{{asset('public/front_assets/js/raty-master/lib/jquery.raty.css')}}">

<style type="text/css">
.stars{
  display: block !important;
}
.stars img{

  display: inline-block !important;
  width: 20px !important;;
}
</style>
 	<div class="form-group">
	    {!! Form::label('review_title','title', array('class' => 'control-label')) !!}
	    {!! Form::text('review_title',null,['class'=>'form-control','required' => 'required']) !!}                                   
	</div>

<div class="form-group">
	    <label class=" control-label">Overall</label>
               <select class="form-control" name="rating">

                    

                            
                            <option <?php if (@$review->rating == 1) {?> selected <?php }?> value="1">1</option>
                             <option <?php if (@$review->rating == 2) {?> selected <?php }?> value="2">2</option>
                              <option <?php if (@$review->rating == 3) {?> selected <?php }?> value="3">3</option>
                               <option <?php if (@$review->rating == 4) {?> selected <?php }?> value="4">4</option>
                                <option <?php if (@$review->rating == 5) {?> selected <?php }?> value="5">5</option>
                          </select> 
	</div>
                    
                    <div class="form-group">
	    <label class=" control-label">Professionalism</label>
               <select class="form-control" name="rating_professionalism">


                            
                            <option <?php if (@$review->rating_professionalism == 1) {?> selected <?php }?> value="1">1</option>
                             <option <?php if (@$review->rating_professionalism == 2) {?> selected <?php }?> value="2">2</option>
                              <option <?php if (@$review->rating_professionalism == 3) {?> selected <?php }?> value="3">3</option>
                               <option <?php if (@$review->rating_professionalism == 4) {?> selected <?php }?> value="4">4</option>
                                <option <?php if (@$review->rating_professionalism == 5) {?> selected <?php }?> value="5">5</option>
                          </select> 
                              
	</div>
                    
	<div class="form-group">
	    <label class=" control-label">Expertise</label>
               <select class="form-control" name="rating_expertise">

                            
                            <option <?php if (@$review->rating_expertise == 1) {?> selected <?php }?> value="1">1</option>
                             <option <?php if (@$review->rating_expertise == 2) {?> selected <?php }?> value="2">2</option>
                              <option <?php if (@$review->rating_expertise == 3) {?> selected <?php }?> value="3">3</option>
                               <option <?php if (@$review->rating_expertise == 4) {?> selected <?php }?> value="4">4</option>
                                <option <?php if (@$review->rating_expertise == 5) {?> selected <?php }?> value="5">5</option>
                          </select>      
	</div>
                                             <div class="form-group ">
                                                    
                                <label class=" control-label">Review</label>

                                    <textarea name="review" id="review" class="form-control" rows="4"><?=@$review->review?></textarea>
                              

                            </div>
     
                                                  

 <div class="form-group">
    {!! Form::submit(isset($review) ? 'Update' : 'Save' ,['class'=>'btn btn-success pull-right']) !!}
</div>


@section('scripts')


<script src="{{asset('public/front_assets/js/raty-master/lib/jquery.raty.js')}}"></script>

<script type="text/javascript">

  
////
</script>

@endsection