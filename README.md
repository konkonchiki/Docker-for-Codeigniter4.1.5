# Docker-for-Codeigniter4.1.5

## 起動確認
docker-compose.yml ディレクトリで
```
$ docker compose up -d  // Dockerが起動
$ docker ps // webコンテナのID確認
$ docker exec -it <コンテナID> bash // webコンテナへ入る
```
webコンテナ内で
```
$ php spark serve --host 0.0.0.0 // サーバ起動
```
// --host 0.0.0.0によりwebコンテナは外部のすべてのport8080アクセスをコンテナ内の
localhostへルーティングする(0.0.0.0:8080でlistenしている)

http://localhost:8080へアクセスするとwelcomページに繋がる

// to home.php
http://localhost:8080/home

## mysqlコンテナとの接続確認
webコンテナ内で
```
$ php testtest.php
```

あとはチュートリアルページを進めてください
