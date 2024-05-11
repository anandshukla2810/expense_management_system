@extends('admin.layout')
@section('title')
  Add New User
@endSection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Add New User</h3>
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
              <!-- form start -->
              <div class="card-header">
                <h4>Add New User</h4>
              </div>
              <form id="quickForm" method="POST" action="{{ url('admin/users/store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="name">Firstname </label>
                        <input type="text" name="fname" class="form-control" id="fname" placeholder="Enter your Firstname">
                      </div>
                    </div>
                    
                    <div class="col-6">
                      <div class="form-group">
                        <label for="name">Lastname </label>
                        <input type="text" name="lname" class="form-control" id="lname" placeholder="Enter your Lastname">
                      </div>
                    </div>
               
                    <div class="col-6">
                      <div class="form-group">
                        <label for="email">Email </label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="Enter your Email">
                      </div>
                    </div>

                    <div class="col-6">
                      <div class="form-group">
                        <label for="email">Password </label>
                        <input type="text" name="password" class="form-control" id="password" placeholder="Enter your Password">
                      </div>
                    </div>

                  <!-- <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="status">Status </label>
                        <select name="status" class="form-control form-select" id="status">
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                        </select>
                      </div>
                    </div>
                  </div> -->
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

    $('#country_id').change(function(){
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
