@extends('layouts.app')

@section('content')
<div class="container">
	@include('partials.admin.menu')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>@lang('feature.index_title')</h5>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.feature.create') }}" class="btn btn-primary float-right">
                                @lang('feature.create_title')
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>#</td>
                            <td>Name</td>
                            <td>Price</td>
                            <td>Actions</td>
                        </tr>
                        @foreach($features as $feature)
                        <tr>
                            <td>{{ $feature->id }}</td>
                            <td>{{ $feature->name }}</td>
                            <td>{{ $feature->price }}</td>
                            <td>
                                <a href="{{ route('admin.feature.edit', $feature->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('admin.feature.destroy', $feature->id) }}" class="btn btn-danger">Delete</a>
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
