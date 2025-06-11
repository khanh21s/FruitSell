@extends('layouts.admin')

@section('content')
    <h1>Sửa sản phẩm</h1>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Tên sản phẩm</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $product->name) }}" required>
        </div>

        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" name="slug" id="slug" value="{{ old('slug', $product->slug) }}" required>
        </div>

        <div class="form-group">
            <label for="category_id">Danh mục</label>
            <select name="category_id" id="category_id" class="form-control" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="price">Giá</label>
            <input type="number" class="form-control" name="price" id="price" value="{{ old('price', $product->price) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea class="form-control" name="description" id="description">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="image">Ảnh sản phẩm</label>
            <input type="file" class="form-control" name="image" id="image">
            @if ($product->image)
                <img src="{{ Storage::url($product->image) }}" alt="Product Image" width="100">
            @endif
        </div>

        <button type="submit" class="btn btn-warning">Cập nhật sản phẩm</button>
    </form>
@endsection
