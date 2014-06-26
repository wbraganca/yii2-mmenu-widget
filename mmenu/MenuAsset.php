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
 * @since 1.0.0
 */
class MenuAsset extends \yii\web\AssetBundle
{
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    /**
     * Set up CSS and JS asset arrays based on the base-file names
     *
     * @param string $type whether 'css' or 'js'
     * @param array $files the list of 'css' or 'js' basefile names
     */
    protected function setupAssets($type, $files = [])
    {
        $srcFiles = [];
        foreach ($files as $file) {
            $srcFiles[] = "{$file}.{$type}";
        }
        if (empty($this->$type)) {
            $this->$type = $srcFiles;
        }
    }

    /**
     * Sets the source path if empty
     *
     * @param string $path the path to be set
     */
    protected function setSourcePath($path)
    {
        if (empty($this->sourcePath)) {
            $this->sourcePath = $path;
        }
    }

    public function init()
    {
        $this->setSourcePath(__DIR__ . '/../assets');
        $this->setupAssets('css', ['css/jquery.mmenu.all']);
        $this->setupAssets('js', ['js/jquery.mmenu.min.all']);
        parent::init();
    }
}
