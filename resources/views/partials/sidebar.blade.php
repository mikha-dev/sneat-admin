<aside id="layout-menu" class="menu bg-menu-theme {{ $layout['type'] == Dcat\Admin\Enums\LayoutType::HORIZONTAL ? 'layout-menu-horizontal menu-horizontal flex-grow-0' : 'layout-menu menu-vertical' }}">
    @if($layout['type'] != Dcat\Admin\Enums\LayoutType::HORIZONTAL)
    <div class="app-brand">
        <a href="/" class="app-brand-link">
          <span class="app-brand-logo">
            <img src="{!! config('admin.logo-image') !!}" alt="" class="app-brand-img w-px-150" data-app-light-img="{!! config('admin.logo-image') !!}" data-app-dark-img="{!! config('admin.logo-image-dark') !!}">
          </span>
          <span class="app-brand-text menu-text fw-bold ms-2">{{ config('admin.name') }}</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>
    @endif
    @if($layout['type'] == Dcat\Admin\Enums\LayoutType::HORIZONTAL)
    <div class="container-xxl d-flex h-100">
    @endif
        <ul class="menu-inner py-1">
            {!! admin_section(Dcat\Admin\Admin::SECTION['LEFT_SIDEBAR_MENU_TOP']) !!}

            {!! admin_section(Dcat\Admin\Admin::SECTION['LEFT_SIDEBAR_MENU']) !!}

            {!! admin_section(Dcat\Admin\Admin::SECTION['LEFT_SIDEBAR_MENU_BOTTOM']) !!}
        </ul>
    @if($layout['type'] == Dcat\Admin\Enums\LayoutType::HORIZONTAL)
    </div>
    @endif
</aside>
