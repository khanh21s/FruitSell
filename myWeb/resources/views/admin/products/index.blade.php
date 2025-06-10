@extends('layouts.admin')
@section('title','Admin - Sản phẩm')
@section('content')
<div class="flex justify-between mb-4">
  <h1 class="text-2xl">Quản lý sản phẩm</h1>
  <a href="{{ route('admin.products.create') }}" class="bg-green-600 text-white px-4 py-2 rounded">Tạo mới</a>
</div>
@if(session('success'))<div class="bg-green-100 p-3 mb-4">{{ session('success') }}</div>@endif
<table class="w-full bg-white shadow rounded">
  <thead class="bg-gray-200">
    <tr>
      <th class="p-2">#</th><th class="p-2">Ảnh</th><th class="p-2">Tên</th>
      <th class="p-2">Danh mục</th><th class="p-2">Giá</th><th class="p-2">Stock</th><th class="p-2">HĐ</th>
    </tr>
  </thead>
  <tbody>
    @foreach($products as $p)
    <tr class="border-t">
      <td class="p-2">{{ $p->id }}</td>
      <td class="p-2"><img src="{{ asset('storage/products/'.$p->image_path) }}" class="w-16"></td>
      <td class="p-2">{{ $p->name }}</td>
      <td class="p-2">{{ $p->category->name }}</td>
      <td class="p-2">{{ number_format($p->price,0,',','.') }}₫</td>
      <td class="p-2">{{ $p->stock }}</td>
      <td class="p-2 space-x-2">
        <a href="{{ route('admin.products.edit',$p) }}" class="text-blue-600">Sửa</a>
        <form action="{{ route('admin.products.destroy',$p) }}" method="POST" class="inline" onsubmit="return confirm('Xóa?')">
          @csrf @method('DELETE')
          <button class="text-red-600">Xóa</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="mt-4">{{ $products->links() }}</div>
@endsection
