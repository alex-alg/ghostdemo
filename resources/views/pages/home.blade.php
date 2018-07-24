@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials.menu')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@lang('home.title')</div>

                <div class="card-body">
                    <div class="row">
                        <table class="table">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
