@extends('layouts.app')

@section('content')
<div class="container">
	@include('partials.admin.menu')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h5>@lang('voucher.create_title')</h5></div>

                <div class="card-body">
                    <form class="" method="post" action="{{ route('admin.voucher.update', $voucher->id) }}">
                        @foreach ($errors->all() as $error)
                            <p class="alert alert-danger">{{ $error }}</p>
                        @endforeach
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        {!! csrf_field() !!}
                        <div class="form-group {{ $errors->has('voucher.code') ? ' has-error' : '' }}">
                            <label for="code" class="col-lg-2 control-label">Code</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="code" name="voucher[code]" value="{!! $voucher->code !!}">
                                 @if ($errors->has('voucher.code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('voucher.code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('voucher.discount_percentage') ? ' has-error' : '' }}">
                            <label for="name" class="col-lg-2 control-label">Price</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="discount_percentage" name="voucher[discount_percentage]" value="{!! $voucher->discount_percentage !!}">
                                 @if ($errors->has('voucher.discount_percentage'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('voucher.discount_percentage') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
