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

    @include('partials.menu')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h4>@lang('home.title')</h4></div>

                <div class="card-body">
                    <div class="row">
                        <table class="table">
                            <tr>
                                <td colspan="5" class="text-center"><h5>Helper Functions</h5></td>
                            </tr>
                            <tr>
                                <td>Os</td>
                                <td>Locale</td>
                                <td>Browser version and name</td>
                                <td>IP</td>
                                <td>Mobile Device</td>
                            </tr>
                            <tr>
                                <td>{{ $os }}</td>
                                <td></td>
                                <td>{{ $browser }}</td>
                                <td>{{ $ip }}</td>
                                <td>{{ $mobile_device }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            
                            <table class="table">
                                <tr>
                                    <td colspan="3" class="text-center"><h5>Cookie Params</h5></td>
                                </tr>
                                <tr>
                                    <td>Source</td>
                                    <td>Campaign</td>
                                    <td>Voucher</td>
                                </tr>
                                <tr>
                                    <td>{{ $source_cookie_data }}</td>
                                    <td> {{ $campaing_cookie_data }}</td>
                                    <td>{{ $voucher_code_cookie_data }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
