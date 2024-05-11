@extends('admin.layout')
@section('title')
  Edit User
@endSection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Edit User</h3>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content pt-4">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card">
              <div class="card-header">
                <h4>Edit User</h4>
              </div>
              <!-- form start -->
              <form id="quickForm" method="POST" action="{{ route( 'user.edit', $data->id ) }}" enctype="multipart/form-data">
              

                <?php
                  $name = $data->name; 

                  // Split the full name into first name and last name
                  list($fname, $lname) = explode(' ', $name, 2);
                ?>
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="name">First Name </label>
                        <input name="id" id="id" value="{{$data->id}}" type="hidden">
                        <input type="text" name="fname" class="form-control" id="fname" value="{{$fname}}">
                      </div>
                    </div>

                    <div class="col-6">
                      <div class="form-group">
                        <label for="name">Last Name </label>
                        <input type="text" name="lname" class="form-control" id="lname" value="{{$lname}}">
                      </div>
                    </div>

                    <div class="col-6">
                      <div class="form-group">
                        <label for="email">Email </label>
                        <input type="text" name="email" class="form-control" id="email" value="{{$data->email}}">
                      </div>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
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

  <script>

    function load_states(){
      country_id = $('#country_id').val();
      $.ajax({
        type:"GET",
        url: "{{url('api/states')}}/" + country_id, 
        success: function(result){
          $('#states').html('');
          $.each(result, function(key, value){
            $('#states').append("<option value="+ value.id +">" + value.name + "</option>");
          });
        },
      });
    }

    $('#country_id').change(function(){
			load_states();
		});


    // valiations
    $(function () {
      $('#quickForm').validate({
          rules: {
            name: {
              required: true,
            },
            abbreviation: {
              required: true,
            },
            contact_name: {
              required: true
            },
            email: {
              required: true,
              email:true,
            },
            phone: {
              required: true
            },
            plan_type_id: {
              required: true
            },
            user_id: {
              required: true
            },
            status: {
              required: true
            },
          },
          messages: {
            
          },
          errorElement: 'span',
          errorPlacement: function (error, element) {
            error.addClass('invalid-feedback fs-6');
            element.closest('.form-group').append(error);
          },
          highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
          },
          unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
          }
      });

      $.validator.setDefaults({
        submitHandler: function () {
          $('#quickForm').submit();
        }
      });
    });
  </script>

  <script>
      $(function () {
          // Summernote
          $('#description').summernote({
              height:300
          });
      })
  </script>
@endsection
