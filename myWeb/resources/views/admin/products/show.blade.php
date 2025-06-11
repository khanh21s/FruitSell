@extends('layouts.admin')

@section('content')
    <h1>{{ $product->name }}</h1>

    <p><strong>Danh mục:</strong> {{ $product->category->name }}</p>
    <p><strong>Giá:</strong> {{ number_format($product->price) }} VND</p>
    <p><strong>Mô tả:</strong> {{ $product->description }}</p>

    @if ($product->image)
        <img src="{{ Storage::url($product->image) }}" alt="Product Image" width="300">
    @endif
@endsection
