<?php

namespace Dcat\Admin\Layout;

use Dcat\Admin\Admin;
use Illuminate\Support\Str;
use Dcat\Admin\Enums\DarkModeType;
use Dcat\Admin\Enums\LayoutDirectionType;

class Asset
{

    protected $alias = [
        '@admin' => 'vendor/dcat-admin',
        '@extension' => 'vendor/dcat-admin-extensions',
        '@sneat' => [
            'js' => [
                '@admin/js/helpers.js',
                '@admin/js/config.js',
            ],
            'css' => [
                '@admin/css/nprogress.css',
                '@admin/css/core.css',
            ],
        ],
        '@sneat-menu' => [
            'js' => [
                '@admin/js/menu.js',
            ],
        ],
        '@sneat-main' => [
            'js' => [
                '@admin/js/main.js',
            ],
        ],
        '@sneat-auth' => [
            'css' => [
                '@admin/css/pages/page-auth.css',
            ],
        ],
        '@boxicons' => [
            'css'  => '@admin/fonts/boxicons.css',
        ],
        '@nunito' => [
            //https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700
            'css' => 'https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,800,800i,900,900i',
            //'css' => '@admin/dcat/css/nunito.css',
        ],
        '@dcat' => [
            'js'  => '@admin/dcat/js/dcat-app.js',
        ],

        '@jquery' => [
            'js' => '@admin/libs/jquery/jquery.js',
        ],
        '@datatables' => [
            'css' => [
                '@admin/libs/datatables-bs5/datatables.bootstrap5.css',
                '@admin/libs/datatables-responsive-bs5/responsive.bootstrap5.css',
                '@admin/libs/datatables-buttons-bs5/buttons.bootstrap5.css'
            ]
            //'@admin/dcat/plugins/tables/datatable/datatables.min.css',
        ],
        '@layer' => [
            'js' => '@admin/dcat/plugins/layer/layer.js',
        ],
        '@tinymce' => [
            'js' => '@admin/dcat/plugins/tinymce/tinymce.min.js',
        ],
        '@pjax' => [
            'js' => '@admin/dcat/plugins/jquery-pjax/jquery.pjax.min.js',
        ],
        '@toastr' => [
            'js'  => '@admin/dcat/plugins/extensions/toastr.min.js',
            'css' => '@admin/dcat/plugins/extensions/toastr.css',
        ],
        '@jquery.nestable' => [
            'js'  => '@admin/dcat/plugins/nestable/jquery.nestable.min.js',
            'css' => '@admin/dcat/plugins/nestable/nestable.css',
        ],
        '@validator' => [
            'js' => '@admin/dcat/plugins/bootstrap-validator/validator.min.js',
        ],
        '@select2' => [
            'js'  => [
                '@admin/dcat/plugins/select/select2.full.min.js',
                '@admin/dcat/plugins/select/i18n/{lang}.js',
            ],
            'css' => '@admin/dcat/plugins/select/select2.min.css',
        ],
        '@switchery' => [
            'js'  => '@admin/dcat/plugins/switchery/switchery.min.js',
            'css' => '@admin/dcat/plugins/switchery/switchery.min.css',
        ],
        '@webuploader' => [
            'js' => [
                '@admin/dcat/plugins/webuploader/webuploader.min.js',
                '@admin/dcat/extra/upload.js',
            ],
    //         'css' => '@admin/dcat/extra/upload.css',
        ],
        '@editor-md' => [
            'js' => [
                '@admin/dcat/plugins/editor-md/lib/raphael.min.js',
                '@admin/dcat/plugins/editor-md/lib/marked.min.js',
                '@admin/dcat/plugins/editor-md/lib/prettify.min.js',
                '@admin/dcat/plugins/editor-md/lib/underscore.min.js',
                '@admin/dcat/plugins/editor-md/lib/sequence-diagram.min.js',
                '@admin/dcat/plugins/editor-md/lib/flowchart.min.js',
                '@admin/dcat/plugins/editor-md/lib/jquery.flowchart.min.js',
                '@admin/dcat/plugins/editor-md/editormd.min.js',
            ],
            'css' => [
                '@admin/dcat/plugins/editor-md/css/editormd.preview.min.css',
                '@admin/dcat/extra/markdown.css',
            ],
        ],
        '@editor-md-form' => [
            'js' => [
                '@admin/dcat/plugins/editor-md/lib/raphael.min.js',
                '@admin/dcat/plugins/editor-md/editormd.min.js',
            ],
            'css' => [
                '@admin/dcat/plugins/editor-md/css/editormd.min.css',
            ],
        ],

    //     '@theme' => [
    //         'js' => [
    //             '@admin/js/theme.js',
    //         ],
    //         'css' => [
    //             '@admin/css/theme.css',
    //         ],
    //     ],
    //     '@vendors' => [
    //         'js'  => '@admin/dcat/plugins/vendors.min.js',
    //         'css' => '@admin/dcat/plugins/vendors.min.css',
    //     ],
        '@jquery.initialize' => [
            'js' => '@admin/dcat/plugins/jquery.initialize/jquery.initialize.min.js',
        ],
    //     '@grid-extension' => [
    //         'js' => '@admin/dcat/extra/grid-extend.js',
    //     ],
    //     '@resource-selector' => [
    //         'js' => '@admin/dcat/extra/resource-selector.js',
    //     ],
    //     '@select-table' => [
    //         'js' => '@admin/dcat/extra/select-table.js',
    //     ],
    //     '@bootstrap-datetimepicker' => [
    //         'js'  => '@admin/dcat/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js',
    //         'css' => '@admin/dcat/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css',
    //     ],
    //     '@moment' => [
    //         'js' => [
    //             '@admin/dcat/plugins/moment/moment-with-locales.min.js',
    //         ],
    //     ],
    //     '@moment-timezone' => [
    //         'js' => [
    //             '@admin/dcat/plugins/moment-timezone/moment-timezone-with-data.min.js',
    //         ],
    //     ],
    //     '@jstree' => [
    //         'js'  => '@admin/dcat/plugins/jstree-theme/jstree.min.js',
    //         'css' => '@admin/dcat/plugins/jstree-theme/themes/proton/style.min.css',
    //     ],
    //     '@chartjs' => [
    //         'js' => '@admin/dcat/plugins/chart.js/chart.bundle.min.js',
    //     ],
    //     '@jquery.sparkline' => [
    //         'js' => '@admin/dcat/plugins/jquery.sparkline/jquery.sparkline.min.js',
    //     ],
    //     '@jquery.bootstrap-duallistbox' => [
    //         'js'  => '@admin/dcat/plugins/bootstrap-duallistbox/dist/jquery.bootstrap-duallistbox.min.js',
    //         'css' => '@admin/dcat/plugins/bootstrap-duallistbox/dist/bootstrap-duallistbox.min.css',
    //     ],
    //     '@number-input' => [
    //         'js' => '@admin/dcat/plugins/number-input/bootstrap-number-input.js',
    //     ],
    //     '@ionslider' => [
    //         'js' => [
    //             '@admin/dcat/plugins/ionslider/ion.rangeSlider.min.js',
    //         ],
    //         'css' => [
    //             '@admin/dcat/plugins/ionslider/ion.rangeSlider.css',
    //             '@admin/dcat/plugins/ionslider/ion.rangeSlider.skinNice.css',
    //         ],
    //     ],
    //     '@jquery.inputmask' => [
    //         'js' => '@admin/dcat/plugins/input-mask/jquery.inputmask.bundle.min.js',
    //     ],
    //     '@apex-charts' => [
    //         'js' => '@admin/dcat/plugins/charts/apexcharts.min.js',
    //     ],
    //     '@fontawesome-iconpicker' => [
    //         'js' => '@admin/dcat/plugins/fontawesome-iconpicker/dist/js/fontawesome-iconpicker.js',
    //         'css' => '@admin/dcat/plugins/fontawesome-iconpicker/dist/css/fontawesome-iconpicker.min.css',
    //     ],
    //     '@color' => [
    //         'js' => '@admin/dcat/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js',
    //         'css' => '@admin/dcat/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css',
    //     ],
    //     '@qrcode' => [
    //         'js' => '@admin/dcat/plugins/jquery-qrcode/dist/jquery-qrcode.min.js',
    //     ],
    //     '@sortable' => [
    //         'js' => '@admin/dcat/plugins/sortable/Sortable.min.js',
    //     ],
    //     '@autocomplete' => [
    //         'js' => '@admin/dcat/plugins/autocomplete/jquery.autocomplete.min.js',
    //     ],
    ];

    public array $script = [];

    public array $directScript = [];

    public array $style = [];

    public array $css = [];

    //todo::rm
    // public array $fonts = [
    //     'boxicons.css'
    // ];
    public array $js = [];
    public array $headerJs = [
//        'vendors' => '@vendors',
        'jquery'    => '@jquery',
        'dcat'    => '@dcat',
        'sneat'    => '@sneat',
    ];

    public array $baseCss = [
        'sneat'    => '@sneat',
//        'vendors'     => '@vendors',
        'toastr'      => '@toastr',
        'datatables'  => '@datatables', //todo::move to other css, load on demand
//        'dcat'        => '@dcat',





















    ];

    public array $baseJs = [
//        'adminlte'  => '@adminlte',
        'toastr'    => '@toastr',
        'pjax'      => '@pjax',
        'validator' => '@validator',
        'layer'     => '@layer',
        'init'      => '@jquery.initialize',
        'sneat-menu'     => '@sneat-menu',
        'sneat-main'     => '@sneat-main',
    ];

    public array $fonts = [
        '@nunito',
        '@boxicons'
    ];


    //todo::rm/check
    // public $htmlJs = [
    //     'dcat/plugins/extensions/toastr.min.js',
    //     'dcat/plugins/jquery-pjax/jquery.pjax.min.js',
    //     'dcat/plugins/bootstrap-validator/validator.min.js',
    //     'dcat/plugins/layer/layer.js',
    //     'dcat/plugins/jquery.initialize/jquery.initialize.min.js',
    //     'dcat/plugins/switchery/switchery.min.js',
    //     'dcat/plugins/number-input/bootstrap-number-input.js',
    //     'dcat/plugins/webuploader/webuploader.min.js',
    //     'dcat/extra/upload.js',
    //     'dcat/plugins/nestable/jquery.nestable.min.js',
    //     'dcat/plugins/select/select2.full.min.js',
    //     'dcat/extra/grid-extend.js',
    //     //'dcat/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js',

    //     //'libs/jquery/jquery.js',
    //     'libs/popper/popper.js',
    //     'js/bootstrap.js',
    //     'libs/perfect-scrollbar/perfect-scrollbar.js',
    //     'js/menu.js',
    //     'js/main.js',
    //     'js/ui-popover.js'
    // ];

    //todo::rm/check
    // public $headerJs = [
    //     'libs/jquery/jquery.js',
    //     //'dcat/plugins/vendors.min.js',
    //     'dcat/js/dcat-app.js',
    //     // 'dcat/plugins/webuploader/webuploader.min.js',
    //     // 'dcat/extra/upload.js',
    //     'js/helpers.js',
    //     'js/config.js'
    //     // 'vendors' => '@vendors',
    //     // 'dcat'    => '@dcat',
    // ];

    // private array $baseCss = [
    //     'css/core.css',
    //     'dcat/plugins/switchery/switchery.min.css',
    //     'dcat/plugins/select/select2.min.css',
    //     'css/nprogress.css',

    //     // paid version
    //     'libs/datatables-bs5/datatables.bootstrap5.css',
    //     'libs/datatables-responsive-bs5/responsive.bootstrap5.css',
    //     'libs/datatables-buttons-bs5/buttons.bootstrap5.css'
    // ];

    protected function setupTheme() {
        $theme = Admin::theme();
        $dir = Admin::dir();

        $t = $theme;
        if($dir == LayoutDirectionType::RTL) {
            $t = 'rtl/'.$theme;
        }
        $t .= '.css';

        $this->baseCss(['@admin/css/'.$t], true);
    }

    protected function setupMode() {

        if(Admin::darkMode() == DarkModeType::DARK) {
            $this->baseCss(['css/core-dark.css'], true);
            $this->baseCss(['css/'.Admin::theme().'-dark.css'], true);
        }
    }
    // /**
    //  * 初始化主题样式.
    //  */
    // protected function setUpTheme()
    // {
    //     $color = Admin::color()->getName();

    //     if ($color === Color::DEFAULT_COLOR) {
    //         return;
    //     }

    //     $alias = [
    //         //'@adminlte',
    //         //'@dcat',
    //     ];

    //     foreach ($alias as $n) {
    //         $before = (array) $this->alias[$n]['css'];

    //         $this->alias[$n]['css'] = [];

    //         foreach ($before as $css) {
    //             $this->alias[$n]['css'][] = str_replace('.css', "-{$color}.css", $css);
    //         }
    //     }
    // }

    /**
     * @param  string|array  $name
     * @param  string|array  $value
     * @return string|array
     */
    public function alias( string|array $name, string|array $value = null) : array|string|null
    {
        if (is_array($name)) {
            foreach ($name as $key => $value) {
                $this->alias($key, $value);
            }

            return null;
        }

        if ($value === null) {
            return $this->getAlias($name);
        }

        if (mb_strpos($name, '@') !== 0) {
            $name = '@'.$name;
        }

        $this->alias[$name] = $value;
    }

    /**
     * 获取别名.
     *
     * @param  string  $name
     * @param  array  $params
     * @return array|string
     */
    public function getAlias($name, array $params = [])
    {
        if (mb_strpos($name, '@') !== 0) {
            $name = '@'.$name;
        }

        [$name, $query] = $this->parseParams($name);

        $assets = $this->alias[$name] ?? [];

        // 路径别名
        if (is_string($assets)) {
            return $assets;
        }

        $params += $query;

        return [
            'js' => $this->normalizeAliasPaths($assets['js'] ?? [], $params) ?: null,
            'css' => $this->normalizeAliasPaths($assets['css'] ?? [], $params) ?: null,
        ];
    }

    /**
     * @param  array  $files
     * @param  array  $params
     * @return array
     */
    protected function normalizeAliasPaths($files, array $params)
    {
        $files = (array) $files;

        foreach ($files as &$file) {
            foreach ($params as $k => $v) {
                if ($v !== '' && $v !== null) {
                    $file = str_replace("{{$k}}", $v, $file);
                }
            }
        }

        return array_filter($files, function ($file) {
            return ! mb_strpos($file, '{');
        });
    }

    /**
     * 解析参数.
     *
     * @param  string  $name
     * @return array
     */
    protected function parseParams($name)
    {
        $name = explode('?', $name);

        if (empty($name[1])) {
            return [$name[0], []];
        }

        parse_str($name[1], $params);

        return [$name[0], $params];
    }

    /**
     * 根据别名设置需要载入的js和css脚本.
     *
     * @param  string|array  $alias
     * @param  array  $params
     * @return void
     */
    public function require($alias, array $params = [])
    {
        if (is_array($alias)) {
            foreach ($alias as $v) {
                $this->require($v, $params);
            }

            return;
        }

        $assets = $this->getAlias($alias, $params);

        $this->js($assets['js']);
        $this->css($assets['css']);
    }

    /**
     * 设置需要载入的css脚本.
     *
     * @param  string|array  $css
     */
    public function css($css)
    {
        if (! $css) {
            return;
        }
        $this->css = array_merge(
            $this->css,
            (array) $css
        );
    }

    public function font(string|array $font)
    {

        $this->fonts = array_merge(
            $this->fonts,
            (array) $font
        );
    }

    // public function lib(string|array $lib)
    // {
    //     $this->libs = array_merge(
    //         $this->libs,
    //         (array) $lib
    //     );
    // }

    /**
     * 设置需要载入的基础css脚本.
     *
     * @param  array  $css
     */
    public function baseCss(array $css, bool $merge = false)
    {
        if ($merge) {
            $this->baseCss = array_merge($this->baseCss, $css);
        } else {
            $this->baseCss = $css;
        }
    }

    /**
     * 设置需要载入的js脚本.
     *
     * @param  string|array  $js
     */
    public function js($js)
    {
        if (! $js) {
            return;
        }
        $this->js = array_merge(
            $this->js,
            (array) $js
        );
    }

    /**
     * 根据别名获取资源路径.
     *
     * @param  string  $path
     * @param  string  $type
     * @return string|array|null
     */
    public function get($path, string $type = 'js')
    {
        if (empty($this->alias[$path])) {
            return $this->url($path);
        }

        $paths = isset($this->alias[$path][$type]) ? (array) $this->alias[$path][$type] : null;

        if (! $paths) {
            return $paths;
        }

        foreach ($paths as &$value) {
            $value = $this->url($value);
        }

        return $paths;
    }

    /**
     * 获取静态资源完整URL.
     *
     * @param  string  $path
     * @return string
     */
    public function url($path)
    {
        if (! $path) {
            return $path;
        }

        $path = $this->getRealPath($path);

        if (mb_strpos($path, '//') === false) {
            $path = config('admin.assets_server').'/'.trim($path, '/');
        }

        return (config('admin.https') || config('admin.secure')) ? secure_asset($path) : asset($path);
    }

    /**
     * 获取真实路径.
     *
     * @param  string|null  $path
     * @return string|null
     */
    public function getRealPath(?string $path)
    {
        if (! $this->containsAlias($path)) {
            return $path;
        }

        return implode(
            '/',
            array_map(
                function ($v) {
                    if (! $this->isPathAlias($v)) {
                        return $v;
                    }

                    return $this->getRealPath($this->alias($v)); //todo::fix it
                },
                explode('/', $path)
            )
        );
    }

    /**
     * 判断是否是路径别名.
     *
     * @param  mixed  $value
     * @return bool
     */
    public function isPathAlias($value)
    {
        return $this->hasAlias($value) && is_string($this->alias[$value]);
    }

    /**
     * 判断别名是否存在.
     *
     * @param $value
     * @return bool
     */
    public function hasAlias($value)
    {
        return isset($this->alias[$value]);
    }

    /**
     * 判断是否含有别名.
     *
     * @param  string  $value
     * @return bool
     */
    protected function containsAlias($value)
    {
        return $value && mb_strpos($value, '@') === 0;
    }

    /**
     * 设置在head标签内加载的js.
     *
     * @param  string|array  $js
     */
    public function headerJs($js, bool $merge = true)
    {
        if ($merge) {
            $this->headerJs = $js ? array_merge($this->headerJs, (array) $js) : $this->headerJs;
        } else {
            $this->headerJs = (array) $js;
        }
    }

    /**
     * 设置基础js脚本.
     *
     * @param  array  $js
     * @param  bool  $merge
     */
    public function baseJs(array $js, bool $merge = true)
    {
        if ($merge) {
            $this->baseJs = array_merge($this->baseJs, $js);
        } else {
            $this->baseJs = $js;
        }
    }

    /**
     * 设置js代码.
     *
     * @param  string|array  $script
     * @param  bool  $direct
     */
    public function script($script, bool $direct = false)
    {
        if (! $script) {
            return;
        }
        if ($direct) {
            $this->directScript = array_merge($this->directScript, (array) $script);
        } else {
            $this->script = array_merge($this->script, (array) $script);
        }
    }

    /**
     * 设置css代码.
     *
     * @param  string  $style
     */
    public function style($style)
    {
        if (! $style) {
            return;
        }
        $this->style = array_merge($this->style, (array) $style);
    }

    /**
     * 字体css脚本路径.
     */
    protected function addFontCss()
    {
        $this->fonts && ($this->baseCss = array_merge(
            $this->baseCss,
            (array) $this->fonts
        ));
    }

    protected function isPjax()
    {
        return request()->pjax();
    }

    /**
     * 合并基础css脚本.
     */
    protected function mergeBaseCss()
    {
        if ($this->isPjax()) {
            return;
        }

        $this->addFontCss();

        $this->css = array_merge($this->baseCss, $this->css);
    }

    /**
     * @return string
     */
    public function cssToHtml()
    {
        $this->setUpTheme();

        $this->mergeBaseCss();

        $html = '';

        foreach (array_unique($this->css) as &$v) {
            if (! $paths = $this->get($v, 'css')) {
                continue;
            }

            foreach ((array) $paths as $path) {
                $html .= "<link rel=\"stylesheet\" href=\"{$this->withVersionQuery($path)}\">";
            }
        }

        return $html;
    }

    /**
     * @param  string  $url
     * @return string
     */
    public function withVersionQuery($url)
    {
        if (! Str::contains($url, '?')) {
            $url .= '?';
        }

        $ver = config('admin.version','v'.Admin::VERSION);

        return Str::endsWith($url, '?') ? $url.$ver : $url.'&'.$ver;
    }

    /**
     * 合并基础js脚本.
     */
    protected function mergeBaseJs()
    {
        if ($this->isPjax()) {
            return;
        }

        $this->js = array_merge($this->baseJs, $this->js);
    }

    /**
     * @return string
     */
    public function jsToHtml()
    {
        $this->mergeBaseJs();

        $html = '';

        foreach (array_unique($this->js) as &$v) {
            if (! $paths = $this->get($v, 'js')) {
                continue;
            }

            foreach ((array) $paths as $path) {
                $html .= "<script src=\"{$this->withVersionQuery($path)}\"></script>";
            }
        }

        return $html;
    }

    /**
     * @return string
     */
    public function headerJsToHtml()
    {
        $html = '';

        foreach (array_unique($this->headerJs) as &$v) {
            if (! $paths = $this->get($v, 'js')) {
                continue;
            }

            foreach ((array) $paths as $path) {
                $html .= "<script src=\"{$this->withVersionQuery($path)}\"></script>";
            }
        }

        return $html;
    }

    /**
     * @return string
     */
    public function scriptToHtml()
    {
        $script = implode(";\n", array_unique($this->script));
        $directScript = implode(";\n", array_unique($this->directScript));

        return <<<HTML
<script data-exec-on-popstate>
(function () {
    try {
        {$directScript}
    } catch (e) {
        console.error(e)
    }
})();
Dcat.ready(function () {
    try {
        {$script}
    } catch (e) {
        console.error(e)
    }
})
</script>
HTML;
    }

    /**
     * @return string
     */
    public function styleToHtml()
    {
        $style = implode('', array_unique($this->style));

        return "<style>$style</style>";
    }
}
