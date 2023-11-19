@if($user)
<li class="nav-item navbar-dropdown dropdown-user dropdown">
    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
        <div class="avatar avatar-online">
            <img src="{{ $user->getAvatar() }}" alt class="w-px-40 h-auto rounded-circle" />
        </div>
    </a>
    <ul class="dropdown-menu dropdown-menu-end">
        <li>
            <a class="dropdown-item" href="#">
                <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                        <div class="avatar avatar-online">
                            <img src="{{ $user->getAvatar() }}" alt class="w-px-40 h-auto rounded-circle" />
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <span class="fw-medium d-block">{{ $user->name }}</span>
                        <small class="text-muted">{{ __('admin.online') }}</small>
                    </div>
                </div>
            </a>
        </li>
        @foreach(\Dcat\Admin\Admin::userNav()->all() as $element)
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
        @endforeach
    </ul>
</li>
@endif
