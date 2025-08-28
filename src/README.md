# 確認テスト_もぎたて

## 環境構築
**Dockerビルド**
1．ディレクトリの作成
※カレントディレクトリは~/coachtech想定
mkdir verification_test
cd verification_test
mkdir docker src
touch docker-compose.yml
cd docker
mkdir mysl nginx php
mkdir mysql/data
touch mysql/my.cnf
touch nginx/default.conf
touch php/Dockerfile
touch php/php.iniを実行し、Dockerビルドに必要なディレクトリを作成する。
2．docker-compose.yml の作成
3．default.confファイル作成
4．Dockerfile設定
5．php.iniファイル設定
6．my.cnfファイル設定（Mysqlの設定）
7．`docker-compose up -d --build`

**Laravel環境構築**
1. `docker-compose exec php bash`
2. `composer install`
3. `composer create-project "laravel/laravel=8.*" . --prefer-dist`
4. 「.env.example」ファイルを 「.env」ファイルに命名を変更。または、新しく.envファイルを作成する
5. .envに以下の環境変数を追加
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass
6. アプリケーションキーの作成
`php artisan key:generate`
7. マイグレーションの実行
`php　artisan:migration create_products_table`
`php artisan:migration create_seasons_table`
`php artisan:migration create_product_season_table`
`php artisan migrate`

8. シーディングの実行
`php artisan make:seeder ProductsTableSeeder`
`php artisan make:seeder SeasonsTableSeeder`
`php artisan db:seed`

9.モデルの作成
`php artisan make:model Product`
`php artisan make:model Season`

## 使用技術(実行環境)
-PHP 7.4.9
-Laravelフレームワーク 8.83.29
-Mysql 10.3.39-MariaDB

## ER図
![alt](ER.png)

## URL
- 開発環境：http://localhost/
- phpMyAdmin:：http://localhost:8080/