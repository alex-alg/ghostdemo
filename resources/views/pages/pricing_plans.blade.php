@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials.menu')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h5>@lang('pricing_plans.title')</h5></div>

                <div id="pricing-plans" class="card-body">

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
                        <div class="col-md-3">
                            <apply-voucher-form :links="formLinks" :labels="formLabels"></apply-voucher-form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        var pricingPlansData = {
            formLinks: {
                applyVoucherUrl: "{!! $applyVoucherUrl !!}"
            },
            formLabels: {
                headerLabel: '{!! trans('voucher.apply_voucher_header') !!}',
                codeLabel: '{!! trans('voucher.code') !!}',
                applyButtonLabel: '{!! trans('voucher.apply_button') !!}',
                applySuccessMessage: '{!! trans('voucher.apply_success_message') !!}',
                applyErrorMessage: '{!! trans('voucher.apply_error_message') !!}'
            },
        }
    </script>
    <script src="{{URL::asset('js/compiled/pricing-plans.js')}}" crossorigin="anonymous"></script>
@endsection