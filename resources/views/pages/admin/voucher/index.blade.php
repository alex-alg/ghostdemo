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
                            <h5>@lang('voucher.index_title')</h5>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.voucher.create') }}" class="btn btn-primary float-right">
                                @lang('voucher.create_title')
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>#</td>
                            <td>Code</td>
                            <td>Discount percentage</td>
                            <td>Used</td>
                            <td>Actions</td>
                        </tr>
                        @foreach($vouchers as $voucher)
                        <tr>
                            <td>{{ $voucher->id }}</td>
                            <td>{{ $voucher->code }}</td>
                            <td>{{ $voucher->discount_percentage }}</td>
                            <td>{{ $voucher->used }}</td>
                            <td>
                                <a href="{{ route('admin.voucher.edit', $voucher->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('admin.voucher.destroy', $voucher->id) }}" class="btn btn-danger">Delete</a>
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
