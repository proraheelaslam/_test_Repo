<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ilearning</title>

     <!--Core CSS -->
    <link href="{{asset('public/admin_assets/bs3/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/admin_assets/css/bootstrap-reset.css')}}" rel="stylesheet">
    <link href="{{asset('public/admin_assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />

     <!--dynamic table-->
    <link href="{{asset('public/admin_assets/js/advanced-datatable/css/demo_page.css')}}" rel="stylesheet" />
    <link href="{{asset('public/admin_assets/js/advanced-datatable/css/demo_table.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('public/admin_assets/js/data-tables/DT_bootstrap.css')}}" />


    <link href="{{asset('public/admin_assets/js/bootstrap-fileupload/bootstrap-fileupload.css')}}" rel="stylesheet">

    <link href="{{asset('public/admin_assets/js/bootstrap-wysihtml5/bootstrap-wysihtml5.css')}}" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="{{asset('public/admin_assets/js/multiselect/css/multi-select.css')}}"/>

    <link href="{{asset('public/admin_assets/js/select2/select2.css')}}" rel="stylesheet">
    <link href="{{asset('public/admin_assets/js/select2/select2-bootstrap.css')}}" rel="stylesheet">

    <link href="{{asset('public/admin_assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('public/admin_assets/css/style-responsive.css')}}" rel="stylesheet" />
    <link rel="shortcut icon" href="{{asset('public/front_assets/images/fav/favicon.ico')}}" />

    <!-- Custom styles for this template -->
    <link href="{{asset('public/css/custom-styles.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/custom-styles.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/custom-loader.css')}}" rel="stylesheet">
    <!-- end -->

    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> -->
    <script src="{{asset('public/admin_assets/js/jquery-3.3.1.js')}}"></script>
    <!-- scripts -->
    <script src="{{asset('public/admin_assets/js/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('public/bootstrap_validator/validator.min.js')}}"></script>
     <!-- Add fancyBox -->
    <link rel="stylesheet" href="{{asset('public/admin_assets/fancybox-2.1.7/source/jquery.fancybox.css')}}" type="text/css" media="screen" />
    <script type="text/javascript" src="{{asset('public/admin_assets/fancybox-2.1.7/source/jquery.fancybox.pack.js?v=2.1.7')}}"></script>
    <!-- custom script -->
    <script src="{{asset('public/js/custom-scripts-header.js')}}"></script>
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <style type="text/css">
        .form-control{
            color: #555 !important;
        }
    </style>
</head>
<body>

    @if (!Auth::guest())
        @include('admin/template/header')
        @include('admin/template/left_menu')
    @endif
    <section id="container" >
        @yield('content')
    </section>
    <!--Core js-->

@yield('scripts')

<script src="{{asset('public/admin_assets/bs3/js/bootstrap.min.js')}}"></script>
<script class="include" type="text/javascript" src="{{asset('public/admin_assets/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/admin_assets/js/jquery.scrollTo.min.js')}}"></script>
    @if(Request::segment(2) != "chats")
        <script src="{{asset('public/admin_assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js')}}"></script>
    @endif

<script src="{{asset('public/admin_assets/js/jquery.nicescroll.js')}}"></script>




<!--dynamic table-->
<script src="{{ asset('public/admin_assets/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('public/admin_assets/js/advanced-datatable/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{asset('public/admin_assets/js/data-tables/DT_bootstrap.js')}}"></script>



<script type="text/javascript" src="{{asset('public/admin_assets/js/select2/select2.js')}}"></script>

<script type="text/javascript" src="{{asset('public/admin_assets/js/bootstrap-fileupload/bootstrap-fileupload.js')}}"></script>

<?php /*?><script type="text/javascript" src="{{asset('dmin_assets/js/bootstrap-wysihtml5/wysihtml5-0.3.0.js')}}"></script>

<script type="text/javascript" src="{{asset('admin_assets/js/bootstrap-wysihtml5/bootstrap-wysihtml5.js')}}"></script>
<?php */?>


<script src="{{asset('public/js/datatable_script.js')}}"></script>
<!--common script init for all pages-->
<script src="{{asset('public/admin_assets/js/scripts.js')}}"></script>

<!-- custom scripts -->
<!-- js for ladda spinner -->
<script src="{{asset('public/js/custom-spinner.js')}}"></script>
<!-- custom scripts fro alll pages-->
<script src="{{asset('public/js/custom-scripts.js')}}"></script>

<!--dynamic table initialization -->
<script type="text/javascript">

    $('.btn-loading').on('click', function() {
        var $this = $(this);
        $this.button('loading');
    });

    function check_left_menu(obj) {
        var left_bar = 0;
        if ($('#sidebar').hasClass('hide-left-bar')) {
            left_bar = 1;
        }else{
            left_bar = 2;
        }

        $.ajax({
            url: "{{URL::to('/')}}/employee/save_left_menu/"+left_bar,
            type: 'GET',  // user.destroy
            data:{"csrf-token":"{{ csrf_token() }}"},
            success: function(result) {

            }
        });

    }

 $(document).ready(function(){

        <?php if (Session::get('hide_left_menu') == 100) {?>
                $("#main-content").addClass('merge-left');
        <?php }?>
    })



</script>





</body>
</html>
