@extends('admin.layout')
@section('title')
  Edit Association Group
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
                <h4>Edit Association Group ({{ $current_group->name }})</h4>
              </div>
              <!-- form start -->
              <form id="quickForm" method="POST" action="{{ route( 'association_groups.update', $current_group->id ) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="name"> Name </label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $current_group->name }}">
                        @error('name')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    
                    <div class="col-6">
                      <div class="form-group">
                        <label for="finset">Finset </label>
                        <select name="finset" class="form-control form-select" id="finset">
                          @foreach($finsets as $finset)
                              <option value="{{ $finset->id }}" {{ $current_group->finset_id == (int) $finset->id ? 'selected' : '' }} >{{ $finset->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    
                    <div class="col-6">
                      <div class="form-group">
                        <label for="status">Status </label>
                        <select name="status" class="form-control form-select" id="status">
                          <option value="1"  {{ $current_group->status == 1 ? 'selected' : '' }}>Active</option>
                          <option value="0"  {{ $current_group->status == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update Association Group</button>
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
