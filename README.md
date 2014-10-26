DbSimple
========

Add to your composer.json

```json
    "require": {
       "dklab/dbsimple": "dev-master"
    },
    "repositories":[
        {
            "type": "git",
            "url": "https://github.com/plumbum/dbsimple.git"
        }
    ]
```


Sybase driver
-------------

Allow on fly encoding (see. Example)


Example
-------

```php
<?php

require_once 'vendor/autoload.php';

$DB = DbSimple_Generic::connect("sybase://user:password@127.0.0.1:5000/db_name?rcharset=cp1251&lcharset=utf8");

$r = $DB->query("set ROWCOUNT 10");

$data = $DB->select("SELECT * FROM Show WHERE Name LIKE '%балет%'");
var_dump($data);

```
