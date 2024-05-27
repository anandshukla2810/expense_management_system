@extends('admin.layout')
@section('title')
    Manage Association Groups
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
                        <h4>Association Groups List</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th width="300">Name</th>
                                        <th width="300">ID</th>
                                        <th width="300">Finset ID</th>
                                        <!-- <th width="150">Status</th> -->
                                        <th width="150">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($association_groups as $value)
                                        <tr>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->status }}</td>
                                            <td>{{ $value->finset ? $value->finset->name : 'No Finset Associated' }}</td>
                                            <!-- <td>
                                                @if($value->status == 0)
                                                    <p class="badge badge-danger">Inactive</p>
                                                @else
                                                    <p class="badge badge-success">Active</p> 
                                                @endif
                                            </td> -->
                                            <td>
                                                <div class="d-flex">
                                                    <a class="btn btn-outline-dark btn-sm me-1" href="{{ route( 'association_groups.edit', $value->id ) }}">
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
                    @if ($association_groups->total() > 0)
                        <div class="card-footer">
                            @if ($association_groups->total() <= 5)
                                Showing <b>{{ $association_groups->total() }}</b> of <b>{{ $association_groups->total() }}</b> result(s)
                            @else
                                {{ $association_groups->links() }}
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
                    var deleteUrl = "{{ url('admin/association_groups/delete') }}/" + id;
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
