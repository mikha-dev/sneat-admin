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
                        <small class="text-muted">{{ trans('admin.online') }}</small>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <div class="dropdown-divider"></div>
        </li>
        <li>
            <a class="dropdown-item" href="{{ admin_url('auth/setting') }}">
                <i class="bx bx-cog me-2"></i>
                <span class="align-middle">{{ trans('admin.setting') }}</span>
            </a>
        </li>
        <li>
            <div class="dropdown-divider"></div>
        </li>
        <li>
            <a class="dropdown-item" href="{{ admin_url('auth/logout') }}">
                <i class="bx bx-power-off me-2"></i>
                <span class="align-middle">{{ trans('admin.logout') }}</span>
            </a>
        </li>
    </ul>
</li>
@endif
