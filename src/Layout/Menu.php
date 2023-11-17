<?php

namespace Dcat\Admin\Layout;

use Dcat\Admin\Admin;
use Dcat\Admin\Support\Helper;
use Illuminate\Support\Facades\Lang;

class Menu
{
    //todo:: move to Admin or routes
    protected static $helperNodes = [
        [
            'id'        => 1,
            'title'     => 'Helpers',
            'icon'      => 'fa fa-keyboard-o',
            'uri'       => '',
            'parent_id' => 0,
        ],
        [
            'id'        => 2,
            'title'     => 'Extensions',
            'icon'      => '',
            'uri'       => 'auth/extensions',
            'parent_id' => 1,
        ],
        [
            'id'        => 3,
            'title'     => 'Scaffold',
            'icon'      => '',
            'uri'       => 'helpers/scaffold',
            'parent_id' => 1,
        ],
        [
            'id'        => 4,
            'title'     => 'Icons',
            'icon'      => '',
            'uri'       => 'helpers/icons',
            'parent_id' => 1,
        ],
    ];

    protected string $view = 'admin::partials.menu';

    public function register() : void
    {
        if (! admin_has_default_section(Admin::SECTION['LEFT_SIDEBAR_MENU'])) {
            admin_inject_default_section(Admin::SECTION['LEFT_SIDEBAR_MENU'], function () {
                $menuModel = config('admin.database.menu_model');

                return $this->toHtml((new $menuModel())->allNodes()->toArray());
            });
        }

        if (config('app.debug') && config('admin.helpers.enable', true)) {
            $this->add(static::$helperNodes, 20);
        }
    }

    public function add(array $nodes = [], int $priority = 10) : void
    {
        admin_inject_section(Admin::SECTION['LEFT_SIDEBAR_MENU_BOTTOM'], function () use (&$nodes) {
            return $this->toHtml($nodes);
        }, true, $priority);
    }

    /**
     * @throws \Throwable
     */
    public function toHtml(array $nodes) : string
    {
        $html = '';

        foreach (Helper::buildNestedArray($nodes) as $item) {
            $html .= $this->render($item);
        }

        return $html;
    }

    public function view(string $view) : Menu
    {
        $this->view = $view;

        return $this;
    }

    public function render(array $item) : string
    {
        return view($this->view, ['item' => &$item, 'builder' => $this])->render();
    }

    public function getIcon(array $item) : string
    {
        $icon = $item['icon'];

        if(isset($item['domain_setting']) && !is_null($item['domain_setting']) && !is_null($item['domain_setting']['icon'])) {
            $icon = $item['domain_setting']['icon'];
        }

        return $icon;
    }

    public function isActive(array $item, ?string $path = null) : bool
    {
        if (empty($path)) {
            $path = request()->path();
        }

        if (empty($item['children'])) {
            if (empty($item['uri'])) {
                return false;
            }

            return trim($this->getPath($item['uri']), '/') == $path;
        }

        foreach ($item['children'] as $v) {
            if ($path == trim($this->getPath($v['uri']), '/')) {
                return true;
            }
            if (! empty($v['children'])) {
                if ($this->isActive($v, $path)) {
                    return true;
                }
            }
        }

        return false;
    }

    public function visible(array $item) : bool
    {
        if (
            ! $this->checkPermission($item)
            || ! $this->checkDomainSetting($item)
            || ! $this->checkExtension($item)
            || ! $this->userCanSeeMenu($item)
        ) {
            return false;
        }

        $show = $item['show'] ?? null;
        if ($show !== null && ! $show) {
            return false;
        }

        return true;
    }

    protected function checkExtension(array $item) : bool
    {
        $extension = $item['extension'] ?? null;

        if (! $extension) {
            return true;
        }

        if (! $extension = Admin::extension($extension)) {
            return false;
        }

        return $extension->enabled();
    }

    protected function userCanSeeMenu(array|\Dcat\Admin\Models\Menu $item) : bool
    {
        $user = Admin::user();

        if (! $user || ! method_exists($user, 'canSeeMenu')) {
            return true;
        }

        return $user->canSeeMenu($item);
    }

    protected function checkDomainSetting(array $item) : bool {

        if(!isset($item['domain_setting']) || is_null($item['domain_setting']))
            return true;

        return $item['domain_setting']['visible'];
    }

    protected function checkPermission(array $item) : bool
    {
        $permissionIds = $item['permission_id'] ?? null;
        $roles = array_column(Helper::array($item['roles'] ?? []), 'slug');
        $permissions = array_column(Helper::array($item['permissions'] ?? []), 'slug');

        if (! $permissionIds && ! $roles && ! $permissions) {
            return true;
        }

        $user = Admin::user();

        if (! $user || $user->visible($roles)) {
            return true;
        }

        foreach (array_merge(Helper::array($permissionIds), $permissions) as $permission) {
            if ($user->can($permission)) {
                return true;
            }
        }

        return false;
    }

    public function translate(string $text) : string
    {
        $titleTranslation = 'menu.titles.'.trim(str_replace(' ', '_', strtolower($text)));

        if (Lang::has($titleTranslation)) {
            return __($titleTranslation);
        }

        return $text;
    }

    public function getPath(string $uri) : string
    {
        //todo::check and rm
        return $uri
            ? (url()->isValidUrl($uri) ? $uri : admin_base_path($uri))
            : $uri;
    }

    public function getUrl(string $uri) : string
    {
        return $uri ? admin_url($uri) : $uri;
    }
}
