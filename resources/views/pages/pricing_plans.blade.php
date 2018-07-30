@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials.menu')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h4>@lang('pricing_plans.title')</h4></div>

                <div id="pricing-plans" class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <plans-list :links="plansListLinks" ref="planList"></plans-list>
                        </div>
                        <div class="col-md-3">
                            <apply-voucher-form
                                :links="formLinks"
                                :labels="formLabels"
                                v-on:voucher-applied="refreshPlanList"
                                ></apply-voucher-form>

                            <p>Available codes:</p>
                            <p>abc - 5%</p>
                            <p>xyz - 10%</p>
                            <p>123 - 15%</p>
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
        var pricingPlansPageData = {
            plansListLinks: {
                getPlansDataUrl: "{!! $getPlanListUrl !!}"
            },
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