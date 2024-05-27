
@extends('admin.layout')
@section('title')
    Upload CSV Tempates
@endSection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>CSV Templates</h3>
                </div>
            </div>
        </div>
    </section>
    
    <section class="content pt-4">
        <div class="container-fluid">
            <form action="{{ route('csv.process') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="template_id">Select Template</label>
                    <select class="form-control" id="template_id" name="template_id" required>
                        <option value="">Select required template...</option>
                        @foreach ($templates as $template)
                            <option value="{{ $template->id }}">{{ $template->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="csv_data">CSV Data</label>
                    <textarea class="form-control" id="csv_data" name="csv_data" rows="10" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Process</button>
            </form>
        </div>
    </section>
</div>
@endsection