@extends('admin.layout')
@section('title')
  Edit Budget Category
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
                <h4>Edit Budget Category ({{ $current_category->name }})</h4>
              </div>
              <!-- form start -->
              <form id="quickForm" method="POST" action="{{ route( 'budget_categories.update', $current_category->id ) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card-body">
                  <div class="row">
                    
                    <div class="col-6">
                      <div class="form-group">
                        <label for="finset">Finset </label>
                        <select name="finset" class="form-control form-select" id="finset">
                          @foreach($finsets as $finset)
                              <option value="{{ $finset->id }}" {{ $current_category->finset_id == (int) $finset->id ? 'selected' : '' }} >{{ $finset->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    
                    <div class="col-6">
                      <div class="form-group">
                        <label for="name">Budget Name </label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $current_category->name }}" placeholder="Enter Budget Name">
                        @error('name')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>

                    <div class="col-6">
                      <div class="form-group">
                        <label for="value"> Value </label>
                        <input type="number" name="value" class="form-control" id="value"  value="{{ $current_category->value }}" placeholder="Enter Dollar value">
                        @error('value')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    
                    <div class="col-6">
                      <div class="form-group">
                        <label for="scope">Scope </label>
                        <select name="scope" class="form-control form-select" id="scope">
                          <option value="monthly" {{ $current_category->scope == 'monthly' ? 'selected' : '' }}>Monthly</option>
                          <option value="yearly" {{ $current_category->scope == 'yearly' ? 'selected' : '' }}>Yearly</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-6">
                      <div class="form-group">
                        <label for="parent_cat">Parent Category</label>
                        <select name="parent_cat" class="form-control form-select" id="parent_cat">
                            <option value="null" selected>No Parent</option>
                            @foreach($budget_categories as $budget_category)
                                <option value="{{ $budget_category->id }}" {{ $current_category->parent_id == $budget_category->id ? 'selected' : '' }}>{{ $budget_category->name }}</option>
                            @endforeach
                        </select>

                      </div>
                    </div>
                    
                    <!-- <div class="col-6">
                      <div class="form-group">
                        <label for="status">Status </label>
                        <select name="status" class="form-control form-select" id="status">
                          <option value="1"  {{ $current_category->status == 1 ? 'selected' : '' }}>Active</option>
                          <option value="0"  {{ $current_category->status == 0 ? 'selected' : '' }}>Inactive</option>
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
