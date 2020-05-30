<input type="hidden" class="form-control" id="id" value="{{ $row ? $row->id : '' }}" placeholder="Enter id">
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" value="{{ $row ? $row->name : '' }}" placeholder="Enter name">
</div>
<div class="form-group">
    <label for="description">description</label>
    <input type="text" class="form-control" id="description" value="{{ $row ? $row->description : '' }}" placeholder="Enter description">
</div>
