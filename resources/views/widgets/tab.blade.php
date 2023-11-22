<div {!! $attributes !!}>
    <ul class="nav nav-tabs {{ $tabStyle }}" role="tablist">
        @foreach($tabs as $id => $tab)
            <li class="nav-item" role="presentation">
            @if($tab['type'] == \Dcat\Admin\Widgets\Tab::TYPE_CONTENT)
                <a href="#tab_{{ $tab['id'] }}" class=" nav-link  {{ $id == $active ? 'active' : '' }}" data-bs-toggle="tab">{!! $tab['title'] !!}</a>
            @elseif($tab['type'] == \Dcat\Admin\Widgets\Tab::TYPE_LINK)
                <a href="{{ $tab['href'] }}" class=" nav-link  {{ $id == $active ? 'active' : '' }}">{!! $tab['title'] !!}</a>
            @endif
            </li>

        @endforeach

        @if (!empty($dropDown))
        <li class="dropdown nav-item">
            <a class="dropdown-toggle nav-link" data-bs-toggle="dropdown" href="#" role="button">
                Dropdown <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                @foreach($dropDown as $link)
                <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ $link['href'] }}">{!! $link['name'] !!}</a></li>
                @endforeach
            </ul>
        </li>
        @endif
        <li class="nav-item float-end header">{!! $title !!}</li>
    </ul>

    <div class="tab-content" style="{!! $padding !!}">
        @foreach($tabs as $id => $tab)
        <div class="tab-pane fade {{ $id == $active ? 'active' : '' }}" id="tab_{{ $tab['id'] }}" role="tabpanel">
            {!! $tab['content'] ?? '' !!}
        </div>
        @endforeach
    </div>
</div>
