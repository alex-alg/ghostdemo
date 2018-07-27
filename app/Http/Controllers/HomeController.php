<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\Detection;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Detection $detectionHelper)
    {
        $data = [
            'os'           => $detectionHelper->getOS($_SERVER['HTTP_USER_AGENT']),
            'browser'      => $_SERVER['HTTP_USER_AGENT'],
            'ip'           => $_SERVER['REMOTE_ADDR'],
            'mobile_device'=> $detectionHelper->isMobileDevice($_SERVER['HTTP_USER_AGENT']) ? 'Yes' :'No',
            'source_cookie_data'       => $request->cookie('source') ?? null,
            'campaing_cookie_data'     => $request->cookie('campaing') ?? null,
            'voucher_code_cookie_data' => $request->cookie('voucher_code') ?? null
        ];

        return view('pages.home', $data);
    }

    public function setCookieValues(Request $request, string $source, string $campaing, string $voucherCode = '')
    {
        $campaignCookie = cookie('campaing', $campaing);
        $sourceCookie = cookie('source', $source);
        $voucherCookie = cookie('voucher_code', $voucherCode);

        return redirect('home')->with('status-success', 'Cookies set')
                                ->cookie($sourceCookie)
                                ->cookie($campaignCookie)
                                ->cookie($voucherCookie);
    }
}
