# congress-vote-analytics 選票成份分析網站

## [http://congress-vote-analytics.herokuapp.com/](http://congress-vote-analytics.herokuapp.com/)

如何加入開發
==========

## 法 1：建立 local 端環境以加入開發

內容待捕

## 法 2：建立 Heroku App 以加入開發

內容待捕

## 法 3：直接 push 到 Dev 測試環境以加入開發

若要使用此方法加入開發，請聯繫開發人員為您開啟權限。

Step 1：clone 專案至您的電腦

```
git@github.com:g0v/congress-vote-analytics.git
```

Step 2：切換到 branch dev，開始開發

```
git checkout dev
```

Step 3：將修改完的程式 commit 並 push 至 dev branch

Step 4：部署至測試環境看修改結果

```
sh /path/to/script/deploy-to-dev.sh
```

## 法 4：建立 Vagrant 環境以加入開

如何部署至測試環境
==========

測試環境網址：[http://dev-congress-vote-analytics.herokuapp.com/](http://dev-congress-vote-analytics.herokuapp.com/)

部署至測試環境需要有 heroku app 權限，若要加入開發，請聯繫開發人員為您開啟權限。
部署至測試環境的指令如下：

```
git config remote.heroku.url "git@heroku.com:dev-congress-vote-analytics.git"
git push -f heroku dev:master
```

或者在 *uix 環境下您也可以使用 repo 裡的 script 來進行部署，指令如下：

```
sh /path/to/script/deploy-to-dev.sh
```

如何部署至正式環境
==========

正式環境網址：[http://congress-vote-analytics.herokuapp.com/](http://congress-vote-analytics.herokuapp.com/)

部署至正式環境需要有 heroku app 權限，若要加入開發，請聯繫開發人員為您開啟權限。
部署至正式環境的指令如下：

```
git config remote.heroku.url "git@heroku.com:congress-vote-analytics.git"
git push heroku master
```

或者在 *uix 環境下您也可以使用 repo 裡的 script 來進行部署，指令如下：

```
sh /path/to/script/deploy-to-master.sh
```

看起來像這樣
==============

![圖片](https://raw.github.com/g0v/congress-vote-analytics/master/public/image/screenshot-1.png)
![圖片](https://raw.github.com/g0v/congress-vote-analytics/master/public/image/screenshot-2.png)
![圖片](https://raw.github.com/g0v/congress-vote-analytics/master/public/image/screenshot-3.png)
![圖片](https://raw.github.com/g0v/congress-vote-analytics/master/public/image/screenshot-4.png)
![圖片](https://raw.github.com/g0v/congress-vote-analytics/master/public/image/screenshot-5.png)
![圖片](https://raw.github.com/g0v/congress-vote-analytics/master/public/image/screenshot-6.png)

## License

MIT http://g0v.mit-license.org