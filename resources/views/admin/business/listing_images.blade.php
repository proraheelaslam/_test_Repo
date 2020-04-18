@extends('admin.template.template')

@section('content')

 <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        @include('admin/template/flash_messages')

        <div class="row">
            <div class="col-sm-12">
               
                <section class="panel">
                    <header class="panel-heading">
                        {{$title}}
                       
                    </header>
                    <div class="panel-body">
                    <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                    <thead>
                    <tr>
                        <th>Sr #</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody> <?php 
					$i=1;
					if($images){
                        foreach($images as $single_page){?>
                            <tr>
                                <td><?=$i?></td>
                                <td>
                                 <img height="30" width="50" src="{{asset('public/uploads/business/')}}/<?=$single_page['file_image']?>">
                                </td>
                                
                                <td>
                                     <a <?=get_tooltip('Delete Business Image')?>  href="javascript:void(0);" onclick="delete_record(<?=$single_page['id']?>)"><i class="fa fa-trash-o"></i></a>
    

                                </td>
                            </tr>
                            <?php  $i++;
						}}?>          
                    </tbody>
                    

                    
                    </table>
                    </div>
                    </div>
                </section>
            </div>
        </div>
       
        </section>
    </section>
    <!--main content end-->

    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="confirmDelete" class="modal fade" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h4 class="modal-title">Confirm Delete</h4>
      </div>
      <div class="modal-body"> Are you sure you want to delete? </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal" id="btn-delete"> Confirm</button>

      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script type="application/javascript">
var delID = 0;
function delete_record(del_id){
    delID = del_id;
    $("#confirmDelete").modal("show");
}
$(document).ready(function () {

   
    $("#btn-delete").click(function(e) {
        if(delID != 0){
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"} });
            $.ajax({
                url: "{{URL::to('/')}}/admin/business/business_image/"+delID,
                type: 'post',  // user.destroy
                data:{"csrf-token":"{{ csrf_token() }}" },
                success: function(result) {
                    // Do something with the result
					//alert(result);
                     location.reload();
                }
            });
        }
    });

}); //..... end of ready() .....//
</script>
@endsection
