<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Feature\StoreFeature as StoreFeatureRequest;
use App\Http\Requests\Feature\UpdateFeature as UpdateFeatureRequest;

use App\Repositories\Feature as FeatureRepo;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, FeatureRepo $featureRepo)
    {
        $data = [];
        $data['features'] = $featureRepo->getAll();

        return view('pages.admin.feature.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('pages.admin.feature.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFeatureRequest $request, FeatureRepo $featureRepo)
    {
        $data = $request->input('feature');

        $featureRepo->store($data);

        return redirect()->route('admin.feature.index')
                        ->with('status', 'Feature added succesfully');
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
    public function edit(int $id, FeatureRepo $featureRepo)
    {
        $data = [];
        $data['feature'] = $featureRepo->getById($id);

        return view('pages.admin.feature.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFeatureRequest $request, int $id, FeatureRepo $featureRepo)
    {
        $data = $request->input('feature');
        $featureRepo->update($data, $id);

        return redirect()->route('admin.feature.index')
                        ->with('status', 'Feature updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id, FeatureRepo $featureRepo)
    {
        $featureRepo->destroy($id);

        return redirect()->route('admin.feature.index')
                        ->with('status', 'Feature deleted succesfully');
    }
}
