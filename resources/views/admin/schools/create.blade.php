@extends('admin.layout')
@section('title')
  Add New School
@endSection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Add New School</h3>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card">
              <!-- form start -->
              <form id="quickForm" method="POST" action="{{ url('admin/schools/store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" id="name">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="abbreviation">Abbreviation <span class="text-danger">*</span></label>
                        <input type="text" name="abbreviation" class="form-control" id="abbreviation">
                      </div>
                    </div>

                    <div class="col-4">
                      <div class="form-group">
                        <label for="logo">Logo</label>
                        <input type="file" name="logo" class="form-control" id="logo">
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="name">Contact name <span class="text-danger">*</span></label>
                        <input type="text" name="contact_name" class="form-control" id="contact_name">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <input type="text" name="email" class="form-control" id="email">
                      </div>
                    </div>

                    <div class="col-4">
                      <div class="form-group">
                        <label for="phone">Phone <span class="text-danger">*</span></label>
                        <input type="text" name="phone" class="form-control" id="phone">
                      </div>
                    </div>
                   
                    <div class="col-4">
                      <div class="form-group">
                        <label for="plan_type_id">Plan Type <span class="text-danger">*</span></label>
                        <select name="plan_type_id" class="form-control form-select" id="plan_type_id">
                          <option value="">Select plan type</option>
                          @foreach($plan_types as $plan_type)
                            <option value="{{ $plan_type->id }}">{{ $plan_type->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="col-4">
                      <div class="form-group">
                        <label for="user_id">Admin <span class="text-danger">*</span></label>
                        <select name="user_id" class="form-control form-select" id="user_id">
                          <option value="">Select admin</option>
                          @foreach($admins as $admin)
                            <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="status">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-control form-select" id="status">
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-dark">Add School</button>
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
