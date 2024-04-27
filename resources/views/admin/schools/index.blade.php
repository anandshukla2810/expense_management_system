@extends('admin.layout')
@section('title')
    Manage Schools
@endSection
@section('content')

<style>
    .table{
        width:100%
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Manage Schools</h3>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Logo</th>
                                <th>Plan Type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach($data as $value)
                                <tr>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>{{ $value->phone }}</td>
                                    <td>
                                        @if($value->logo)
                                            <img src="{{asset('images')}}/{{$value->logo}}" alt="" style="height:75px; width:75px">
                                        @endif
                                    </td>
                                    <td>{{ $value->plan_type->name }}</td>
                                    <td>
                                        @if($value->status == 0)
                                            <p class="badge badge-dark">Inactive</p>
                                            @else
                                            <p class="badge badge-info">Active</p> 
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="btn btn-outline-dark btn-sm me-1" href="{{ url('admin/schools/edit') }}/{{ $value->id }}">
                                                <i class="far fa-edit"></i>
                                            </a>

                                            <button class="btn btn-outline-dark btn-sm delete-button" id="{{ $value->id }}"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $data->links() }}
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
                    window.location.href = "{{url('admin/schools/delete')}}/" + id; 
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
