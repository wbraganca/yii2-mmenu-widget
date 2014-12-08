<?php
/**
 * @link      https://github.com/wbraganca/yii2-mmenu
 * @copyright Copyright (c) 2014 Wanderson Bragança
 * @license   https://github.com/wbraganca/yii2-mmenu/blob/master/LICENSE
 */

namespace wbraganca\mmenu;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/**
 * The yii2-mmenu widget is a Yii 2 wrapper for the jQuery-mmenu.
 * See more: http://mmenu.frebsite.nl/
 *
 * @author Wanderson Bragança <wanderson.wbc@gmail.com>
 * @since 1.0.0
 */
class Menu extends \yii\widgets\Menu
{
    /**
     * @var array
     */
    public $clientOptions = [];
    /**
     * @var string the template used to render the body of a menu which is NOT a link.
     * In this template, the token `{label}` will be replaced with the label of the menu item.
     * This property will be overridden by the `template` option set in individual menu items via [[items]].
     */
    public $labelTemplate = '{icon}{label}';
    /**
     * @var string the template used to render the body of a menu which is a link.
     * In this template, the token `{url}` will be replaced with the corresponding link URL;
     * while `{label}` will be replaced with the link text.
     * This property will be overridden by the `template` option set in individual menu items via [[items]].
     */
    public $linkTemplate = '<a href="{url}">{icon}{label}</a>';
    /**
     * @var string
     */
    public $noLinkTemplate = '<span>{icon}{label}</span>';

    public function init()
    {
        parent::init();
        MenuAsset::register($this->getView());
        $this->activateParents = true;
    }

    public function run()
    {
        echo Html::tag('nav', $this->renderMenu(), ['id' => $this->id]);
        $this->registerScript();
    }

    /**
     * Renders the main menu
    * @return string
     */
    protected function renderMenu()
    {
        if ($this->route === null && Yii::$app->controller !== null) {
            $this->route = Yii::$app->controller->getRoute();
        }
        if ($this->params === null) {
            $this->params = $_GET;
        }
        $items = $this->normalizeItems($this->items, $hasActiveChild);
        $options = $this->options;
        $tag = ArrayHelper::remove($options, 'tag', 'ul');
        return Html::tag($tag, $this->renderItems($items), $options);
    }

    /**
     * Renders the content of a side navigation menu item.
     *
     * @param array $item the menu item to be rendered. Please refer to [[items]] to see what data might be in the item.
     * @return string the rendering result
     * @throws InvalidConfigException
     */
    protected function renderItem($item)
    {
        $this->validateItems($item);
        $url = ArrayHelper::getValue($item, 'url', '#');
        $url = ($url === '') ? '' : Url::to($url);
        $template = ($url === '') ? $this->noLinkTemplate : $this->linkTemplate;
        $icon = empty($item['icon']) ? '' : '<i class="' . $item['icon'] . '"></i> &nbsp;';
        return strtr($template, [
            '{url}' => $url,
            '{label}' => $item['label'],
            '{icon}' => $icon
        ]);
    }

    /**
     * Validates each item for a valid label and url.
     *
     * @throws InvalidConfigException
     */
    protected function validateItems($item)
    {
        if (! isset($item['label'])) {
            throw new InvalidConfigException("The 'label' option is required.");
        }
    }

    protected function registerScript()
    {
        $clientOptions = Json::encode($this->clientOptions);
        $view = $this->getView();
        $view->registerJs('$("nav#' . $this->id .'").mmenu(' . $clientOptions . ');');
    }
}
