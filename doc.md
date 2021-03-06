## CRMEB开源文档地址：https://gitee.com/ZhongBangKeJi/CRMEB

## 运行环境
CRMEB可以支持Windows/Unix服务器环境，需要PHP5.5.9以上，Mysql5.1以上版本支持， 可运行于包括Apache、IIS和nginx在内的多种WEB服务器和模式，支持Mysql数据库，引擎用InnoDB；

如果使用curl发起https请求的时候报错：“SSL certificate problem, verify that the CA cert is OK. Details: error:14090086:SSL routines:SSL3_GET_SERVER_CERTIFICATE:certificate verify failed” 
服务器需要安装证书免费的，方法如下：
http://curl.haxx.se/ca/cacert.pem [下载](http://curl.haxx.se/ca/cacert.pem)
curl.cainfo 参数(php.ini)来指定CA根证书库的位置

如果使用小程序必须使用https协议[百科了解一下](https://baike.baidu.com/item/https/285356)，服务器需要安装ssl证书


框架本身没有什么特别模块要求，具体的应用系统运行环境要求视开发所涉及的模块。 CRMEB底层运行的内存消耗极低，而本身的文件大小也是轻量级的，因此不会出现 空间和内存占用的瓶颈。对于刚刚接触PHP或者CRMEB的新手，我们推荐使用集成开发 环境WAMPServer或者phpstudy（都是一个集成了Apache、PHP和MySQL的开发 套件，而且支持不同PHP版本、MySQL版本和Apache版本的切换）来使用CRMEB 进行本地开发和测试。

## 安装使用

## 一键安装
上传你的代码，直接在浏览器中输入你的域名或IP（例如：www.yourdomain.com）,
安装可以直接访问根目录下index.php,页可以设置对外目录为crmeb，就默认访问crmeb目录下的index.php
安装程序会自动执行安装。期间系统会提醒你输入数据库信息以完成安装，安装完成后建议删除install目录下index.php文件或将其改名。
## 手动安装

1.创建数据库，倒入数据库文件

数据库文件目录名crmeb.sql，在根目录下.

2.修改数据库连接文件

配置文件路径/application/database.php

3.修改目录权限（linux系统）777

/public

/runtime

4.后台登录：http://域名/admin

默认账号：admin 密码：crmeb.com

5.前端登陆（wap端登陆）：http://域名/wap

默认账号：crmeb 密码：123456

6.小程序模版路径

/application/routine/view/crmebN

需要配置域名

/application/routine/view/crmebN/app.js

```
globalData: {
    routineStyle:'#ffffff',
    uid: null,
    openPages:'',
    spid:0,
    urlImages: '',
    url: 'https://shop.crmeb.net/'//改成自己的网址
  },
```

### # 伪静态
1、Nginx
~~~
location / {
       if (!-e $request_filename) {
       rewrite ^(.*)$ /index.php?s=$1 last;
       break;
        }
 }
~~~
2、Apache
.htaccess文件
~~~
RewriteEngine
on

#不显示index.php

RewriteCond %{REQUEST_FILENAME}
!-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.*)$ index.php/$1
[QSA,PT,L]
~~~
3、iis服务
web.config
~~~
<rewrite> 
<rules> 
<rule name="OrgPage" stopProcessing="true"> 
<match url="^(.*)$" /> 
<conditions logicalGrouping="MatchAll"> 
<add input="{HTTP_HOST}" pattern="^(.*)$" /> 
<add input="{REQUEST_FILENAME}" matchType="IsFile" negate="true" /> 
<add input="{REQUEST_FILENAME}" matchType="IsDirectory" negate="true" /> 
</conditions> 
<action type="Rewrite" url="index.php/{R:1}" /> 
</rule> 
</rules> 
</rewrite>
~~~
更多参考：https://www.kancloud.cn/manual/thinkphp5/177576

项目支持公众号商城和小程序商城可单独配置使用，如需公众号和小程序账户同步，请申请微信开放平台进行绑定
开放平台申请地址：https://open.weixin.qq.com/

开源项目不含：砍价和拼团功能
如需砍价和拼团完功能请淘宝购买仅需49元
官方淘宝地址：https://shop120689819.taobao.com/

更多帮助文档：https://gitee.com/ZhongBangKeJi/CRMEB/wikis/%E5%BC%80%E5%8F%91%E6%96%87%E6%A1%A3?sort_id=680379
帮助文档：https://gitee.com/ZhongBangKeJi/CRMEB/wikis
数据字典：请配置public/mysql.php 访问查看
技术支持QQ群：116279623
form-builder帮助文档：https://github.com/xaboy/form-builder