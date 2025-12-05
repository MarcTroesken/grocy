@extends('layout.default')

@section('title', $__t('Login'))

@section('content')
<div class="min-h-[60vh] flex items-center justify-center">
        <div class="w-full max-w-xl">
                <div class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 text-white rounded-2xl shadow-2xl p-6 md:p-8 flex flex-col items-center gap-3">
                        <div class="flex items-center gap-3">
                                <div class="h-12 w-12 rounded-2xl bg-white/10 flex items-center justify-center border border-white/20">
                                        <i class="fa-solid fa-lock text-xl"></i>
                                </div>
                                <div class="text-left">
                                        <p class="text-sm uppercase tracking-[0.2em] text-slate-200 mb-1">Welcome back</p>
                                        <h2 class="text-2xl font-semibold leading-tight">@yield('title')</h2>
                                </div>
                        </div>
                        <p class="text-slate-200/80 text-center">Sign in to keep managing your household and stay in sync across devices.</p>
                </div>

                <form method="post"
                        action="{{ $U('/login') }}"
                        id="login-form"
                        novalidate
                        class="bg-white/90 border border-slate-200 rounded-2xl shadow-lg -mt-6 md:-mt-8 p-4 md:p-6 space-y-4">

                        <div class="form-group mb-0">
                                <label class="font-semibold text-slate-700" for="username">{{ $__t('Username') }}</label>
                                <input type="text"
                                        class="form-control rounded-xl border-slate-300 shadow-sm"
                                        required
                                        id="username"
                                        name="username">
                        </div>

                        <div class="form-group mb-0">
                                <label class="font-semibold text-slate-700" for="password">{{ $__t('Password') }}</label>
                                <input type="password"
                                        class="form-control rounded-xl border-slate-300 shadow-sm"
                                        required
                                        id="password"
                                        name="password">
                                <div id="login-error"
                                        class="form-text text-danger d-none"></div>
                        </div>

                        <div class="form-group mt-0">
                                <div class="custom-control custom-checkbox">
                                        <input type="checkbox"
                                                class="form-check-input custom-control-input"
                                                id="stay_logged_in"
                                                name="stay_logged_in">
                                        <label class="form-check-label custom-control-label text-slate-700"
                                                for="stay_logged_in">
                                                {{ $__t('Stay logged in permanently') }}
                                                <i class="fa-solid fa-question-circle text-muted"
                                                        data-toggle="tooltip"
                                                        data-trigger="hover click"
                                                        title="{{ $__t('When not set, you will get logged out at latest after 30 days') }}"></i>
                                        </label>
                                </div>
                        </div>

                        <button id="login-button"
                                class="btn btn-success w-full py-2 rounded-xl text-lg shadow-sm">{{ $__t('OK') }}</button>

                </form>
        </div>
</div>
@stop
