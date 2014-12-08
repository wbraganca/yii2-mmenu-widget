yii2-mmenu-widget
=================

The yii2-mmenu-widget widget is a Yii 2 wrapper for the [jQuery-mmenu](http://mmenu.frebsite.nl/):

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist wbraganca/yii2-mmenu-widget "*"
```

or add

```
"wbraganca/yii2-mmenu-widget": "*"
```


How to use
----------

On your view file.

```php
<?= \wbraganca\mmenu\Menu::widget([
    'items' => [
        [
            'label' => 'Home',
            'url' => '#',
            'icon' => 'glyphicon glyphicon-home'
        ],
        [
            'label' => 'Submenu',
            'url' => '',
            'icon' => 'glyphicon glyphicon-plus-sign',
            'items' => [
                [
                    'label' => 'link 1',
                    'url' => '#',
                    'icon' => 'glyphicon glyphicon-file',
                ],
                 [
                    'label' => 'link 2',
                    'url' => '#',
                    'icon' => 'glyphicon glyphicon-file',
                ],
            ]
        ]
    ]
]) ?>
```
