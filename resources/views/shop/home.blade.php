@extends('layouts.app_shop')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  <div class="search">
                    <form action="{{ route('shop.search')}}" method="get">
                      @csrf
                      {{method_field('get')}}
                      <input type="text" class="form-control col-md-5" placeholder="検索したい名前を入力してください" name="name">
                      <select class="form-control col-md-5" name="value">
                        <option selected value="ユーザー">ユーザー</option>
                        <option selected value="お菓子">お菓子</option>
                      </select>

                        <button type="submit" class="btn btn-primary col-md-5">検索</button>
                    </form>
                  </div>

                  <div class="topic col-4 offset-4">
                    <div style="text-align: center">
                      本日の注文件数
                      <a href="{{ route('orders.index', 'Untreated') }}"><?php echo count($order) ?>件</a>
                    </div>

                    <div style="text-align: center">
                      本日のお問い合わせ件数
                      <?php echo count($message) ?>件
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
