@extends('admin.layout')
@section('title')
    Create CSV Tempates
@endSection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3>Create CSV Tempates</h3>
                    </div>
                </div>
            </div>
        </section>

        <section class="content pt-4">
            <div class="container-fluid">
                <form action="{{ route('templates.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Template Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="columns">Columns</label>
                        <input type="text" class="form-control" id="columns" name="columns[]" required>
                        <!-- You can use JavaScript to add more columns -->
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </section>
    </div>
@endsection
