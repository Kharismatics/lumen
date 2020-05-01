@extends('layouts.app') @section('page_title', 'Category') @section('content')
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
                    <h3 class="card-title"><button  onclick="GetForm('','add','users')" type="button" class="btn btn-success btn-lg">Add <i class="fa fa-plus"></i></button></h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">                        
                        <table id="tbl" class="table table-bordered table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th>ID#</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID#</th>
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
