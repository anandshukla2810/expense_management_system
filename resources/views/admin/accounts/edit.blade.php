@extends('admin.layout')
@section('title')
  Edit Account
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
                 <h4 class="m-0">Edit Account</h4>
              </div>
              <!-- form start -->
              <form id="quickForm" method="POST" action="{{ route( 'accounts.update', $current_account->id ) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card-body">
                  <div class="row">
                  <div class="col-6">
                      <div class="form-group">
                        <label for="account_id">Account ID </label>
                        <input type="text" name="account_id" class="form-control" id="account_id" placeholder="Enter the account id" value="{{ $current_account->account_id  }}">
                        @error('account_id')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    
                    <div class="col-6">
                      <div class="form-group">
                        <label for="finset">Finset ID</label>
                        <select name="finset" class="form-control form-select" id="finset">
                          @foreach($finsets as $finset)
                              <option value="{{ $finset->id }}" {{ $current_account->finset_id == $finset->id ? 'selected' : '' }}>{{ $finset->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    
                    <div class="col-6">
                      <div class="form-group">
                        <label for="current_value">Current Value </label>
                        <input type="number" name="current_value" class="form-control" id="current_value" placeholder="Enter the current value" value="{{ $current_account->current_value  }}">
                        @error('current_value')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    
                    <!-- <div class="col-6">
                      <div class="form-group">
                        <label for="status">Status </label>
                        <select name="status" class="form-control form-select" id="status">
                          <option value="1" {{ $current_account->status == 1 ? 'selected' : '' }}>Active</option>
                          <option value="0" {{ $current_account->status != 1 ? 'selected' : '' }}>Inactive</option>
                        </select>
                      </div>
                    </div> -->

                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update Account</button>
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
