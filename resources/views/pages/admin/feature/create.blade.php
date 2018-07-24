@extends('layouts.app')

@section('content')
<div class="container">
	@include('partials.admin.menu')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h5>@lang('feature.create_title')</h5></div>

                <div class="card-body">
                    <form class="" method="post" action="{{ route('admin.feature.store') }}">
                        @foreach ($errors->all() as $error)
                            <p class="alert alert-danger">{{ $error }}</p>
                        @endforeach
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        {!! csrf_field() !!}
                        <div class="form-group {{ $errors->has('feature.name') ? ' has-error' : '' }}">
                            <label for="name" class="col-lg-2 control-label">Name</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="name" name="feature[name]" placeholder="name">
                                 @if ($errors->has('feature.name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('feature.name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('feature.price') ? ' has-error' : '' }}">
                            <label for="name" class="col-lg-2 control-label">Price</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="price" name="feature[price]" placeholder="price">
                                 @if ($errors->has('feature.price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('feature.price') }}</strong>
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
