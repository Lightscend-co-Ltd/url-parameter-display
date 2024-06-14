# URLパラメータ　プラグイン
URLパラメータを取得してショートコードで表示するプラグイン
## インストール方法
Wordpressのプラグインディレクトリへこのパッケージをアップロードしてください。<br />
ZIP圧縮ファイルとして、プラグインインストールを利用してもよいです。
```
url-parameter-display.zip
```
## 動作環境
PHP 7.1～

このメソッドはPHPからWordpressライブラリを利用してURLパラメータで設定されたクエリを利用し、<br>
ページ内容を変化させるメソッドです。
## 使い方
最初にパラメーターフィールド名を指定してください。<br>
```php
private $parameter = 'city';
```
パラメーターを出力するショートコード名を指定
```php
private $shortcode_name = 'display_city';
```
### タイムアウトについて
通信をする実行環境の通信速度によってはHTTP通信時にタイムアウトが発生する可能性があります。<br />
何度も同じような現象が起こる際は、サーバーの接続の調整もしくは`HTTPクライアントの明示的な指定`からHTTPクライアントの指定及びタイムアウトの時間を増やして、再度実行してください。

### 使用サイト
SEOオプティマイザーツールズ [theipv6portal.org](https://theipv6portal.org)
