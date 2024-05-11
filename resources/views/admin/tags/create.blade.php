@extends('admin.layout')
@section('title')
  Add New Tag
@endSection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    
    <!-- Main content -->
    <section class="content pt-4">
      <!-- Message -->
      @include( 'admin.partials.response' )
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card">
              <div class="card-header">
                <h4>Add New Tag</h4>
              </div>
              <!-- form start -->
              <form id="quickForm" method="POST" action="{{ route( 'tags.store' ) }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="name">Tag Name </label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter tag name">
                        @error('name')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    
                    <div class="col-6">
                      <div class="form-group">
                        <label for="finset">Finset ID</label>
                        <select name="finset" class="form-control form-select" id="finset">
                          @foreach($finsets as $finset)
                              <option value="{{ $finset->id }}">{{ $finset->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <!-- <div class="col-6">
                      <div class="form-group">
                        <label for="status">Status </label>
                        <select name="status" class="form-control form-select" id="status">
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                        </select>
                      </div>
                    </div> -->

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
