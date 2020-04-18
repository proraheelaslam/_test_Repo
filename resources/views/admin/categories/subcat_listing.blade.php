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
                <a style="margin-bottom:10px;" class="btn btn-primary btn-loading" href="<?=URL::to('/')?>/admin/subcategories/create/{{$category_id}}">Add New</a>
                <a style="margin-bottom:10px;" class="btn btn-info btn-loading" href="<?=URL::to('/')?>/{{$resource}}">Back</a>
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
                                        <th>Name_en/Name_iw/Name_ru/Name_el</th>
                                        <th>Popular</th>
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
@include('admin/common/delete_modal')
@endsection

@section('scripts')
<script type="text/javascript">
var delID = 0;
var datatable_url = "{{url('admin/categories/' . $category_id)}}/";
var datatable_columns = [
    {data: 'name_en', name: 'name_en'},
    {data: 'is_popular', name: 'is_popular'},
    {data: 'action', name: 'action', orderable: false, searchable: false}
    ];

function delete_record(del_id){
    delID = del_id;
    $("#confirmDelete").modal("show");
}


$(document).ready(function () {

    create_datatables(datatable_url,datatable_columns);

    $("#btn-delete").click(function(e) {
        if(delID != 0){
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"} });
            $.ajax({
                url: "{{URL::to('/')}}/admin/subcategories/"+delID,
                type: 'DELETE',
                data:{"csrf-token":"{{ csrf_token() }}" },
                success: function(result) {
                     location.reload();
                }
            });
        }
    });


    $("body").on('click', '.cate_popular_btn', function () {

        let id = $(this).attr('data-id');
        let isPopular = $(this).attr('data-category-popular');
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"} });
        let obj  = $(this);
        $.ajax({
            url: "{{URL::to('/')}}/{{$resource}}/make_popular",
            type: 'POST',  // user.destroy
            data: { id: id, is_popular: isPopular },
            success: function(result) {
                if(result.status) {
                    $(obj).text('Popular')
                }else {
                    $(obj).text('Not Popular');
                }
            }
        });
    });


}); //..... end of ready() .....//



</script>
@endsection
