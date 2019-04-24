# pixiv-homepage-drawing-API

![PHP](https://img.shields.io/badge/PHP-5.2.0+-blue.svg) 

-----------

## 什么是P站首页美图获取 API？

> P站首页美图API是由我之前[P站爬虫](https://luoshuijs.vip/fxxk-pixiv.html)经验中制成的API程序。

因为在写这个程序之前我几乎没有接触过 PHP，所以 Bug 在所难免。如果你在使用中遇到了什么问题，可以提交 Issue 。


### 这是干什么的？

> 从爬虫中诞生的P站首页美图获取API

改API可以读取P站的首页美图并缓存在磁盘上，并以302重定向获取图片。

-----------

## 我要怎么部署和使用这个 API？

该API对配置的要求非常低且不需要 URL 重写，基本上有 PHP 和 Web 引擎就能跑。

由于国内被墙，因此该API只能在国外服务器使用。

用API翻墙可还行（雾）

### 环境要求

- 一台带有 Apache 或 Nginx 或 IIS 或其他 Web 引擎的主机
- PHP 版本≥ 5.2.0

### 部署教程

1. 检查你的主机是否符合运行环境要求
2. 下载解压
3. 将所有文件放置在你在 Web 引擎中设置的站点目录（虚拟主机用户是上传至站点根目录）
5. 访问检查是否有报错
6. 还有别的步骤么——没有了！

### 演示地址

说明：[https://api.luotianyi.work/pixiv/?encode=help](https://api.luotianyi.work/pixiv/?encode=help)

演示：[https://api.luotianyi.work/pixiv/](https://api.luotianyi.work/pixiv/)

-----------

## 协议与版权

程序是基于 [GNU Affero General Public License v3.0](./LICENSE "GNU Affero General Public License v3.0")  开放源代码的自由软件。

你可以遵照 AGPLv3 协议来修改和重新发布这一程序。

或者，在学习或私自 (内部) 使用时，在不公开发布的原则下，可以无视这个**协议和版权**，因为这本身并不能束缚你，并且我们欢迎这样做。
