@extends('admin.layout')
@section('title')
  Edit Sub-Transaction Tag
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
                <h4>Edit Finset</h4>
              </div>
              <!-- form start -->
              <form id="quickForm" method="POST" action="{{ url('admin/finset/update') }}" enctype="multipart/form-data">
                @csrf

               
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="name"> Name </label>
                        <input name="id" id="id" value="{{$data->id}}" type="hidden">
                        <input type="text" name="name" class="form-control" id="name" value="{{$data->name}}"  placeholder="Enter the name">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="status">Status </label>
                        <select name="status" class="form-control form-select" id="status">
                          @if($data->status == 1)
                            <option value="1" selected>Active</option>
                            <option value="0">Inactive</option>
                            @else
                            <option value="1">Active</option>
                            <option value="0" selected>Inactive</option>
                          @endif
                        </select>
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
