# Overview

LAMP環境を構築するサンプルです。  
DockerとDocker Composeを利用して、少ないコマンドで開発環境を構築するベストプラクティスを考えていきます。

# Installation

```bash
$ git clone https://github.com/m-ohata/example-docker-lamp.git
```

## Docker

OSによって以下の導入方法を使い分けてください。

- Linux: [Docker Engine](https://docs.docker.com/engine/installation/)
- Windows: [Docker for Windows](https://docs.docker.com/docker-for-windows/install/)
- Mac: [Docker for Mac](https://docs.docker.com/docker-for-mac/install/)

## Docker Compose

[Install Docker Compose](https://docs.docker.com/compose/install/)を参照してください。

```Bash
$ curl -L "https://github.com/docker/compose/releases/download/1.11.1/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose

$ chmod +x /usr/local/bin/docker-compose

// インストール後の確認
$ docker-compose --version
```

# Usage

## PHPイメージのビルド

公式のPHPイメージはLAMPを構成する為のライブラリが不足しています。  
下記のコマンドを入力して依存ライブラリを追加したイメージをビルドします。

```Bash
$ cd example-docker-lamp/example

$ docker-compose build
```

## サーバーの起動

```Bash
$ cd example-docker-lamp/example

// バックグラウンドモードで立ち上げる
$ docker-compose up -d

// ログを確認(-fは監視モード)
$ docker-compose log -f
```

## サーバーの停止

```Bash
$ cd example-docker-lamp/example

// サーバーの停止
$ docker-compose stop

// コンテナの削除
$ docker-compose rm -fa
```

# Links

## dependences

以下の技術を利用しています。

- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/overview/)
- [PHP](http://php.net/manual/ja/index.php)
- [MySQL](https://www-jp.mysql.com/)

## refer to

以下のサイトを参考にしました。

- [php - Docker Hub OFFICIAL REPOSITORY](https://hub.docker.com/_/php/)
- [mysql - Docker Hub OFFICIAL REPOSITORY](https://hub.docker.com/_/mysql/)
- [PDO - PHP Manual](http://php.net/manual/ja/class.pdo.php)
- [テーブルの作成 - DBOnline](https://www.dbonline.jp/mysql/table/index1.html)
- [Docker Hubのオフィシャルイメージを使ったLAMP環境(Apache+PHP+MySQL)構築 - Qiita](http://qiita.com/naga3/items/be1a062075db9339762d)
- [Docker compose ことはじめハンズオン - Qiita](http://qiita.com/TsutomuNakamura/items/7e90e5efb36601c5bc8a)

