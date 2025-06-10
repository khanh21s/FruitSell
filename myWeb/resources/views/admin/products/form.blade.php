@csrf
<div class="mb-4">
  <label class="block">Tên sản phẩm</label>
  <input type="text" name="name" value="{{ old('name', $product->name ?? '') }}" class="w-full border p-2">
</div>
<div class="mb-4">
  <label class="block">Slug</label>
  <input type="text" name="slug" value="{{ old('slug', $product->slug ?? '') }}" class="w-full border p-2">
</div>
<div class="mb-4">
  <label class="block">Danh mục</label>
  <select name="category_id" class="w-full border p-2">
    @foreach($categories as $c)
      <option value="{{ $c->id }}" {{ (old('category_id', $product->category_id ?? '') == $c->id) ? 'selected' : '' }}>
        {{ $c->name }}
      </option>
    @endforeach
  </select>
</div>
<div class="mb-4">
  <label class="block">Giá</label>
  <input type="number" name="price" value="{{ old('price', $product->price ?? '') }}" class="w-full border p-2">
</div>
<div class="mb-4">
  <label class="block">Stock</label>
  <input type="number" name="stock" value="{{ old('stock', $product->stock ?? '') }}" class="w-full border p-2">
</div>
<div class="mb-4">
  <label class="block">Ảnh sản phẩm</label>
  <input type="file" name="image" class="w-full">
  @if(isset($product) && $product->image_path)
    <img src="{{ asset('storage/products/'.$product->image_path) }}" class="w-32 mt-2">
  @endif
</div>
<div class="mb-4">
  <label class="block">Mô tả</label>
  <textarea name="description" class="w-full border p-2">{{ old('description', $product->description ?? '') }}</textarea>
</div>
