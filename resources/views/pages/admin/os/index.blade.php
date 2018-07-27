@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status-success'))
        <div class="alert alert-success">
            {{ session('status-success') }}
        </div>
    @endif

     @if (session('status-error'))
        <div class="alert alert-danger">
            {{ session('status-error') }}
        </div>
    @endif

	@include('partials.admin.menu')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>@lang('os.index_title')</h5>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.os.create') }}" class="btn btn-primary float-right">
                                @lang('os.create_title')
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>#</td>
                            <td>Name</td>
                            <td>Actions</td>
                        </tr>
                        @foreach($operating_systems as $os)
                        <tr>
                            <td>{{ $os->id }}</td>
                            <td>{{ $os->name }}</td>
                            <td>
                                <a href="{{ route('admin.os.edit', $os->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('admin.os.destroy', $os->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
