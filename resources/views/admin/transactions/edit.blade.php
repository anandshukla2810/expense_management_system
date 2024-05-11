@extends('admin.layout')
@section('title')
  Edit Transaction
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
                <h4>Edit Transaction</h4>
              </div>
              <!-- form start -->
              <form id="quickForm" method="POST" action="{{ route( 'transaction.update', $current_transaction->id ) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card-body">
                  <div class="row">

                    <div class="col-6">
                      <div class="form-group">
                        <label for="value"> Value </label>
                        <input type="number" name="value" class="form-control" id="value"  value="{{ $current_transaction->value }}">
                        @error('value')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    
                    <div class="col-6">
                      <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" class="form-control form-select" id="category">
                            @foreach($budget_categories as $budget_category)
                                <option value="{{ $budget_category->id }}" {{ $current_transaction->category->id == $budget_category->id ? 'selected' : '' }}>{{ $budget_category->name }}</option>
                            @endforeach
                        </select>

                      </div>
                    </div>
                    
                    <div class="col-6">
                      <div class="form-group">
                        <label for="status">Status </label>
                        <select name="status" class="form-control form-select" id="status">
                          <option value="1" {{ $current_transaction->status == 1 ? 'selected' : '' }}>Active</option>
                          <option value="0" {{ $current_transaction->status != 1 ? 'selected' : '' }}>Inactive</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update Transaction</button>
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
