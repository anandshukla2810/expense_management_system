@extends('admin.layout')
@section('title')
  Add New Transaction
@endSection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content pt-4">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card">
              <div class="card-header">
                <h4>Add New Sub-Transaction</h4>
              </div>
              <!-- form start -->
              <form id="quickForm" method="POST" action="{{ url('admin/finset/store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="name"> ID </label>
                        <input type="number" name="id" class="form-control" id="id" placeholder="Enter the ID">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="tag">Transaction ID </label>
                        <input type="text" name="tag" class="form-control" id="tag" placeholder="Enter the Transaction ID">
                        {{-- <select name="status" class="form-control form-select" id="status">
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                        </select> --}}
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="tag">Category ID </label>
                        <input type="text" name="category" class="form-control" id="category" placeholder="Enter the Category ID">
                        {{-- <select name="status" class="form-control form-select" id="status">
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                        </select> --}}
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="tag">Value</label>
                        <input type="number" name="value" class="form-control" id="value" placeholder="Enter the value">
                        {{-- <select name="status" class="form-control form-select" id="status">
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                        </select> --}}
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
@endsection
