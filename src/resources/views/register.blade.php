@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="products-items__register">
    <h2 class="register-heading">商品登録</h2>
    <div class="register-container">
    <form action="{{ route(('products.store')) }}" method="POST" class="products-items__register-form" enctype="multipart/form-data">
        @csrf
        <div class="register-form__group__name">
            <label class="register-form__label">
                <p class="register-form__label__name">商品名</p>
                <span class="register-form__required">必須</span>
            </label>
            <input type="text" id="name" name="name" class="products-items__register-input__name" value="{{ old('name') }}" placeholder="商品名を入力">
            <p class="register-form__error-message">
                @error('name')
                    {{ $message }}
                @enderror
            </p>
        </div>
        <div class="register-form__group__price">
            <label class="register-form__label">
                <p class="register-form__label__price">値段</p>
                <span class="register-form__required">必須</span>
            </label>
            <input type="number" id="price" name="price" class="products-items__register-input__price" value="{{ old('price') }}" placeholder="値段を入力">
            <p class="register-form__error-message">
                @error('price')
                    {{ $message }}
                @enderror
            </p>
        </div>
        <div class="register-form__group__image">
            <label class="register-form__label">
                <p class="register-form__label__image">商品画像</p>
                <span class="register-form__required">必須</span>
            </label>
            <input type="file" id="image" name="image" class="products-items__register-input__image">
            <p class="register-form__error-message">
                @error('image')
                    {{ $message }}
                @enderror
            </p>
        </div>
        <div class="register-form__group__season">
            <label class="register-form__label">
                <p class="register-form__label__season">季節</p>
                <span class="register-form__required">必須</span>
            </label>
            <div class="register-form__checkbox-group">
        @foreach($seasons as $season)
            <input type="checkbox" id="season_{{ $season->id }}" name="season_id[]"value="{{ $season->id }}"class="register-form__checkbox-input">
            <label for="season_{{ $season->id }}" class="register-form__checkbox-label">
                {{ $season->name }}
            </label>
        @endforeach
        <p class="register-form__error-message">
                @error('season_id')
                    {{ $message }}
                @enderror
        </p>
        </div>
        <div class="register-form__group__description">
            <label class="register-form__label__description__wrapper">
                <p class="register-form__label__description">商品説明</p>
                <span class="register-form__required">必須</span>
                <textarea class= "register-form__textarea" name="description" id="" cols="30" rows="4" value="{{ old('description') }}" placeholder="商品の説明を入力"></textarea>
            </label>
            <p class="register-form__error-message">
                @error('description')
                    {{ $message }}
                @enderror
            </p>
        </div>
        <div class=register-form__group__button>
            <a class="register-back__button" href="http://localhost/products">戻る</a>
            <button type="submit" class="register-form__button">登録</button>
        </div>
    </form>
    </div>
</div>
@endsection