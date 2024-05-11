@extends('admin.layout')
@section('title')
    Manage Budget Categories
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
                        <h4> Budget Categories List</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th width="300">Name</th>
                                        <th width="300">Parent</th>
                                        <th width="300">Finset Associated</th>
                                        <!-- <th width="150">Status</th> -->
                                        <th width="100">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($budget_categories as $value)
                                        <tr>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->parent ? $value->parent->name : 'No Parent' }}</td>
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
                                                    <a class="btn btn-outline-dark btn-sm me-1" href="{{ route( 'budget_categories.edit', $value->id ) }}">
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
                    @if ($budget_categories->total() > 0)
                        <div class="card-footer">
                            @if ($budget_categories->total() <= 5)
                                Showing <b>{{ $budget_categories->total() }}</b> of <b>{{ $budget_categories->total() }}</b> result(s)
                            @else
                                {{ $budget_categories->links() }}
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
                    var deleteUrl = "{{ url('admin/budget_categories/delete') }}/" + id;
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
