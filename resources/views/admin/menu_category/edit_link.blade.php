@extends('admin.template.template')
@section('content')
<section id="main-content">
<section class="wrapper">
    @include('admin/template/flash_messages')


<div class="row">
        <div class="col-lg-12">


    <section class="panel">
        <header class="panel-heading">
           {{$title}}
        </header>
        <div class="panel-body">
            <div class="position-center">


                {!! Form::model($menu_link,['method' => 'PATCH','url' => 'admin/menu_category/update_menu_link/'.$menu_link->id, 'files' => true ]) !!}

                @include('admin/menu_category/form_link')

                 {!! Form::close() !!}
            </div>

        </div>
    </section>

            </div>

        </div>

</section>
</section>
@endsection
