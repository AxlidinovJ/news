<?php

namespace frontend\assets;
use yii\web\AssetBundle;


class NewsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
       "css/animate.css",
	   "css/icomoon.css",
	    "css/magnific-popup.css",
	    "css/salvattore.css",
	    "css/style.css",
    ];
    public $js = [
        "js/jquery.min.js",
	    "js/jquery.easing.1.3.js",
	    "js/bootstrap.min.js",
	    "js/jquery.waypoints.min.js",
	    "js/jquery.magnific-popup.min.js",
	    "js/salvattore.min.js",
	    "js/main.js",
        "js/modernizr-2.6.2.min.js",
    ];
    public $depends = [
        // 'yii\web\YiiAsset',
        // 'yii\bootstrap4\BootstrapAsset',
    ];
}
