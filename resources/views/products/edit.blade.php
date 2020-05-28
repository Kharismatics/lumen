<input type="" class="form-control" id="id" value="{{ $product ? $product->id : '' }}" placeholder="Enter id">
<div class="form-group">
    <label for="unique_code">unique_code</label>
    <input type="text" class="form-control" id="unique_code" value="{{ $product ? $product->unique_code : '' }}" placeholder="Enter unique_code">
</div>
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" value="{{ $product ? $product->name : '' }}" placeholder="Enter name">
</div>
<div class="form-group">
    <label for="base_price">base_price</label>
    <input type="number" class="form-control" id="base_price" value="{{ $product ? $product->base_price : '' }}" placeholder="Enter base_price">
</div>
<div class="form-group">
    <label for="price">price</label>
    <input type="number" class="form-control" id="price" value="{{ $product ? $product->price : '' }}" placeholder="Enter price">
</div>
<div class="form-group">
    <label for="description">description</label>
    <input type="text" class="form-control" id="description" value="{{ $product ? $product->description : '' }}" placeholder="Enter description">
</div>
<div class="form-group">
    <label for="category_id">Select</label>
    <select class="form-control" id="category_id">
        @foreach($categories as $category)
        <option value="{{$category->id}}" {{ $product && ($product->category_id == $category->id) ? 'selected':'' }}> {{ $category->name }}</option>
        @endforeach
    </select>
</div>