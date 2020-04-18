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


                {!! Form::model($students,['method' => 'PATCH','url' => 'admin/users/'.$students->id, 'files' => true ]) !!}

                    @include('admin/students/form')

                 {!! Form::close() !!}
            </div>

        </div>
    </section>

            </div>

        </div>

</section>
</section>
@endsection
