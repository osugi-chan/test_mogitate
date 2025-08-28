@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endsection

@section('content')
 <div class="products">
    <div class="content__heading-wrapper">
    <h2 class="all-products__heading content__heading ">商品一覧</h2>
    <div class=products__items__add button>
        <a href="http://localhost/products/register">+ 商品を追加</a>
    </div>
    </div>

    <div class="products__items">
        <aside class="sidebar">
            <div class="search-form">
                <form action="{{ route('products.search') }}" method="get">
                    @csrf
                    <input type="text" id="search" name="search" placeholder="商品名で検索" class="search-form__input">
                    <button type="submit" class="search-form__button">検索</button>
                </form>
            </div>
            
            <div class="products__itemes__sort">
                <h3 class="products__itemes__sort__heading">価格順で表示</h3>
                <form action="" method="">
                    @csrf
                    <select name="sort" id="sort" class="products__itemes__sort-select">
                        <option value="" disabled selected>価格で並べ替え</option>
                        <option value="price-asc">価格の安い順</option>
                        <option value="price-desc">価格の高い順</option>
                        <option value="name-asc">商品名昇順</option>
                        <option value="name-desc">商品名降順</option>
                    </select>
                    <button type="submit" class="products__itemes__sort-button">並べ替え</button>
                </form>
            </div>
        </aside>

        <div class="products__items__container">
            @if(request('search'))
            <p class="search-result-message">「{{ request('search') }}」の検索結果</p>
            @endif

            @if($products->isNotEmpty())
            @foreach ($products as $product)
            <div class="products__item">
                <a href="{{ route('products.show', $product->id) }}" class="products__item__link" aria-label="{{ $product->name }}の詳細へ">
                <img class="products__item__image"src="{{ asset($product->image) }}"alt="{{ $product->name }}">
                </a>
                <div class="products__item__info">
                <h3 class="products__item__name">{{ $product->name }}</h3>
                <h3 class="products__item__price">¥{{ $product->price }}</h3>
                </div>
            </div>
        @endforeach
    @else
        <p class="no-results">該当する商品は見つかりませんでした。</p>
    @endif
        </div>

    </div>
 </div>
@endsection
