
@extends('metronic2::master')

@section('metronic_css')
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

        <h3 class="form-title font-green">{{ __('Verify Your Email Address') }}</h3>
        @if (session('resent'))
            <div class="alert alert-success">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif
        {{ __('Before proceeding, please check your email for a verification link.') }}
        {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
        <!-- END LOGIN FORM -->
    </div>
    <div class="copyright"> {{date("Y")}} &copy; {{ config('metronic2.title', 'Metronic')  }}
        {{ config('metronic2.version', 'V0001')}}
        <a target="_blank" href="{{ config('metronic2.developer', '#')}}">{{ config('metronic2.title', 'Metronic')  }}</a>
    </div>



@stop

@section('metronic_js')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('vendor/metronic2/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"
            type="text/javascript"></script>
    <script src="{{ asset('vendor/metronic2/global/plugins/jquery-validation/js/localization/messages_pt_BR.min.js')}}"
            type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('vendor/metronic2/pages/scripts/forget-password.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    @yield('js')
@stop
