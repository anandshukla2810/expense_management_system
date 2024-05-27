@extends('admin.layout')
@section('title')
  Add New Transaction
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
                <h4>Add New Transaction</h4>
              </div>
              <!-- form start -->
              <form id="quickForm" method="POST" action="{{ route( 'transaction.store' ) }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">
                    {{-- <div class="col-6">
                      <div class="form-group">
                        <label for="value"> ID </label>
                        <input type="number" name="id" class="form-control" id="id">
                        @error('value')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                      </div>
                    </div> --}}
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
                        <label for="category">Category ID</label>
                        {{-- @foreach(App\Models\Ourstory::get() as $date) --}}
                        {{-- <input type="text" name="category" class="form-control" id="category"> --}}
                        <select name="category" class="form-control form-select" id="category">
                            @foreach($budget_categories as $budget_category)
                                <option value="{{ $budget_category->id }}">{{ $budget_category->name }}</option>
                            @endforeach
                        </select>

                      </div>
                    </div>

                    <div class="col-6">
                      <div class="form-group">
                        <label for="vendor">Vendor ID</label>
                        {{-- <input type="text" name="vendor" class="form-control" id="vendor"> --}}
                        <select name="vendor" class="form-control form-select" id="vendor">
                            @foreach($budget_categories as $budget_category)
                                <option value="{{ $budget_category->id }}">{{ $budget_category->name }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    
                    <div class="col-6">
                      <div class="form-group">
                        <label for="category">User ID</label>
                        {{-- <input type="text" name="user" class="form-control" id="user"> --}}
                        <select name="user" class="form-control form-select" id="user">
                            @foreach($budget_categories as $budget_category)
                                <option value="{{ $budget_category->id }}">{{ $budget_category->name }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    
                    <div class="col-6">
                      <div class="form-group">
                        <label for="value"> Value </label>
                        {{-- <input type="text" name="number" class="form-control" id="number"> --}}
                        <input type="number" name="value" class="form-control" id="value">
                        @error('value')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    
                    <div class="col-6">
                      <div class="form-group">
                        <label for="value"> Image </label>
                        <input type="file" name="image" class="form-control" id="image">
                        {{-- @error('value')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror --}}
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
