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

                                        <th>Cousre Name</th>
                                        <th>Author Name</th>
                                        <th>Features</th>
                                        <th>Content Lectures</th>
                                        <th>Course Participants</th>
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
        var datatable_url = "{{url('admin/get_courses')}}";
        var datatable_columns = [
            {data: 'name', name: 'name'},
            {data: 'author_name', name: 'author_name'},
            {data: 'features', name: 'features'},
            {data: 'content_lecture', name: 'content_lecture'},
            {data: 'course_participants', name: 'course_participants'},
            {data: 'is_featured', name: 'is_featured'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ];
        var start_date='';
        var end_date='';
        function delete_record(del_id){
            delID = del_id;
            $("#confirmDelete").modal("show");
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

            $("body").on('click', '.course_feature_btn', function () {

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

        ////





    </script>
@endsection
