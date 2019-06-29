# OAuth認証

## 概要

大学のレポートをアップロード＆共有できるサービス

具体的な機能
* ログイン
* ログアウト
* ユーザー情報の表示
* アクセス解析


## 開発環境のセットアップ手順

1. DBを作成
1. ソースコードをcloneする
1. 「composer install」を実行
1. 「composer update」を実行
1. 「composer dump-autoload」を実行
1. /menu_zukan/.env.exampleファイルを書き換えて「.env」というファイル名に変更する(具体的に変更する項目を以下に示す)
1. 「php artisan migrate」を実行し、テーブルを作成
1. 「php artisan db:seed --class=MenusSeeder」を実行し、シードデータを挿入
1. 「php artisan jwt:secret」を実行 
1. うまくいかないときは「php artisan config:clear」を実行してから手順を繰り返す
1. 「php artisan key:generate」を実行
1. 「php artisan storage:link」を実行

## アクセスログの集計バッチ処理<-New

1. 「php artisan migrate」を実行
1. 「nohup sh ./script/task.sh &」で集計処理をバックグラウンド実行する。(24時間に一回実行)
1. 集計結果は、ログイン後`/admin`で確認することができる。


```
DB_HOST=データベースのホスト
DB_PORT=データベースのポート
DB_DATABASE=データベース名
DB_USERNAME=データベースのユーザ名
DB_PASSWORD=データベースのパスワード

TWITTER_CLIENT_ID=生成したCLIENT_ID
TWITTER_CLIENT_SECRET=生成したCLIENT_SECRET
```


1. cd /menu_zukanでmenu_zukanディレクトリに移動
1. 以下のようにドキュメントルートを指定して実行
```
php -S localhost:8080 -t ./public/
```


## 動作確認できるURI
