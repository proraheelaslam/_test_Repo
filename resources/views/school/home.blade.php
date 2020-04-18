@extends('school.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in as School!
                </div>

                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                <form id="logout-form" action="/logout" method="POST" style="display: none;">{{ csrf_field() }}</form>
            </div>
        </div>
    </div>
</div>
@endsection
