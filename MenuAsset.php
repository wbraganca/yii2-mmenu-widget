<?php
/**
 * @link      https://github.com/wbraganca/yii2-mmenu-widget
 * @copyright Copyright (c) 2014 Wanderson Bragança
 * @license   https://github.com/wbraganca/yii2-mmenu/blob/master/LICENSE
 * @version   1.0.0
 */

namespace wbraganca\mmenu;

/**
 * Asset bundle for mmenu Widget
 *
 * @author Wanderson Bragança <wanderson.wbc@gmail.com>
 */
class MenuAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@bower/jQuery.mmenu';
    public $css = [
        'dist/css/jquery.mmenu.all.css',
    ];
    public $js = [
        'dist/js/jquery.mmenu.all.min.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
