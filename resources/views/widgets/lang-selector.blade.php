<li class="nav-item dropdown-language dropdown me-2 me-xl-0">
    <a class="nav-link" href="javascript:void(0);" data-bs-toggle="dropdown" href="#" aria-expanded="false">
        <i class="flag-icon flag-icon-{!! $current_locale !!}"></i>
    </a>
    <ul class="dropdown-menu dropdown-menu-end shadow-200">
        @foreach($locales as $key => $lang)
        <a href="/locale/{{ $key }}?url={{ $current_url }}" class="dropdown-item {{ $current_locale == $key ? 'active' : '' }}" data-language="{{ $key }}" data-text-direction="{{ $lang['dir'] }}">
            <i class="flag-icon flag-icon-{!! $key !!} mr-1 ml-1 ">
            <span class="align-middle">{!! $lang['title'] !!}</span>
        </a>
        @endforeach
    </ul>
</li>
