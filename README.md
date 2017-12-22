# readICCard_Server
サーバー側のリポジトリ  
実際にAzureで仕様したファイルはlogin_lbsである
# login_lbsファイル構成
## config
azureサーバとの接続ファイルが主
### autoload.php
わすれちゃった笑笑
### config.php
データベースサーバとの接続部分

## lib
### Controller.php

### Model.php

### functions.php

## Controller
大文字のプログラムのところはそれぞれのところに本来の小文字のphpにクラスとして渡す
## Exception
例外のキャッチ
## Model
データベースにLoginしているユーザを渡している

## public_html
必要なのを書く
### index.php
主にメインのページ
### login.php
loginのページ
### signup.php
sighupのページ、signupしたらlogin.phpに遷移
## icas_discount
ページの主な機能プログラム（検索する動きとか削除機能とか）
### show.php
テーブル表示させるページ。結果を返す。
### register.php
データベースにIDmをインサートするプログラム、ちなみにAzureのサーバ時間に時差がある。
### register2.php
いまはつかってない
### logout.php
loginページに遷移する。
### loginuser.php
loginしている人を表示する。見た目的には未完成
### delete2.php
delete2が主にリストから削除する機能のプログラム
### area_delete.php
areaの消去する際の機能
### area_register.php
areaを登録するための機能のページ
## css
cssのプログラムや素材があるよ

