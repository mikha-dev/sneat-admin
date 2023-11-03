<body class="{{ $configData['body_class']}} {{ $configData['sidebar_class'] }} {{ $configData['navbar_class'] === 'fixed-top' ? 'navbar-fixed-top' : '' }} " >
<script>
    var Dcat = CreateDcat({!! Dcat\Admin\Admin::jsVariables() !!});
</script>

{!! admin_section(Dcat\Admin\Admin::SECTION['BODY_INNER_BEFORE']) !!}

@include('admin::partials.sidebar')

<div class="main-content">
    @include('admin::partials.navbar')

    <div class="app-content" id="{{ $pjaxContainerId }}">
        @yield('app')
    </div>
</div>
<footer class="main-footer pt-1">
    <p class="clearfix blue-grey lighten-2 mb-0 text-center">
            @if(! empty(config('admin.version')))
            <span class="text-left d-block d-md-inline-block mt-25 pull-left">                
                <a style="font-size: xx-small" href="https://dev4traders.com">{!! config('admin.version') !!}</a>
            </span>
            @endif

            <span class="text-center d-block d-md-inline-block mt-25">
                {!! config('admin.powered') !!}
            </span>

        <button class="btn btn-primary btn-icon scroll-top pull-right" style="position: fixed;bottom: 2%; right: 10px;display: none">
            <i class="feather icon-arrow-up"></i>
        </button>
    </p>
</footer>

{!! admin_section(Dcat\Admin\Admin::SECTION['BODY_INNER_AFTER']) !!}

{!! Dcat\Admin\Admin::asset()->jsToHtml() !!}

<script>Dcat.boot();</script>

</body>

</html>
