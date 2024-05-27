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
              <form id="quickForm" method="POST" action="{{ route('accountvalue.update', $accounts->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card-body">
                  <div class="row">

                    <div class="col-6">
                      <div class="form-group">
                        <label for="tag">Finsets</label>
                        <select name="finset_id" class="form-control form-select" id="finset_id">
                          <option value="">Select Finset...</option>
                          @foreach($finsets as $finset)
                          <option @if(old('finset_id') != null) @if(old('finset_id') == $finset->id) selected @endif @elseif($accounts->finset_id == $finset->id) selected @endif value="{{$finset->id}}">{{$finset->name}}</option>
                          @endforeach
                        </select>
                        @error('finset_id') <p class="text-danger">{{ $errors->first('finset_id') }}</p>@enderror
                      </div>
                    </div>

                    <div class="col-6">
                      <div class="form-group">
                        <label for="tag">Value</label>
                        <input type="text" name="current_value" class="form-control" id="current_value" placeholder="Enter the Value" value="@if(old('current_value')) {{old('current_value')}} @else {{$accounts->current_value}} @endif">
                        @error('current_value') <p class="text-danger">{{ $errors->first('current_value') }}</p>@enderror
                      </div>
                    </div>
                    
                    <div class="col-6">
                      <div class="form-group">
                        <label for="tag">Account ID </label>
                        <input type="text" name="account_id" class="form-control" id="account_id" placeholder="Enter the Account ID" value="@if(old('account_id')) {{old('account_id')}} @else {{$accounts->account_id}} @endif">
                        @error('account_id') <p class="text-danger">{{ $errors->first('account_id') }}</p>@enderror
                      </div>
                    </div>
                    
                    <div class="col-6">
                      <div class="form-group">
                        <label for="status">Status </label>
                        <select name="status" class="form-control form-select" id="status">
                            <option value="">Select a status...</option>
                            <option value="1" @if(old('status')!=null) @if(old('status') == 1) selected @endif @else @if($accounts->status == 1) selected @endif @endif >Active</option>
                            <option value="0" @if(old('status')!=null) @if(old('status') != 1) selected @endif @else @if($accounts->status != 1) selected @endif @endif>Inactive</option>
                        </select>
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
