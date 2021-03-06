#  アプリ名　sweet

## バージョン
    PHP 7.4.11
    Laravel 6.20.16
    vagrant(Homestead)を用いて開発環境を揃えています。
  
## メンバー
    ２人
  
## なぜこのアプリを作ったか
    Laravelの勉強として上流過程の事から実装段階までを全て行う事で自分自身のスキルアップを計りたかったから。
    また、実務に入ったときのことを想定しチームで開発を行いました。
    一般的なECサイトを意識して作成をしました。
    また、それぞれが実装してみたい機能やAPIを組み込んだりもしています。
   
##  テーブル設計
<img width="945" alt="スクリーンショット 2021-03-29 9 05 47" src="https://user-images.githubusercontent.com/59087539/112773026-34690700-906f-11eb-9568-b0d5ab04381c.png">
   
## sweetの機能
###   １、条件検索機能
    お菓子かユーザーで検索することが出来ます。
    また、お菓子の場合はカテゴリーも交えて検索できるよう実装しています。
    
###   ２、チャット機能（問い合わせ機能）
    ユーザーがお店に対して問い合わせをしたい場合は、チャットを用いて対応します。
    pusherを用いてリアルタイム通信を実装しています。
    また、チャットではお馴染みの既読・未読が分かる機能も実装しております。
    
###   ３、注文
    userが買いたい商品を購入するまでの一連の流れができるようになっています。（ECサイトなので当然ですが...。）
    カートに入れる→確認画面→購入確定という流れになっています。
    
###   ４、GoogleMapAPI
    お店の場所をGoogleMapAPIを用いて表示できるようにしました。
    今回は架空のお店なので住所は皇居に設定しています。
    
###   ５、お気に入り機能
    userがお菓子をお気に入り登録できるようにしました。
    お気に入りは、非同期通信で出来るようにしています。

###   ６、レビュー機能
    userからsweetに対してレビューを残しておけるようにしました。
    また、sweetに対して５段階評価を付けて平均値を出すことで星評価で表示されるように実装しました。

###   ７、S3を使用した画像保存・表示（動画保存：実験として）
    shop側がsweetの画像を多く保存できるようS3へ保存されるように実装しました。
    
###   ８、ポイント機能
    userが商品を買った際に次回以降から使えるポイント機能を実装しました。
    いろいろなケースを考えましたが、今回はsweetに対して何％ポイントかのポイントを持たせるという仕様にしました。

###   ９、クーポン機能
    shopがクーポンを発行して、userが使いたいクーポンを取得することができるという機能を実装しました。
    今回は2パターンのクーポンがあり、〜％引きと〜円引きのパターンを実装しています。
    また、userは１回取得したクーポンについては２回取得出来ない仕様にしています。
    
###   １０、通知機能
    shopが新しいsweet、クーポン、メッセージをcreateした際にuserに対して通知を出せるように実装しました。
    
##   さいごに
    ここまでご覧いただきありがとうございます。
    初めてのLaravelの開発で至らない点ばかりだとは思いますが、
    今回のこのプロジェクトでさらに成長でき、尚且つ楽しんで開発をすることが出来ました。
    この経験をしっかりと活かしてプログラマーとして社会に出て活躍していければいいなと思っています。
    また、繰り返しにはなりますが、ここまでご覧いただきありがとうございました。
    
