@extends('admin.layout')
@section('title')
Manage Transaction
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
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Sub Transaction List</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Transaction ID</th>
                                        <th>Category ID</th>
                                        <th>Value</th>
                                        <!-- <th>Status</th> -->
                                        <th width="100">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    {{-- @foreach($data as $value) --}}
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div class="d-flex">
                                                    <a class="btn btn-outline-dark btn-sm me-1" href="
                                                    {{-- {{ url('admin/finset/edit') }}/{{ $value->id }} --}}
                                                    ">
                                                        <i class="far fa-edit"></i>
                                                    </a>
        
                                                    <button class="btn btn-outline-dark btn-sm delete-button" id="
                                                    {{-- {{ $value->id }} --}}
                                                    "><i class="fas fa-trash"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    {{-- @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- @if ($data->total() > 0)
                        <div class="card-footer">
                            @if ($data->total() <= 5)
                                Showing <b>{{ $data->total() }}</b> of <b>{{ $data->total() }}</b> result(s)
                            @else
                                {{ $data->links() }}
                            @endif
                        </div>
                    @endif --}}
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
                    window.location.href = "{{url('admin/finset/delete')}}/" + id; 
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
