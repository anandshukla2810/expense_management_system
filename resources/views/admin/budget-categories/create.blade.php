@extends('admin.layout')
@section('title')
  Add New Budget Category
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
                <h4>Add New Budget Category</h4>
              </div>
              <!-- form start -->
              <form id="quickForm" method="POST" action="{{ route( 'budget_categories.store' ) }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">
                    
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

                    <div class="col-6">
                      <div class="form-group">
                        <label for="parent_cat">Parent ID</label>
                        <select name="parent_cat" class="form-control form-select" id="parent_cat">
                          <option value="null" selected>No Parent</option>
                          @foreach($budget_categories as $budget_category)
                              <option value="{{ $budget_category->id }}">{{ $budget_category->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    
                    <div class="col-6">
                      <div class="form-group">
                        <label for="name">Budget Name </label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Budget Name">
                        @error('name')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>

                    <div class="col-6">
                      <div class="form-group">
                        <label for="value"> Value </label>
                        <input type="number" name="value" class="form-control" id="value" placeholder="Enter Dollar value ">
                        @error('value')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    
                    <div class="col-6">
                      <div class="form-group">
                        <label for="scope">Scope </label>
                        <select name="scope" class="form-control form-select" id="scope">
                          <option value="monthly">Monthly</option>
                          <option value="yearly">Yearly</option>
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
