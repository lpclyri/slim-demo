##     PHP slim 3.X 微框架研究

#### 1、系统要求
* php 5.5.0 及以上版本
* 支持url重写的web服务器

#### 2、slim安装（不想自己搭，请直接从第3步开始看）
* mkdir slim-demo, cd slim-demo, mkdir src, cd src, mkdir public
* 在src文件夹中 composer require slim/slim
* 此时src中有 composer.json  composer.lock  public  vendor 4个文件(夹)
* 在src中建立 .gitignore 文件，写入 vendor/*
* 在src/public/中建立index.php文件，写入下面代码

```
<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App;
$app->get('/', function ($request, $response, $args) {  
    $response->write("Hello, Welcome to Slim Framework!!!");  
    return $response;  
});
$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    return $response;
});
$app->run();
```

* 在终端切入到public文件夹下，参照下面第4步，执行： php -S localhost:9091
* 浏览器中运行：localhost:9091

#### 3、slim搭建好的一个开源项目 skeleton
* 为也节省slim project配置时间，slim有一个开源的skeleton项目，可直接下载使用
* 下载方式：php composer create-project --prefer-dist slim/slim-skeleton slim-demo

#### 4、本地web服务器 (built-in server)
* cd slim-demo(你的prject name)
* 在terminal或iterm2中运行 php -S localhost:9090 -t ./public/
* 在浏览器地址栏中访问 localhost:9090 确定slim是否运行成功
![](./slim 3-1.png '成功时')
* 备注：上面这种方式只是简单尝试一下，看一下是否project是否可以运行成功，最好还是用mamp或docker(下载的slim中有写好docker-compose文件)本地配置一下，方便使用。

#### 5、restful风格开发api
* 见我本地项目slim-demo
* [网友做的一个slim api开发文档](http://blog.csdn.net/david116/article/details/51720900)
* [slim PHP中文参考文档](http://slim.lup5.com/docs/)

#### 6、总结
* slim是一个非常精简的框架，容易上手;
* slim运行效率高;
* slim框架其实是需要什么服务，安装什么服务，以实现任务为目标;
* slim非常自由，每个人可以根据自己的习惯自由搭建project;

* slim不好的就是，很多东西都需要自己动手，用起来可能不是很方便；而且靠coder自己搭建的项目难免会出现各种问题，维护成本潜在性提高。