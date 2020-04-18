  <label class="control-label">Select State</label>
<select class="form-control" name="state" onchange="get_city(this,this.value)" class="validate[required]" placeholder="State">
                             <?php
if (!empty($states)) {
	foreach ($states as $st_row) {?>


                            <option <?php if ($user->state == $st_row->id) {?> selected <?php }?> value="<?=$st_row->id?>"><?=$st_row->name?></option>

<?php }
}

?>
                          </select>
                          @section('scripts')
                          <script type="text/javascript">
                          	function get_city(obj,state_id){

  $.ajaxSetup({headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"}});
            $.ajax({
                url: "{{URL::to('/')}}/users/get_city",
                type: 'post',  // user.destroy
                data:{"csrf-token":"{{ csrf_token() }}",'state_id':state_id},
                success: function(result) {
                //  return false;
                 $('#city_div').html(result);
                 $('.city').select2();
                }
            });
}



                          </script>
                             @endsection