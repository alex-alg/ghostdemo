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
                        <div class="col-md-3">
                            <div class="card bg-info">
                                <div class="card-header">Basic</div>
                                <div class="card-body">asdadasd</div>
                                <div class="card-footer">
                                    <a href="" class="btn btn-success">Choose</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
