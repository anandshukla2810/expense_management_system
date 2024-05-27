@extends('admin.layout')
@section('title')
Manage  Account Value
@endSection
@section('content')
<style> .table{ width:100% } </style>
<div class="content-wrapper">
    <section class="content pt-4">
      <div class="container-fluid">
        <div class="row">
            @if (session('error'))
              <div class="col-md-12">
                <p class="p-3 text-center bg-danger">{{ session('error') }}</p>
              </div>
            @endif
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Account Value List</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Account ID</th>
                                        <th>Value</th>
                                        <th>Date</th>
                                        <th width="125">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($accounts as $account)
                                        <tr>
                                            <td>{{ $account->id }}</td>
                                            <td>{{ $account->account_id }}</td>
                                            <td>{{ $account->current_value }}</td>
                                            <td>{{ $account->created_at }}</td>
                                            <td>
                                                <a class="btn btn-outline-dark btn-sm me-1" href="{{ url('admin/account_value/edit') }}/{{ $account->id }}"><i class="far fa-edit"></i> </a>
                                                <button class="btn btn-outline-dark btn-sm delete-button" id="{{$account->id}}"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>
  </div>
    <script>
        $('.delete-button').click(function(){
            console.log('clicked');
            id = $(this).attr('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: 'secondary',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{url('admin/account_value/delete')}}/" + id; 
                }
            })
        });
    </script>
    
    @if(Session::has('message'))
        <script>
            $(document).ready(function(){
                toastr.success("{{ Session::get('message') }}");
            })
        </script>
    @endif

    
@endsection
