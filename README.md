Yii2 view pages
===============
Yii2 view pages

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist fgh151/yii2-view-pages "*"
```

or add

```
"fgh151/yii2-view-pages": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply add it in your config by  :
Basic ```config/web.php```

Advanced ```[backend|frontend|common]/config/main.php```

```php
    'modules' => [
        'pages' => [
            'class' => 'fgh151\vpages\Module',
        ],
        //...
    ]
```

RBAC
----

You can use RBAC with module. Simply add it in your config:

```

        'modules'    => [
             'pages' => [
                 'class' => 'fgh151\vpages\Module',
                 'as access' => [
                     'class' => 'yii\filters\AccessControl',
                     'rules' => [
                         [
                             'allow' => true,
                             'roles' => ['admin'],
                         ]
                     ]
                 ]
             ]
            ...
            ...
        ],
```