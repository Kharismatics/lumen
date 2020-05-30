<input type="hidden" class="form-control" id="id" value="{{ $row ? $row->id : '' }}" placeholder="Enter id">
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" value="{{ $row ? $row->id : '' }}" placeholder="Enter name">
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" id="email" value="email" placeholder="Enter email">
</div>
<div class="form-group">
    <label for="password">password</label>
    <input type="password" class="form-control" id="password" value="{{ $row ? $row->id : '' }}" placeholder="Enter password">
</div>
<div class="form-group">
    <label for="phone">phone</label>
    <input type="text" class="form-control" id="phone" value="{{ $row ? $row->id : '' }}" placeholder="Enter phone">
</div>
<div class="form-group">
    <label for="address">address</label>
    <input type="text" class="form-control" id="address" value="{{ $row ? $row->id : '' }}" placeholder="Enter address">
</div>