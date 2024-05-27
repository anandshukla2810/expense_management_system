@extends('admin.layout')
@section('title')
    Processed CSV Data
@endSection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3>Processed CSV Data</h3>
                    </div>
                </div>
            </div>
        </section>

        <section class="content pt-4">
            <div class="container-fluid">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            @foreach ($columns as $column)
                                <th>{{ $column }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($parsedData as $row)
                            <tr>
                                @foreach ($columns as $column)
                                    <td>{{ $row[$column] }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
@endsection
