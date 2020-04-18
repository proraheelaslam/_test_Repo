<div class="formRow clearfix">
    <div class="formCell col12">
        <div class="st_loginOr">
            <span>{{Lang::get('label.Or')}}</span>
        </div>
    </div>
</div>

<div class="formRow padding_btm_20 clearfix">
    <div class="formCell col6">
        <div class="stLoginWith_social">
            <a href="{{url('/redirect')}}" class="stLoginWith_social_btn stLoginWith_social_fb">
                <i class="fa fa-facebook" aria-hidden="true"></i>
                <span>{{Lang::get('label.Facebook')}}</span>
            </a>
        </div>
    </div>
    <div class="formCell col6">
        <div class="stLoginWith_social">
            <a href="{{url('/redirectgoogle')}}" class="stLoginWith_social_btn stLoginWith_social_google">
                <i class="fa fa-google" aria-hidden="true"></i>
                <span>{{Lang::get('label.Google')}}</span>
            </a>
        </div>
    </div>
</div>
