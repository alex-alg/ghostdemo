@extends('layouts.app')

@section('content')
<div class="container">
	@include('partials.admin.menu')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h5>@lang('plan.create_title')</h5></div>

                <div class="card-body">
                    <form class="" method="post" action="{{ route('admin.plan.update', $plan->id) }}">
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
                                <input type="text" class="form-control" id="name" name="plan[name]" value="{!! $plan->name !!}">
                                @if ($errors->has('plan.name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('plan.name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('plan.operating_system_id') ? ' has-error' : '' }}">
                            <label for="operating_system" class="col-lg-2 control-label">Os</label>
                            <div class="col-md-10">
                                <select class="form-control" id="operating_system" name=plan[operating_system_id]>
                                    <option></option>
                                    @foreach($operating_systems as $os)
                                    <option value="{{ $os->id }}" 
                                            {{ ($os->id === $plan->operating_system_id) ? 'selected' : '' }}>
                                        {{ $os->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('plan.operating_system_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('plan.operating_system_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div>

                        <div class="form-group">
                            <label for="name" class="col-lg-2 control-label">Features</label>
                            <div class="col-lg-10">
                                @foreach($features as $feature)
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="plan[feature_ids][]" value="{{ $feature->id }}"
                                  {{ ($plan->features->contains($feature)) ? 'checked': ''}}>
                                  <label class="form-check-label">
                                    {{ $feature->name }}
                                  </label>
                                </div>
                                @endforeach
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
