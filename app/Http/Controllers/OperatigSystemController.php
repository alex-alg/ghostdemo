<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\OperatingSystem\StoreOperatingSystem as StoreOperatingSystemRequest;
use App\Http\Requests\OperatingSystem\UpdateOperatingSystem as UpdateOperatingSystemRequest;
use App\Repositories\OperatingSystem as OperatingSystemRepo;

class OperatigSystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, OperatingSystemRepo $osRepo)
    {
        $data = [];
        $data['operating_systems'] = $osRepo->getAll();

        return view('pages.admin.os.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('pages.admin.os.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOperatingSystemRequest $request, OperatingSystemRepo $osRepo)
    {
        $data = $request->input('os');

        $osRepo->store($data);

        return redirect()->route('admin.os.index')
                        ->with('status', 'Operating System added succesfully');
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
    public function edit(int $id, OperatingSystemRepo $osRepo)
    {
        $data = [];
        $data['os'] = $osRepo->getById($id);

        return view('pages.admin.os.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOperatingSystemRequest $request, int $id, OperatingSystemRepo $osRepo)
    {
        $data = $request->input('os');
        $osRepo->update($data, $id);

        return redirect()->route('admin.os.index')
                        ->with('status', 'Operating System updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id, OperatingSystemRepo $osRepo)
    {
        $osRepo->destroy($id);

        return redirect()->route('admin.os.index')
                        ->with('status', 'Operating System deleted succesfully');
    }
}
