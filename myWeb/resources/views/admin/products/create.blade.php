@extends('layouts.admin')
@section('title','Tạo sản phẩm mới')
@section('content')
<h1 class="text-2xl mb-4">Tạo mới sản phẩm</h1>
@if($errors->any())<div class="bg-red-100 p-3 mb-4">{{ implode(', ', $errors->all()) }}</div>@endif
<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
  @include('admin.products.form')
  <button class="bg-green-600 text-white px-4 py-2 rounded">Lưu</button>
</form>
@endsection
