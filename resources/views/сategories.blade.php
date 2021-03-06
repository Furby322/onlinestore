@extends('layouts.master')

@section('title', 'Все категории')

@section('content')
        @foreach($сategories as $category)
            <div class="panel">
                <a href="{{ route('category', $category->code) }}">
                    <img src="{{ Storage::url($category->image) }}" width="300" height="300">
                    <h2>{{ $category->name }}</h2>
                </a>
                <p>
                    {{ $category->description }}
                </p>
            </div>
        @endforeach
@endsection
