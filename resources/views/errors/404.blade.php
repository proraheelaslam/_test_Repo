@extends('student.layout.auth')

@section('content')
    <main class="content">
        <section class="error_page_main">
            <div class="error_page_poss">
                <div class="error_page">
                    <div class="error_page_inner">
                        <div class="error_page_detail">
                            <div class="error_page_text">
                                <h1>404</h1>
                                <strong>We Are Sorry, Page Not Found</strong>
                                <p>Unfortunately the page you were looking for could not be found. It may be temporarily unavailable, moved or no longer exist. Check the Url you entered for any mistakes and try again.</p>
                            </div>
                            <div class="error_search">
                                <input type="search" placeholder="Enter any Keyword">
                                <button type="submit"></button>
                            </div>
                            <div class="error_backHome">
                                <a href="{{url('/home')}}">Back To Homepage</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

