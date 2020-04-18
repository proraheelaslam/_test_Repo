@extends('admin.template.template')
@section('content')
<section id="main-content">
<section class="wrapper">
<div class="row">
            <div class="col-lg-12">
            
         
            <?php if ( $errors->count() > 0 ){ ?>
                    <div class="alert alert-block alert-danger fade in">
                                    <button type="button" class="close close-sm" data-dismiss="alert">
                                        <i class="fa fa-times"></i>
                                    </button>
                                     <?php  foreach( $errors->messages() as $message ){ ?>
                                        <p> <?=$message[0]?> </p>
                                        <?php  } ?>
                                </div>
                       <?php  } ?> 
            
    <section class="panel">
        <header class="panel-heading">
           {{$title}}
        </header>
        <div class="panel-body">
            <div class="position-center">
                

                

                {!! Form::model($page,['method' => 'PATCH','url' => 'admin/content_pages/'.$page->id, 'files' => true ]) !!}

                    @include('admin/manage_pages/form')
                
                 {!! Form::close() !!}
            </div>

        </div>
    </section>

            </div>
            
        </div>
        
</section>
</section>
@endsection
        