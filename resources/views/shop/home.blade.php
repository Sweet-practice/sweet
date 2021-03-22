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
                      <input type="text" class="form-control offset-2 col-md-8 mb-3" placeholder="検索したい名前を入力してください" name="name">

                      <select class="form-control offset-4 col-md-4" id="value" name="value" >
                        <option selected value="ユーザー">ユーザー</option>
                        <option selected value="お菓子">お菓子</option>
                      </select>

                      <select class="form-control offset-4 col-md-4 mt-3" id="category" name="category">
                      	@foreach($categories as $category)
                      	  <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                      	@endforeach
                      </select>

                        <button type="submit" class="btn btn-primary offset-4 col-md-4 my-3">検索</button>
                    </form>
                  </div>

                  <div class="topic col-4 offset-4">
                    <div style="text-align: center">
                      本日の注文件数
                      <a href="{{ route('orders.index', 'today') }}"><?php echo count($order) ?>件</a>
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
<script>

		const p1 = document.getElementById("value");

    p1.onchange = function(){
			if(p1.value=="ユーザー"){
				// noneで非表示
				document.getElementById("category").style.display ="none";
			}else if(p1.value=="お菓子"){
				// blockで表示
				document.getElementById("category").style.display ="block"; 
	    }
    }


</script>
@endsection


