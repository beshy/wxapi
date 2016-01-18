## Run it:

1. `$ cd wxapi/src`
2. `$ composer install` install dependencies
3. `$ php -S 0.0.0.0:8888 -t public public/index.php`
4. Browse to `http://127.0.0.1:8888`

> you can also run it with difference server environment:
> `$ php -S 0.0.0.0:8888 -t public public/local.php`
> `$ php -S 0.0.0.0:8888 -t public public/rd.php`
> `$ php -S 0.0.0.0:8888 -t public public/qa.php`
> `$ php -S 0.0.0.0:8888 -t public public/publish.php`

## nginx conf

```conf
server {

    listen       8888;

    root   /xxx/wxapi/src/public;

    location / { # you can change local.php to publish.php rd.php qa.php or else
        index local.php index.php index.html index.htm;
        try_files $uri $uri/ /local.php?$args;
    }

    location ~ \.php$ {
        fastcgi_pass        127.0.0.1:9000;
        fastcgi_index       index.php;
        fastcgi_param       SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include             fastcgi_params;
    }

}

```

## Key directories

* `src`: Source code
* `src/app`: All class files within the `App` namespace
* `src/boot`: Boot code
* `src/boot/configs`: Config files
* `src/boot/middlewares`: Application middleware
* `src/boot/routes`: All application routes are here
* `src/boot/services`: Service providers
* `view`: Template files
* `public`: Webserver root
* `vendor`: Composer dependencies

