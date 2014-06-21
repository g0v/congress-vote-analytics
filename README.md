# congress-vote-analytics 選票成份分析網站

## [http://congress-vote-analytics.herokuapp.com/](http://congress-vote-analytics.herokuapp.com/)

如何加入開發
==========

## 法 1：建立 local 端環境以加入開發

#### 步驟
- 執行終端指令 `git clone <本專案git位址>` 本專案到指定資料夾
- 將網路伺服器設定根目錄到本專案的public資料夾，或是指定到本專案根目錄的server資料夾。_（註1）_
- 執行終端指令 `composer update` ，更新vendor。_（註1）_
- 編輯 `app/config/app.php` ，將 `url` 參數修改為本專案的根目錄，並且更新 `key` 參數的值。_（註1、註2）_
- 編輯 `app/config/database.php` ，修改資料庫連線參數。_（註1）_
- 執行終端指令 `php artisan migrate` ，建立資料表。
- 連線到網站，測試是否正常，看會不會出現系統錯誤訊息，若有，請檢查是否為伺服器環境的問題。若認為是程式問題，請到本專案的頁面提報Issue。
- 加入開發吧！

#### 備註
1. 詳細請參照 [Laravel Framework][1] 的說明文件。
2. 因為本專案目前多數路徑是絕對路徑，所以請將本專案建立在網域根目錄，例如localhost，或自行設立virtual host。

## 法 2：建立 Heroku App 以加入開發

Step 1：建立 HEROKU 環境

詳情請參考 [如何建立 HEROKU 環境](http://blog.fukuball.com/jian-li-heroku-huan-jing/)

Step 2：clone 專案至您的電腦

```
$ git clone git@github.com:g0v/congress-vote-analytics.git
```

Step 3：進入專案資料夾

```
$ cd congress-vote-analytics
```

Step 4：切換到 branch dev

```
$ git checkout dev
```

Step 5：在 Heroku 上開啟一個可以 Build Laravel 的專案

```
$ heroku create my-laravel-project --buildpack https://github.com/winglian/heroku-buildpack-php

Creating my-laravel-project... done, stack is cedar
BUILDPACK_URL=https://github.com/winglian/heroku-buildpack-php
http://my-laravel-project.herokuapp.com/ | git@heroku.com:my-laravel-project.git
Git remote heroku added
```
Step 6：修改 code 後，部署至您開啟的 Heroku 專案看修改結果

```
$ git config remote.heroku.url "git@heroku.com:my-laravel-project.git"
$ git push -f heroku dev:master
```

至 http://my-laravel-project.herokuapp.com 看修改結果

## 法 3：直接 push 到 Dev 測試環境以加入開發

若要使用此方法加入開發，請聯繫開發人員為您開啟權限。


Step 1：建立 HEROKU 環境

詳情請參考 [如何建立 HEROKU 環境](http://blog.fukuball.com/jian-li-heroku-huan-jing/)

Step 2：clone 專案至您的電腦

```
$ git clone git@github.com:g0v/congress-vote-analytics.git
```

Step 3：進入專案資料夾

```
$ cd congress-vote-analytics
```

Step 4：切換到 branch dev，開始開發

```
$ git checkout dev
```

Step 5：將修改完的程式 commit 並 push 至 branch dev

Step 6：部署至測試環境看修改結果

```
$ sh /path/to/script/deploy-to-dev.sh
```

## 法 4：建立 Vagrant 環境以加入開發

內容待補

如何部署至測試環境
==========

測試環境網址：[http://dev-congress-vote-analytics.herokuapp.com/](http://dev-congress-vote-analytics.herokuapp.com/)

部署至測試環境需要有 heroku app 權限，若要加入開發，請聯繫開發人員為您開啟權限。
部署至測試環境的指令如下：

```
$ git config remote.heroku.url "git@heroku.com:dev-congress-vote-analytics.git"
$ git push -f heroku dev:master
```

或者在 *nix 環境下您也可以使用 repo 裡的 script 來進行部署，指令如下：

```
$ sh /path/to/script/deploy-to-dev.sh
```

如何部署至正式環境
==========

正式環境網址：[http://congress-vote-analytics.herokuapp.com/](http://congress-vote-analytics.herokuapp.com/)

部署至正式環境需要有 heroku app 權限，若要加入開發，請聯繫開發人員為您開啟權限。
部署至正式環境的指令如下：

```
$ git config remote.heroku.url "git@heroku.com:congress-vote-analytics.git"
$ git push heroku master
```

或者在 *nix 環境下您也可以使用 repo 裡的 script 來進行部署，指令如下：

```
$ sh /path/to/script/deploy-to-master.sh
```

看起來像這樣
==============

![圖片](https://raw.github.com/g0v/congress-vote-analytics/master/public/image/screenshot-1.png)
![圖片](https://raw.github.com/g0v/congress-vote-analytics/master/public/image/screenshot-2.png)
![圖片](https://raw.github.com/g0v/congress-vote-analytics/master/public/image/screenshot-3.png)
![圖片](https://raw.github.com/g0v/congress-vote-analytics/master/public/image/screenshot-4.png)
![圖片](https://raw.github.com/g0v/congress-vote-analytics/master/public/image/screenshot-5.png)
![圖片](https://raw.github.com/g0v/congress-vote-analytics/master/public/image/screenshot-6.png)

## Developer
- Bater baterme [at] gmail [dot] com
- Ruoshi fntsrlike [at] gmail [dot] com

## License

MIT http://g0v.mit-license.org
