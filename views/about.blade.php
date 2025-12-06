@extends('layout.default')

@section('title', $__t('About Grocy'))

@section('content')
<div class="max-w-5xl mx-auto text-center space-y-6">
        <div class="bg-gradient-to-r from-slate-900 to-slate-800 text-white rounded-2xl shadow-xl p-6 md:p-8">
                <p class="uppercase tracking-[0.2em] text-sm font-semibold text-slate-200">Grocy</p>
                <h2 class="title text-white text-3xl md:text-4xl mt-2">@yield('title')</h2>
                <p class="text-slate-200/80 max-w-2xl mx-auto mt-3">Your household manager, now with a refreshed look and feel.</p>
        </div>

        <div class="bg-white/80 rounded-2xl shadow-md border border-slate-200 backdrop-blur-sm p-4 md:p-6">
                <ul class="nav nav-tabs grocy-tabs justify-content-center mt-1 md:mt-3">
                        <li class="nav-item">
                                <a class="nav-link discrete-link active px-4 py-3 font-semibold"
                                        id="system-info-tab"
                                        data-toggle="tab"
                                        href="#system-info">{{ $__t('System info') }}</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link discrete-link px-4 py-3 font-semibold"
                                        id="changelog-tab"
                                        data-toggle="tab"
                                        href="#changelog">{{ $__t('Changelog') }}</a>
                        </li>
                </ul>

                <div class="tab-content grocy-tabs mt-6 text-left">

                        <div class="tab-pane show active"
                                id="system-info">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="bg-slate-50 rounded-xl border border-slate-200 p-4 shadow-sm">
                                                <h3 class="text-lg font-semibold text-slate-800 mb-3">Environment</h3>
                                                <dl class="divide-y divide-slate-200">
                                                        <div class="py-2 flex items-center justify-between">
                                                                <dt class="text-slate-500">Version</dt>
                                                                <dd class="font-mono text-slate-900">{{ $versionInfo->Version }}</dd>
                                                        </div>
                                                        <div class="py-2 flex items-center justify-between">
                                                                <dt class="text-slate-500">Released on</dt>
                                                                <dd class="flex items-center gap-2 font-mono text-slate-900">
                                                                        <span>{{ $versionInfo->ReleaseDate }}</span>
                                                                        <time class="timeago timeago-contextual text-muted"
                                                                                datetime="{{ $versionInfo->ReleaseDate }}"></time>
                                                                </dd>
                                                        </div>
                                                        <div class="py-2 flex items-center justify-between">
                                                                <dt class="text-slate-500">OS</dt>
                                                                <dd class="font-mono text-slate-900">{{ $systemInfo['os'] }}</dd>
                                                        </div>
                                                        <div class="py-2 flex items-center justify-between">
                                                                <dt class="text-slate-500">Client</dt>
                                                                <dd class="font-mono text-slate-900">{{ $systemInfo['client'] }}</dd>
                                                        </div>
                                                </dl>
                                        </div>
                                        <div class="bg-slate-50 rounded-xl border border-slate-200 p-4 shadow-sm">
                                                <h3 class="text-lg font-semibold text-slate-800 mb-3">Stack</h3>
                                                <dl class="divide-y divide-slate-200">
                                                        <div class="py-2 flex items-center justify-between">
                                                                <dt class="text-slate-500">PHP</dt>
                                                                <dd class="font-mono text-slate-900">{{ $systemInfo['php_version'] }}</dd>
                                                        </div>
                                                        <div class="py-2 flex items-center justify-between">
                                                                <dt class="text-slate-500">SQLite</dt>
                                                                <dd class="font-mono text-slate-900">{{ $systemInfo['sqlite_version'] }}</dd>
                                                        </div>
                                                        <div class="py-2 flex items-center justify-between">
                                                                <dt class="text-slate-500">Database Version</dt>
                                                                <dd class="font-mono text-slate-900">{{ $systemInfo['db_version'] }}</dd>
                                                        </div>
                                                        <div class="py-2 flex items-center justify-between">
                                                                <dt class="text-slate-500">Release channel</dt>
                                                                <dd class="font-mono text-slate-900">{{ $changelog['release_channel'] ?? 'stable' }}</dd>
                                                        </div>
                                                </dl>
                                        </div>
                                </div>

                                <div class="flex flex-col md:flex-row items-center justify-between bg-slate-900 text-white rounded-xl p-4 mt-6 shadow-md">
                                        <div class="text-left">
                                                <p class="text-sm text-slate-200 uppercase tracking-[0.15em]">Support Grocy</p>
                                                <p class="text-lg font-semibold">{{ $__t('Do you find Grocy useful?') }}</p>
                                        </div>
                                        <a class="btn btn-success text-white mt-3 md:mt-0 px-5"
                                                href="https://grocy.info/#say-thanks"
                                                target="_blank">{{ $__t('Say thanks') }} <i class="fa-solid fa-heart"></i></a>
                                </div>
                        </div>

                        <div class="tab-pane show"
                                id="changelog">
                                @php $Parsedown = new Parsedown(); @endphp
                                <div class="space-y-3">
                                        @foreach($changelog['changelog_items'] as $changelogItem)
                                        <div class="bg-slate-50 rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                                                <div class="px-4 py-3 bg-white flex items-center justify-between">
                                                        <a class="discrete-link font-semibold text-slate-800"
                                                                data-toggle="collapse-next"
                                                                href="#">
                                                                <div class="flex flex-col">
                                                                        <span class="text-sm uppercase text-slate-500">Version {{ $changelogItem['version'] }}</span>
                                                                        <span class="text-base text-slate-800">{{ $__t('Released on') }} {{ $changelogItem['release_date'] }}</span>
                                                                </div>
                                                        </a>
                                                        <time class="timeago timeago-contextual text-muted"
                                                                datetime="{{ $changelogItem['release_date'] }}"></time>
                                                </div>
                                                <div class="collapse @if($changelogItem['release_number'] >= $changelog['newest_release_number'] - 4) show @endif">
                                                        <div class="px-4 py-3 bg-white text-left leading-relaxed">
                                                                {!! $Parsedown->text($changelogItem['body']) !!}
                                                        </div>
                                                </div>
                                        </div>
                                        @endforeach
                                </div>
                        </div>

                </div>
        </div>

        <div class="text-sm text-slate-600 bg-white/70 rounded-xl border border-slate-200 shadow-sm p-4">
                <p class="mb-1">
                        <a href="https://grocy.info"
                                class="text-slate-800 font-semibold"
                                target="_blank">Grocy</a> is a hobby project by
                        <a href="https://berrnd.de"
                                class="text-slate-800 font-semibold"
                                target="_blank">Bernd Bestel</a>
                </p>
                <p class="mb-0">Created with passion since 2017<br>Life runs on Code</p>
        </div>
</div>
@stop
