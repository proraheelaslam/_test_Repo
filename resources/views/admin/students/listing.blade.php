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

        <div class="col-sm-3">
        </div>
          <div class="col-sm-3">

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

                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Reset Password</th>
                        <th>Status</th>
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

@endsection

@section('scripts')

<script type="text/javascript">
var delID = 0;
var datatable_url = "{{url('admin/get_users')}}";
var datatable_columns = [
    {data: 'name', name: 'name'},
    {data: 'email', name: 'email'},
    {data: 'role', name: 'role'},
    {data: 'reset_password', name: 'reset_password',orderable: false, searchable: false},
    {data: 'status', name: 'status',orderable: false, searchable: false},
    {data: 'action', name: 'action', orderable: false, searchable: false}
    ];
var start_date='';
var end_date='';
function delete_record(del_id){
    delID = del_id;
    $("#confirmDelete").modal("show");
}

function update_status(id,obj){


	//$('#dvLoading').show();
	var status=$(obj).attr("data-status");
	user_statuss=0;
	if(status==0){
		user_statuss=1;
	}
	else{
		user_statuss=0;
		}

	 $.ajaxSetup({headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"}});
            $.ajax({
                url: "{{URL::to('/')}}/admin/user_status/"+id,
                type: 'post',  // user.destroy
                data:{"csrf-token":"{{ csrf_token() }}","is_active": user_statuss},
                success: function(result) {

				//alert(result)
				location.reload();

                }
            });


	}


	function reset_password(id,obj){


	//$('#dvLoading').show();
	var user_id=$(obj).attr("data-user_id");
	user_statuss=0;


	 $.ajaxSetup({headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"}});
            $.ajax({
                url: "{{URL::to('/')}}/admin/user_reset_password/"+id,
                type: 'post',  // user.destroy
                data:{"csrf-token":"{{ csrf_token() }}","user_id": user_id},
                success: function(result) {

				//alert(result)
				location.reload();

                }
            });


	}

$(document).ready(function () {

    create_datatables(datatable_url,datatable_columns);



    $("#btn-delete").click(function(e) {
        if(delID != 0){
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"}});
            $.ajax({
                url: "{{URL::to('/')}}/{{$resource}}/"+delID,
                type: 'DELETE',  // user.destroy
                data:{"csrf-token":"{{ csrf_token() }}"},
                success: function(result) {
                    // Do something with the result
                     location.reload();
                }
            });
        }
    });

}); //..... end of ready() .....//

////





</script>
@endsection
