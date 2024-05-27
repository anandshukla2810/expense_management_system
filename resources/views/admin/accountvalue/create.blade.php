@extends('admin.layout')
@section('title')
  Add New Account Value
@endSection
@section('content')
<div class="content-wrapper">
    <section class="content pt-4">
      <div class="container-fluid">
        <div class="row">
          @if (session('success'))
              <div class="col-md-12">
                <p class="p-3 text-center bg-success">{{ session('success') }}</p>
              </div>
            @endif
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4>Add New Account Value</h4>
              </div>
              <form id="quickForm" method="POST" action="{{ url('admin/account_value/store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">

                    <div class="col-6">
                      <div class="form-group">
                        <label for="tag">Finsets</label>
                        <select name="finset_id" class="form-control form-select" id="finset_id">
                          <option value="">Select Finset...</option>
                          @foreach($finsets as $finset)
                          <option @if(old('finset_id') != null) @if(old('finset_id') == $finset->id) selected @endif @endif value="{{$finset->id}}">{{$finset->name}}</option>
                          @endforeach
                        </select>
                        @error('finset_id') <p class="text-danger">{{ $errors->first('finset_id') }}</p>@enderror
                      </div>
                    </div>

                    <div class="col-6">
                      <div class="form-group">
                        <label for="tag">Value</label>
                        <input type="text" name="current_value" class="form-control" id="current_value" placeholder="Enter the Value" value="{{old('current_value')}}">
                        @error('current_value') <p class="text-danger">{{ $errors->first('current_value') }}</p>@enderror
                      </div>
                    </div>
                    
                    <div class="col-6">
                      <div class="form-group">
                        <label for="tag">Account ID </label>
                        <input type="text" name="account_id" class="form-control" id="account_id" placeholder="Enter the Account ID" value="{{old('account_id')}}">
                        @error('account_id') <p class="text-danger">{{ $errors->first('account_id') }}</p>@enderror
                      </div>
                    </div>
                    
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
          </div>
          
        </div>
      </div>
    </section>
  </div>  
@endsection
