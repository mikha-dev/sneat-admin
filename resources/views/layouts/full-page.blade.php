<!DOCTYPE html>
@php
$mode = config('admin.layout.mode')->value; //todo:: move to php
$mode = $mode.'-style';

$dir = config('admin.layout.dir');
$initials = config('admin.layout.initials')[0]; //todo::fix
$theme = config('admin.theme');
$contentType = config('admin.layout.content_type'); // todo::move to content section/blade
@endphp
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ $mode }} {{ $initials }}" dir="{{ $dir }}" data-theme="{{ $theme }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@if(! empty($header)){{ $header }} | @endif {{ Dcat\Admin\Admin::title() }}</title>
    @if(config('admin.meta.disable_referrer'))
        <meta name="referrer" content="no-referrer"/>
    @endif

    <meta name="description" content="{{ config('admin.meta.description') ? config('admin.meta.description') : '' }}" />
    <meta name="keywords" content="{{ config('admin.meta.keywords') ? config('admin.meta.keywords') : '' }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(! empty($favicon = Dcat\Admin\Admin::favicon()))
        {!! $favicon !!}
    @endif

    {!! admin_section(Dcat\Admin\Admin::SECTION['HEAD']) !!}

    {!! Dcat\Admin\Admin::asset()->headerJsToHtml() !!}

    {!! Dcat\Admin\Admin::asset()->cssToHtml() !!}
</head>

<body>
    <script>
        var Dcat = CreateDcat({!! Dcat\Admin\Admin::jsVariables() !!});
    </script>

    {!! admin_section(Dcat\Admin\Admin::SECTION['BODY_INNER_BEFORE']) !!}

    <div id="@if(isset($pjaxContainerId)){{ $pjaxContainerId }}@endif">
        @yield('app')
    </div>

    {!! admin_section(Dcat\Admin\Admin::SECTION['BODY_INNER_AFTER']) !!}

    {!! Dcat\Admin\Admin::asset()->jsToHtml() !!}
    <script>Dcat.boot();</script>
</body>
</html>
