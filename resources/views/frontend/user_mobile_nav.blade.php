@extends('frontend.layouts.app')

@section('content')
    <section class="gry-bg py-5 ">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8 m-auto">
                        <ul class="list-block justify-content-between justify-content-lg-start mx-auto">
                            <li class="list-group-item">
                                <a href="{{route('home')}}">
                                    <i class="la la-home la-2x"></i>
                                    <strong> Home </strong>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('user.login')}}">
                                    <i class="la la-user-lock la-2x"></i>
                                    <strong>Login</strong>
                                </a>
                            </li>
                            <li class="list-group-item">

                                <a href="{{route('user.registration')}}">
                                    <i class="la la-user-plus la-2x"></i>
                                    <strong>Register</strong>
                                </a>
                            </li>
                            <li class="list-group-item">

                                <a href="{{ route('terms') }}">
                                    <i class="la la-file-text text-primary la-2x mb-2"></i>
                                    <strong>{{ translate('Terms') }}</strong>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('returnpolicy') }}">
                                    <i class="la la-mail-reply la-2x text-primary mb-2"></i>
                                    <strong>{{ translate('Return Policy') }}</strong>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('supportpolicy') }}">
                                    <i class="la la-support la-2x text-primary mb-2"></i>
                                    <strong>{{ translate('Support Policy') }}</strong>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a  href="{{ route('privacypolicy') }}">
                                    <i class="las la-exclamation-circle la-2x text-primary mb-2"></i>
                                    <strong>{{ translate('Privacy Policy') }}</strong>
                                </a>
                            </li>
                            <hr>
                            <li class="list-group-item">
                                <ul class="list-inline d-flex justify-content-between justify-content-lg-start mb-0">
                                    @if(get_setting('show_language_switcher') == 'on')
                                        <li class="list-inline-item dropdown mr-3" id="lang-change">
                                            @php
                                                if(Session::has('locale')){
                                                    $locale = Session::get('locale', Config::get('app.locale'));
                                                }
                                                else{
                                                    $locale = 'en';
                                                }
                                            @endphp
                                            <a href="javascript:void(0)" class="dropdown-toggle text-reset py-2"
                                               data-toggle="dropdown" data-display="static">
                                                <img src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                     data-src="{{ static_asset('assets/img/flags/'.$locale.'.png') }}"
                                                     class="mr-2 lazyload"
                                                     alt="{{ \App\Language::where('code', $locale)->first()->name }}"
                                                     height="11">
                                                <span class="opacity-60">{{ \App\Language::where('code', $locale)->first()->name }}</span>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-left">
                                                @foreach (\App\Language::all() as $key => $language)
                                                    <li>
                                                        <a href="javascript:void(0)" data-flag="{{ $language->code }}"
                                                           class="dropdown-item @if($locale == $language) active @endif">
                                                            <img src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                                 data-src="{{ static_asset('assets/img/flags/'.$language->code.'.png') }}"
                                                                 class="mr-1 lazyload" alt="{{ $language->name }}"
                                                                 height="11">
                                                            <span class="language">{{ $language->name }}</span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endif

                                    @if(get_setting('show_currency_switcher') == 'on')
                                        <li class="list-inline-item dropdown" id="currency-change">
                                            @php
                                                if(Session::has('currency_code')){
                                                    $currency_code = Session::get('currency_code');
                                                }
                                                else{
                                                    $currency_code = \App\Currency::findOrFail(\App\BusinessSetting::where('type', 'system_default_currency')->first()->value)->code;
                                                }
                                            @endphp
                                            <a href="javascript:void(0)"
                                               class="dropdown-toggle text-reset py-2 opacity-60" data-toggle="dropdown"
                                               data-display="static">
                                                {{ \App\Currency::where('code', $currency_code)->first()->name }} {{ (\App\Currency::where('code', $currency_code)->first()->symbol) }}
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                                @foreach (\App\Currency::where('status', 1)->get() as $key => $currency)
                                                    <li>
                                                        <a class="dropdown-item @if($currency_code == $currency->code) active @endif"
                                                           href="javascript:void(0)"
                                                           data-currency="{{ $currency->code }}">{{ $currency->name }}
                                                            ({{ $currency->symbol }})</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endif
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection