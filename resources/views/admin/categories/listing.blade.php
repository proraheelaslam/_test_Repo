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

                        <th>Name_en/Name_he/Name_ru/Name_gr</th>
                        <th>Feature</th>
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
    var datatable_url = "{{url('admin/get_categories')}}";
    var datatable_columns = [
        {data: 'name_en', name: 'name_en'},
        {data: 'is_featured', name: 'is_featured'},
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

        $("body").on('click', '.cate_feature_btn', function () {

            let id = $(this).attr('data-id');
            let isFeature = $(this).attr('data-category-feature');
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"} });
            let obj  = $(this);
            $.ajax({
                url: "{{URL::to('/')}}/{{$resource}}/make_feature",
                type: 'POST',  // user.destroy
                data: { id: id, is_feature: isFeature },
                success: function(result) {
                    if(result.status) {
                        $(obj).text('Feature')
                    }else {
                        $(obj).text('Not Feature');
                    }
                }
            });
        });

    }); //..... end of ready() .....//
</script>
@endsection
