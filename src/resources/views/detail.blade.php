@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
<div class="product-detail">
    <div class="product-detail__heading">
        <a class="product-detail__heading__inner" href="http://localhost/products">商品一覧</a>
        <a>＞{{ $product->name }}</a>
    </div>
    
    <div class="product-detail__container">
        <form action="{{ route('products.update', $product->id) }}" method="POST" class="product-detail__form" enctype="multipart/form-data">
        @csrf
            <div class="product-detail__image">
                <img class="product-detail__image__inner" src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                <input type="file" id="image" name="image" class="product-detail__image__inner-input">
            </div>

            <div class="product-detail__info">
                <div class="product-detail__name">
                    <label class="product-detail__name__innner">
                        <p>商品名</p>
                    </label>
                    <input type="text" id="name" name="name" class="product-detail__name__inner-input" value="{{ $product->name }}">
                    <p class="detail-form__error-message">
                @error('name')
                    {{ $message }}
                @enderror
            </p>
                </div>
                
                <div class="product-detail__price">
                    <label class="product-detail__price__inner">
                        <p>値段</p>
                    </label>
                    <input type="text" id="price" name="price" class="product-detail__price__inner-input" value="{{ $product->price }}">
                    <p class="detail-form__error-message">
                @error('price')
                    {{ $message }}
                @enderror
                </div>
                
                <div class="product-detail__seasons">
                    <label class="product-detail__seasons__inner">
                        <p>季節</p>
                    </label>
                    <p class="detail-form__error-message">
                @error('seson_id')
                    {{ $message }}
                @enderror
                </div>
            </div>

            <div class="product-detail__info__description">
                <div class="product-detail__description">
                    <label class="product-detail__description__inner">
                        <p>商品説明</p>
                    </label>
                    <textarea class= "product-detail__description__inner-textarea" name="description" id="" cols="30" rows="4" value="">{{ $product->description }}</textarea>
                    <p class="detail-form__error-message">
                @error('description')
                    {{ $message }}
                @enderror
            </p>
                </div>

                <div class=product-detail__form__button>
                    <a class="product-back__button" href="http://localhost/products">戻る</a>
                    <button type="submit" class="product-update__button">変更を保存</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection