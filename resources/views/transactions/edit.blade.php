<input type="hidden" class="form-control" id="id" value="{{ $row ? $row->id : '' }}" placeholder="Enter id">

<div class="form-group">
    <label for="user_id">Select Costumer</label>
    <select class="form-control" id="user_id">
        @foreach($users as $user)
        <option value="{{$user->id}}" {{ $row && ($row->user_id == $user->id) ? 'selected':'' }}> {{ $user->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="product_id">Select </label>
    <select class="form-control" id="product_id">
        @foreach($products as $product)
        <option value="{{$product->id}}" {{ $row && ($row->product_id == $product->id) ? 'selected':'' }}> {{ $product->name }}</option>
        @endforeach
    </select>
</div>