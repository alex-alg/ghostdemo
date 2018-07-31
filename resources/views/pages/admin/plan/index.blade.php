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
                            <h5>@lang('plan.index_title')</h5>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.plan.create') }}" class="btn btn-primary float-right">
                                @lang('plan.create_title')
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>#</td>
                            <td>Name</td>
                            <td>Os</td>
                            <td>Features</td>
                            <td>Actions</td>
                        </tr>
                        @foreach($plans as $plan)
                        <tr>
                            <td>{{ $plan['id'] }}</td>
                            <td>{{ $plan['name'] }}</td>
                            <td>{{ $plan['os'] }}</td>
                            <td>
                                @foreach($plan['features'] as $feature)
                                    <p>{{ $feature->name }}</p>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('admin.plan.edit', $plan['id']) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('admin.plan.destroy', $plan['id']) }}" class="btn btn-danger">Delete</a>
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
