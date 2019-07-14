@extends('metronic2::master')

@section('metronic2_css')
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{ asset('vendor/metronic2/pages/css/login.css')}}" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL STYLES -->
    @yield('css')
@stop

@section('body_class', 'login')

@section('body')
    <!-- BEGIN LOGO -->
    <div class="logo">
        <a href="{{ url(config('metronic2.dashboard_url', 'home')) }}">
            <img src="{{asset(config('metronic2.logo', '../assets/layouts/layout/img/logo.png'))}}" alt="logo"
                 class="logo-default"/>
        </a>
    </div>
    <!-- END LOGO -->
    <!-- BEGIN LOGIN -->
    <div class="content">
        <!-- BEGIN LOGIN FORM -->
        <form class="login-form" action="{{ url(config('metronic2.login_url', 'login')) }}" method="post">
            {!! csrf_field() !!}
            <h3 class="form-title font-green">{{ trans('metronic2::metronic2.sign_in_title') }}</h3>
            <div class="alert alert-danger display-hide">
                <button class="close" data-close="alert"></button>
                <span> {{ trans('metronic2::metronic2.login_message') }} </span>
            </div>
            <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                <label class="control-label visible-ie8 visible-ie9">{{ trans('metronic2::metronic2.email') }}</label>
                <input class="form-control" type="text" autocomplete="off"
                       placeholder="{{ trans('metronic2::metronic2.email') }}" name="email"
                       value="{{ old('email') }}"/>
                @if ($errors->has('email'))
                    <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                <label class="control-label visible-ie8 visible-ie9">{{ trans('metronic2::metronic2.password') }}</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off"
                       placeholder="{{ trans('metronic2::metronic2.password') }}" name="password"/>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <button type="submit"
                        class="btn green btn-lg btn-block uppercase">{{ trans('metronic2::metronic2.sign_in') }}</button>
            </div>
            <div class="form-actions">
                <label class="rememberme check mt-checkbox mt-checkbox-outline">
                    <input type="checkbox" name="remember"> {{ trans('metronic2::metronic2.remember_me') }}
                    <span></span>
                </label>
                <a href="{{ url(config('metronic2.password_reset_url', 'password/reset')) }}"
                   id="forget-password" class="text-center forget-password"
                >{{ trans('metronic2::metronic2.i_forgot_my_password') }}</a>

            </div>
            {{--<div class="login-options">--}}
            {{--<h4>Or login with</h4>--}}
            {{--<ul class="social-icons">--}}
            {{--<li>--}}
            {{--<a class="social-icon-color facebook" data-original-title="facebook" href="javascript:;"></a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a class="social-icon-color twitter" data-original-title="Twitter" href="javascript:;"></a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a class="social-icon-color googleplus" data-original-title="Goole Plus"--}}
            {{--href="javascript:;"></a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a class="social-icon-color linkedin" data-original-title="Linkedin" href="javascript:;"></a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</div>--}}
            @if (config('metronic2.register_url', 'register'))
                <div class="create-account">
                    <p>
                        <a href="{{ url(config('metronic2.register_url', 'register')) }}"
                           id="register-btn" class=" text-center uppercase"
                        >{{ trans('metronic2::metronic2.register_a_new_membership') }}</a>
                    </p>
                </div>
            @endif

        </form>
        <!-- END LOGIN FORM -->
    </div>
    <div class="copyright"> {{date("Y")}} &copy; {{ config('metronic2.title', 'Metronic')  }}
        {{ config('metronic2.version', 'V0001')}}
        <a target="_blank" href="{{ config('metronic2.developer', '#')}}">{{ config('metronic2.title', 'Metronic2')  }}</a>
    </div>



@stop

@section('metronic2_js')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{asset('vendor/metronic2/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('vendor/metronic2/global/plugins/jquery-validation/js/additional-methods.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('vendor/metronic2/global/plugins/jquery-validation/js/localization/messages_pt_BR.min.js')}}"
            type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('vendor/metronic2/pages/scripts/login.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    @yield('js')
@stop
