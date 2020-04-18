@extends('admin.template.template')


@section('content')

 <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

            @include('admin/template/flash_messages')
            <div class="row">
                <div class="col-lg-12">
                
             
                  
                
                        <section class="panel">
                            <header class="panel-heading">
                               {{$title}}
                            </header>
                            <div class="panel-body">
                                <div class="position-center">
                                    {!! Form::open(['url' => 'admin/emails', 'files' => true,'id' => 'approver_form']) !!}
                                        
                                        @include('admin/manage_emails/form')
                                    {!! Form::close() !!}
                                </div>

                            </div>
                        </section>

                </div>
            
            </div>
      
        </section>
    </section>
    <!--main content end-->

@endsection

@section('scripts')
<script type="text/javascript">
    

</script>
@endsection
