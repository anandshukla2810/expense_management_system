@extends('admin.layout')
@section('title')
    Manage Accounts
@endSection
@section('content')

<style>
    .table{
        width:100%
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content pt-4">    
    <!-- Message -->
    @include( 'admin.partials.response' )
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Accounts List</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Account ID</th>
                                        <th>Finset ID</th>
                                        <th>Current Value</th>
                                        <!-- <th>Status</th> -->
                                        <th width="100">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach($accounts as $value)
                                        <tr>
                                            <td>{{ $value->account_id }}</td>
                                            <td>{{ $value->finset ? $value->finset->name : 'No Finset Associated' }}</td>
                                            <td>{{ $value->current_value }}</td>
                                            <!-- <td width=200>
                                                @if($value->status == 0)
                                                    <p class="badge badge-danger">Inactive</p>
                                                @else
                                                    <p class="badge badge-success">Active</p> 
                                                @endif
                                            </td> -->
                                            <td width=200>
                                                <div class="d-flex">
                                                    <a class="btn btn-outline-dark btn-sm me-1" href="{{ route( 'accounts.edit', $value->id ) }}">
                                                        <i class="far fa-edit"></i>
                                                    </a>
        
                                                    <button class="btn btn-outline-dark btn-sm delete-button" id="{{ $value->id }}"><i class="fas fa-trash"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if ($accounts->total() > 0)
                        <div class="card-footer">
                            @if ($accounts->total() <= 5)
                                Showing <b>{{ $accounts->total() }}</b> of <b>{{ $accounts->total() }}</b> result(s)
                            @else
                                {{ $accounts->links() }}
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    <script>
        $('.delete-button').click(function(){
            var id = $(this).attr('id');
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
                    var deleteUrl = "{{ url('admin/accounts/delete') }}/" + id;
                    console.log(deleteUrl)
                    window.location.href = deleteUrl;  
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
