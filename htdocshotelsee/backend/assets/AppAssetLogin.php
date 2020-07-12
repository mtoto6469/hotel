<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAssetLogin extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/material-dashboard.css?v=2.1.0',
        'demo/demo.css',
       'css/main.css',
    ];
    public $js = [
'js/core/jquery.min.js',
'js/core/popper.min.js',
'js/core/bootstrap-material-design.min.js',
'js/plugins/perfect-scrollbar.jquery.min.js',
'js/plugins/chartist.min.js',
'js/plugins/bootstrap-notify.js',
'js/material-dashboard.min.js?v=2.1.0',
'demo/demo.js',
        'js/upload-img.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
