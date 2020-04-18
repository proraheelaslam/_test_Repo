@extends('student.layout.auth')
@section('content')

    @php       $lang_key = \App::getLocale();  @endphp
<div class="all_banner">
    <div class="auto_content">
        <div class="all_banner_inner">
            <div class="banner_heading">
                <strong>{{$page->name}}</strong>
            </div>
        </div>
    </div>
</div>
<main class="content">
    <section class="aboutUs_content_main faq_content_main">
        <div class="auto_content">
            <div class="faq_content_inner clearfix">

                <div class="faq_left_bar">
                    <div class="faq_leftMenu">
                        <h4>{{Lang::get('label.Faq')}}</h4>
                        <ul>
                            @if(count($faqData) > 0)
                                @foreach($faqData as $faq)
                                    <li data-id="{{$faq->id}}" class="page_faqType_list">
                                        <a href="javascript:void(0)">{{$faq->type_en}}</a></li>
                             @endforeach
                            @endif
                        </ul>
                    </div>
                </div>

                <div class="faq_right">
                    <div class="faq_accordian_main" style="display: none">
                        @if(count($faqData) > 0)

                                @foreach($faqData as $faqTypeData)

                                  <div class="faq_accordian" data-id ="{{$faqTypeData->id}}">
                                       @if($lang_key=='en')
                                          <h4>  {{$faqTypeData->type_en}}</h4>


                                       @elseif($lang_key=='gr')
                                          <h4>  {{$faqTypeData->type_en}}</h4>

                                        @elseif($lang_key=='ru')
                                              <h4>  {{$faqTypeData->type_en}}</h4>

                                        @elseif($lang_key=='he')
                                              <h4>  {{$faqTypeData->type_en}}</h4>
                                        @endif


                                     @if(!is_null($faqTypeData->faqs) && count($faqTypeData->faqs))

                                        @foreach($faqTypeData->faqs as $data)

                                          <div class="faq_accordian_lists">
                                                <div class="faq_accordian_row">
                                                    <div class="faq_accordian_title">

                                                        @if($lang_key=='en')
                                                            <strong>{{ $data->question  }}</strong>


                                                        @elseif($lang_key=='gr')
                                                            <strong>{{ $data->greek_question  }}</strong>

                                                        @elseif($lang_key=='ru')
                                                            <strong>{{ $data->russian_question  }}</strong>

                                                        @elseif($lang_key=='he')
                                                            <strong>{{ $data->hebrew_question  }}</strong>

                                                        @endif


                                                    </div>
                                                    <div class="faq_accordian_show">
                                                        <div class="faq_accordian_showInner">


                                                            @if($lang_key=='en')

                                                                <p>{!! nl2br($data->answer) !!} </p>


                                                            @elseif($lang_key=='gr')
                                                                <p>{!! nl2br($data->greek_answer) !!} </p>

                                                            @elseif($lang_key=='ru')
                                                                <p>{!! nl2br($data->russian_answer) !!}  </p>

                                                            @elseif($lang_key=='he')
                                                                <p>{!! nl2br($data->hebrew_answer) !!} </p>

                                                            @endif



                                                        </div>
                                                    </div>
                                                </div>

                                          </div>

                                        @endforeach
                                    @endif
                            </div>
                                @endforeach

                        @endif


                    </div>
                </div>

            </div>
        </div>
    </section>
</main>
@endsection


