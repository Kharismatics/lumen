<input type="hidden" class="form-control" id="id" value="{{ $row ? $row->id : '' }}" placeholder="Enter id">
<div class="form-group">
    <label for="unique_code">unique_code</label>
    <input type="text" class="form-control" id="unique_code" value="{{ $row ? $row->unique_code : '' }}" placeholder="Enter unique_code">
</div>
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" value="{{ $row ? $row->name : '' }}" placeholder="Enter name">
</div>
<div class="form-group">
    <label for="base_price">base_price</label>
    <input type="number" class="form-control" id="base_price" value="{{ $row ? $row->base_price : '' }}" placeholder="Enter base_price">
</div>
<div class="form-group">
    <label for="price">price</label>
    <input type="number" class="form-control" id="price" value="{{ $row ? $row->price : '' }}" placeholder="Enter price">
</div>
<div class="form-group">
    <label for="description">description</label>
    <input type="text" class="form-control" id="description" value="{{ $row ? $row->description : '' }}" placeholder="Enter description">
</div>
<div class="form-group">
    <label for="category_id">Select</label>
    <select class="form-control" id="category_id">
        @foreach($categories as $category)
        <option value="{{$category->id}}" {{ $row && ($row->category_id == $category->id) ? 'selected':'' }}> {{ $category->name }}</option>
        @endforeach
    </select>
</div>