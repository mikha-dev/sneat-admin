@if(! empty($button['text']) || $click)
    <span class="drop{{ $direction }}" style="display:inline-block">
        <a id="{{ $buttonId }}" class="dropdown-toggle {{ $button['class'] }}" style="{{ $button['style'] }}" data-toggle="dropdown" href="javascript:void(0)">
            <stub>{!! $button['text'] !!}</stub>
            <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            @foreach($items as $item)
            <li>@if(isset($item['divider']))<hr class="dropdown-divider">@else<a class="dropdown-item {{ isset($item['disabled']) ? 'disabled' : '' }}" href="javascript:void(0);">$item['text']</a>@endif</li>
            @endforeach
        </ul>        
    </span>
@else
    @foreach($items as $item)
        <li>@if(isset($item['divider']))<hr class="dropdown-divider">@else<a class="dropdown-item {{ isset($item['disabled']) ? 'disabled' : '' }}" href="javascript:void(0);">$item['text']</a>@endif</li>
    @endforeach
@endif

@if($click)
    <script>
        var $btn = $('#{{ $buttonId }}'),
            $a = $btn.parent().find('ul li a'),
            text = String($btn.text());

        $a.on('click', function () {
            $btn.find('stub').html($(this).html() + ' &nbsp;');
        });

        if (text.replace(/(^\s*)|(\s*$)/g,"")) {
            $btn.find('stub').html(text + ' &nbsp;');
        } else {
            (!$a.length) || $btn.find('stub').html($($a[0]).html() + ' &nbsp;');
        }
    </script>
@endif

@if(! empty($button['text']) || $click)
    <div class="btn-group drop{{ $direction }}">
        <button id="{{ $buttonId }}" type="button" class="btn {{ $button['class'] }} dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            @if(isset($button['icon']))<i class="{{ $button['icon'] }} me-1"></i>@endif
            {{ button['text'] }}
        </button>
        <ul class="dropdown-menu">{!! $options !!}</ul>
    </div>
@else
    <ul class="dropdown-menu">{!! $options !!}</ul>
@endif

@if($click)
    <script>
        var $btn = $('#{{ $buttonId }}'),
            $a = $btn.parent().find('ul li button'),
            text = String($btn.text());

        $a.on('click', function () {
            $btn.find('stub').html($(this).html() + ' &nbsp;');
        });

        if (text.replace(/(^\s*)|(\s*$)/g,"")) {
            $btn.find('stub').html(text + ' &nbsp;');
        } else {
            (!$a.length) || $btn.find('stub').html($($a[0]).html() + ' &nbsp;');
        }
    </script>
@endif