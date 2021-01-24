@extends('layouts.master')

@section('title', 'Товар')

@section('content')
    <h1>{{ $product->name }}</h1>
    <h2>{{ $product->category->name }}</h2>
    <p>Цена: <b>{{ $product->price }} ₽</b></p>
    <img src="{{ Storage::url($product->image) }}">
    <p>{{ $product->description }}</p>

    @if($product->isAvailable())
        <form action="{{ route('basket-add', $product) }}" method="POST">
            <button type="submit" class="btn btn-success" role="button">Добавить в корзину</button>
            @csrf
        </form>
    @else
        <button type="button" class="btn btn-secondary" role="button" disabled>Товар закончился</button>
        <br>
        <span>Сообщить мне, когда товар появиться в наличии:</span>
        <div class="warning">
            @if($errors->get('email'))
                {!! $errors->get('email')[0] !!}
            @endif
        </div>
        <form method="POST" action="{{ route('subscription', $product) }}">
            @csrf
            <br>
            <input type="text" name="email">
            <button type="submit">Отправить</button>
        </form>
    @endif

@endsection
