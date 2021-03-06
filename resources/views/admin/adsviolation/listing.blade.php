@extends('admin.template.template')

@section('content')
<style type="text/css">
    #payment_type { width: 200px; margin-bottom: 10px;  }
    #donation_type { width: 200px; margin-bottom: 10px; margin-right: 10px; }
</style>

 <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        @include('admin/template/flash_messages')
         <div class="row">
           <div class="col-sm-6">
                 <a style="margin-bottom:10px;" class="btn btn-primary" href="<?=URL::to('/')?>/{{$resource}}/create">Add New</a>
           </div>

        </div>

        <div class="row">
            <div class="col-sm-12">


                <section class="panel">
                    <header class="panel-heading">
                        {{$title}}
           

                    </header>


                    <div class="panel-body">
                    <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="datatable">
                    <thead>
                    <tr>

                        <th>Ad Name</th>
                        <th>Username Who Reported</th>
                        <th>Action</th>
                    </tr>
                    </thead>

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
    
    
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="confirmupdate" class="modal fade" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
            <h4 class="modal-title">Confirm Status</h4>
          </div>
          <div class="modal-body"> Are you sure you want to change its status? </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-warning" data-dismiss="modal" id="btn-update"> Confirm</button>

          </div>
        </div>
      </div>
    </div>

@endsection

@section('scripts')
<script type="text/javascript">
var delID = 0;
var adID = 0;
var datatable_url = "{{url('admin/get_adsviolation')}}";
var datatable_columns = [
    {data: 'name', name: 'name'},
	{data: 'user_name', name: 'user_name'},
    {data: 'action', name: 'action', orderable: false, searchable: false}
    ];

function delete_record(del_id){
    delID = del_id;
    $("#confirmDelete").modal("show");
}
function update_record(ad_id){
    adID = ad_id;
    $("#confirmupdate").modal("show");
}


$(document).ready(function () {

    create_datatables(datatable_url,datatable_columns);


    $("#btn-delete").click(function(e) {
        if(delID != 0){
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"} });
            $.ajax({
                url: "{{URL::to('/')}}/{{$resource}}/"+delID,
                type: 'DELETE',  // user.destroy
                data:{"csrf-token":"{{ csrf_token() }}" },
                success: function(result) {
                    // Do something with the result
					//alert(result);
                     location.reload();
                }
            });
        }
    });
	
	
	  $("#btn-update").click(function(e) {
        if(adID != 0){
			
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"} });
            $.ajax({
               url: "{{URL::to('/')}}/admin/violationstatus/"+adID,
                type: 'post',  // user.destroy
                data:{"csrf-token":"{{ csrf_token() }}","ad_id": adID},
                success: function(result) {

				//alert(result)
				location.reload();
				}

            });
        }
    });

}); //..... end of ready() .....//



</script>
@endsection
