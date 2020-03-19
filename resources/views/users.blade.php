@extends('layouts.app') @section('page_title', 'People') @section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">


            <div class="modal fade" id="myModal">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title">Default Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form role="form" id="form">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="id" value="" placeholder="Enter id">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" value="name" placeholder="Enter name">
                                <!-- <div class="invalid-feedback">
          Please choose a username.
        </div> -->
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" value="email" placeholder="Enter email">
                                <!-- <div class="invalid-feedback">
          Please choose a username.
        </div> -->
                                <label for="password">Password</label>
                                <input type="text" class="form-control" id="password" value="password" placeholder="Enter password">
                                <!-- <div class="invalid-feedback">
          Please choose a username.
        </div> -->
                                <label for="api_token">api_token</label>
                                <input type="text" class="form-control" id="api_token" value="api_token" placeholder="Enter api_token">
                                <!-- <div class="invalid-feedback">
          Please choose a username.
        </div> -->
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" value="phone" placeholder="Enter phone">
                                <!-- <div class="invalid-feedback">
          Please choose a username.
        </div> -->
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" value="address" placeholder="Enter address">
                                <!-- <div class="invalid-feedback">
          Please choose a username.
        </div> -->
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="SubmitButton">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>


            

            

            <div class="card">
                <div class="card-header">
                    <!-- <h3 class="card-title"><button data-toggle="modal" data-target="#modal-default" onclick="GetForm('','add','users')" type="button" class="btn btn-success btn-lg">Add <i class="fa fa-plus"></i></button></h3> -->
                    <h3 class="card-title"><button  onclick="GetForm('','add','users')" type="button" class="btn btn-success btn-lg">Add <i class="fa fa-plus"></i></button></h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">                        
                        <table id="tbl" class="table table-bordered table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th>ID#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>					
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!--/. container-fluid -->
    @endsection
</div>
