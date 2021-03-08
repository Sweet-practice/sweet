@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3">
            <h1>{{ $sweet->name }}</h1>
        </div>

        <div class="col-md-12 mt-3 p-5">
            <div class="row">
                <img src="../image/cake1.jpeg" class="mx-auto" alt="お気に入り">
            </div>
            <table class="table mt-5 mx-auto" style="width:80%">
                <tr>
                    <td class="pl-5">商品名</td>
                    <td style="width:50%">{{ $sweet->name }}</td>
                </tr>
                <tr>
                    <td class="pl-5">カテゴリー</td>
                    <td>{{ $category->name }}</td>
                </tr>
                <tr>
                    <td class="pl-5">商品金額(税込)</td>
                    <td>{{ $sweet->price }}円</td>
                </tr>
                <tr>
                    <td class="pl-5">在庫</td>
                    <td>@if($sweet->status == 'InStock')
                        在庫あり
                        @elseif($sweet->status == 'LowInventory')
                        在庫(小)
                        @else
                        <span style="color:red">在庫なし</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="pl-5">アレルギー</td>
                    <td>@if(empty($sweet->allergy))
                        なし
                        @else
                        {{ $sweet->allergy }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="pl-5">商品説明</td>
                    <td>{{ $sweet->introduction }}</td>
                </tr>
            </table>
            <form action="{{ route('carts.create') }}" method="post" id="cart" class="mt-5 text-right">
            @csrf
                <input type="number" name="amout" value="1" min="0" style="width:60px">
                @if(Auth::user())
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                @endif
                <input type="hidden" name="sweet_id" value="{{ $sweet->id }}">
                <button type="submit" class="btn btn-primary">カートに入れる</button>
            </form>
        </div>
    </div>
</div>
@endsection
