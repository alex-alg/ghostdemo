<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Voucher\StoreVoucher as StoreVoucherRequest;
use App\Http\Requests\Voucher\UpdateVoucher as UpdateVoucherRequest;

use App\Repositories\Voucher as VoucherRepo;

use App\Models\Voucher as VoucherModel;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, VoucherRepo $voucherRepo)
    {
        $data = [];
        $vouchers = $voucherRepo->getAll();
        $data['vouchers'] = $voucherRepo->parseForList($vouchers);

        

        return view('pages.admin.voucher.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('pages.admin.voucher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVoucherRequest $request, VoucherRepo $voucherRepo)
    {
        $data = $request->input('voucher');

        $voucherRepo->store($data);

        return redirect()->route('admin.voucher.index')
                        ->with('status', 'Voucher added succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(VoucherModel $voucher, VoucherRepo $voucherRepo)
    {
        $data = [];
        $data['voucher'] = $voucher;

        return view('pages.admin.voucher.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVoucherRequest $request, VoucherModel $voucher, VoucherRepo $voucherRepo)
    {
        $data = $request->input('voucher');

        $voucherRepo->update($data, $voucher->id);

        return redirect()->route('admin.voucher.index')
                        ->with('status', 'Voucher updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(VoucherModel $voucher, VoucherRepo $voucherRepo)
    {
        $voucherRepo->destroy($voucher->id);

        return redirect()->route('admin.voucher.index')
                        ->with('status', 'Voucher deleted succesfully');
    }
}
