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
            'mobile_device'=> $detectionHelper->isMobileDevice($_SERVER['HTTP_USER_AGENT']) ? 'Yes' :'No'
        ];

        return view('pages.home', $data);
    }
}
