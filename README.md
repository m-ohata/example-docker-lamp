# Overview

LAMP環境を構築するサンプルです。  
[1コマンドで作った。Dockerで開発環境を構築する方法](http://sitest.jp/blog/?p=8823)という記事を通して  
少ないコマンドで開発環境を構築するベストプラクティスを考えていきます。

# Installation

まずはソースコードをDLして下さい。  
Gitが入っていれば下記のコマンドでDLできます。

```bash
$ git clone https://github.com/m-ohata/example-docker-lamp.git
```

## Docker

DockerはLinux上でなければ動作しませんが、  
軽量な仮想のLinuxマシンを立てて、その中にDockerコマンドを注入する仕組みを公開しています。  
Windows版、Mac版も試してみて下さい。

- Linux: [Docker Engine](https://docs.docker.com/engine/installation/)
- Windows: [Docker for Windows](https://docs.docker.com/docker-for-windows/install/)
- Mac: [Docker for Mac](https://docs.docker.com/docker-for-mac/install/)

## Docker Compose

Dockerでコンテナを操作する為には沢山のオプションを使いこなす必要があります。  
Docker Composeはシステム構築に於けるオプションをテキストファイルで管理できるオーケストレーションツールです。  
(Docker for Mac上で動作することを確認しております)

参考Url: [Install Docker Compose](https://docs.docker.com/compose/install/)

```Bash
$ curl -L "https://github.com/docker/compose/releases/download/1.11.1/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose

$ chmod +x /usr/local/bin/docker-compose

// インストール後の確認
$ docker-compose --version
```

# Usage

## コマンド一覧を確認

Docker Composeコマンドも煩わしいので、  
頻出コマンドはシェルスクリプトでまとめました。

```Bash
$ ls bin
build  log  restart  start  status  stop
```

各コマンドの動作は以下の項目で紹介していきます。

## イメージのビルド

公式のPHPイメージは最小構成で動作させる事が目的ですので、  
LAMPを構成する為のライブラリが不足しています。  
サーバを起動する前に依存モジュールを追加したイメージをビルドします。

```Bash
$ bin/build
```

## サーバの操作

```Bash
// サーバを起動
$ bin/start
Creating mysql
Creating web

// サーバの状態を確認
$ bin/status
Name               Command               State           Ports
-----------------------------------------------------------------------
mysql   docker-entrypoint.sh mysqld      Up      0.0.0.0:3306->3306/tcp
web     docker-php-entrypoint apac ...   Up      0.0.0.0:80->80/tcp

// サーバのログを確認
$ bin/log
(Ctrl + Cで抜ける)

// サーバをリスタート
$ bin/restart
Stopping web ... done
Stopping mysql ... done
Going to remove web, mysql
Removing web ... done
Removing mysql ... done
Creating mysql
Creating web

// サーバを停止
$ bin/stop
Stopping web ... done
Stopping mysql ... done
Going to remove web, mysql
Removing web ... done
Removing mysql ... done
```

# Description

## Directories

ディレクトリ構成は以下を意識しています。

- bin: docker-composeの頻出コマンドをまとめた
- example: docker-compose.yml置き場
- images: Dockerfile置き場
  - php: 依存モジュールを組み込んだPHPイメージ
- public: Apacheの公開領域

公開領域以外のファイルはLAMP環境を問わず学習の足しになるかと考えていますので、是非参照してみてください。

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

