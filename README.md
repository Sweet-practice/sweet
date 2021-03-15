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
    一般的にECサイトを意識して作成をしました。
    また、それぞれが実装してみたい機能やAPIを組み込んだりもしています。
   
##  テーブル設計
<img width="813" alt="スクリーンショット 2021-03-16 0 27 45" src="https://user-images.githubusercontent.com/59087539/111178550-a14fbc00-85ee-11eb-8217-7fed807bf830.png">
   
## sweetの機能
###   １、条件検索機能
    お菓子かユーザーで検索することが出来ます。
    また、お菓子の場合はカテゴリーも交えて検索できるよう実装しています。
    
###   ２、チャット機能（問い合わせ機能）
    ユーザーがお店に対して問い合わせをしたい場合は、チャットを用いて対応します。
    pusherを用いてリアルタイム通信を実装しています。
    
###   ３、注文
    userが買いたい商品を購入するまでの一連の流れができるようになっています。（ECサイトなので当然ですが...。）
    カートに入れる→確認画面→購入確定という流れになっています。
    
###   ４、GoogleMapAPI
    お店の場所をGoogleMapAPIを用いて表示できるようにしました。
    今回は架空のお店なので住所は皇居に設定しています。
    
###   ５、お気に入り機能
    userがお菓子をお気に入り登録できるようにしました。
    お気に入りは、非同期通信で出来るようにしています。
    
###   ６、S3を使用した画像保存・表示
    shop側がsweetの画像を多く保存できるようS3へ保存されるように実装しました。
    
##   さいごに
    ここまでご覧いただきありがとうございます。
    初めてのLaravelの開発で至らない点ばかりだとは思いますが、
    今回のこのプロジェクトでさらに成長でき、尚且つ楽しんで開発をすることが出来ました。
    この経験をしっかりと活かしてプログラマーとして社会に出て活躍していければいいなと思っています。
    また、繰り返しにはなりますが、ここまでご覧いただきありがとうございました。
    
