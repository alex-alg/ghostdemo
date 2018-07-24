@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials.menu')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h5>@lang('pricing_plans.title')</h5></div>

                <div class="card-body">

                    <div class="row">
                        @foreach($plans as $plan)
                        <div class="col-md-3">
                            <div class="card bg-info">
                                <div class="card-header">{{ $plan->name }}</div>
                                <div class="card-body">
                                    <h4>OS: {{ $plan->os }}</h4>
                                    <p>Features:</p>
                                    @foreach($plan->features as $feature)
                                        <p>{{ $feature->name }}</p>
                                    @endforeach
                                </div>
                                <div class="card-footer">
                                    <a href="" class="btn btn-success">Choose</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
