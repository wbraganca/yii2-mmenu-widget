<?php
/**
 * @link      https://github.com/wbraganca/yii2-mmenu
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
        'src/css/jquery.mmenu.all.css',
    ];
    public $js = [
        'src/js/jquery.mmenu.min.all.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
