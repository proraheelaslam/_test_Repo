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

                        <th>Course Name</th>
                        <th>Student Name</th>
                        <th>School name</th>
                        <th>Order Total</th>
                        <th>Order Status</th>
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
var delCount=0;
var datatable_url = "{{url('admin/orders/get_orders')}}";
var datatable_columns = [
    {data: 'course_name', name: 'course_name'},
    {data: 'student_name', name: 'student_name'},
	{data: 'school_name', name: 'school_name'},
	{data: 'order_total', name: 'order_total'},
	{data: 'order_status', name: 'order_status'},
    {data: 'action', name: 'action', orderable: false, searchable: false}
    ];

function delete_record(del_id){
    delID = del_id;

    $("#confirmDelete").modal("show");
    return false

}



$(document).ready(function () {

    createTable(datatable_url,datatable_columns);


    $("#btn-delete").click(function(e) {
        if(delID != 0){

            $.ajaxSetup({headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}" }});
            $.ajax({
			   url: "{{URL::to('/')}}/admin/orders/delete_order/"+delID,
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


function createTable(){

    $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        destroy: true,
        bPaginate: true,
        pageLength: 10,
        initComplete:function( settings, json){
            $('.tooltips').tooltip();
        },
        ajax: {
            url: datatable_url,
            data: function ( d ) {
                d.status       =    'all';
                d.type          =    'nothing';
            },
            cache:false,
            type:"GET",
        },
        columns: datatable_columns,
        "order": []
    });
}
</script>
@endsection
