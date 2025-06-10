@extends('layouts.admin')
@section('title','Chỉnh sửa sản phẩm')
@section('content')
<h1 class="text-2xl mb-4">Chỉnh sửa sản phẩm</h1>
@if($errors->any())<div class="bg-red-100 p-3 mb-4">{{ implode(', ', $errors->all()) }}</div>@endif
<form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
  @method('PUT')
  @include('admin.products.form')
  <button class="bg-blue-600 text-white px-4 py-2 rounded">Cập nhật</button>
</form>
@endsection
