@if($element->hasDivider)
<li>
    <div class="dropdown-divider"></div>
</li>
@endif
<li>
    <a class="dropdown-item" href="{{ $element->url }}">
        <span class="d-flex align-items-center align-middle">
            <i class="flex-shrink-0 {{ $element->icon }} me-2"></i>
            <span class="flex-grow-1 align-middle">{{ $element->title }}</span>
            @if(!is_null($element->badge))
            <span class="flex-shrink-0 badge badge-center rounded-pill {{ $element->badge->class }} w-px-20 h-px-20">{{ $element->badge->value }}</span>
            @endif
        </span>
    </a>
</li>
