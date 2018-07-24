@extends('layouts.app')

@section('content')
<div class="container">
	@include('partials.admin.menu')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h5>@lang('plan.create_title')</h5></div>

                <div class="card-body">
                    <form class="" method="post" action="{{ route('admin.plan.store') }}">
                        @foreach ($errors->all() as $error)
                            <p class="alert alert-danger">{{ $error }}</p>
                        @endforeach
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        {!! csrf_field() !!}
                        <div class="form-group {{ $errors->has('plan.name') ? ' has-error' : '' }}">
                            <label for="name" class="col-lg-2 control-label">Name</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="name" name="plan[name]" placeholder="name">
                                 @if ($errors->has('plan.name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('plan.name') }}</strong>
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
