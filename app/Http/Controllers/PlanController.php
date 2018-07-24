<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Plan\StorePlan as StorePlanRequest;
use App\Http\Requests\Plan\UpdatePlan as UpdatePlanRequest;

use App\Repositories\Plan as PlanRepo;
use App\Repositories\Feature as FeatureRepo;
use App\Repositories\OperatingSystem as OperatingSystemRepo;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, PlanRepo $planRepo)
    {
        $data = [];
        $data['plans'] = $planRepo->getAll();

        return view('pages.admin.plan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, OperatingSystemRepo $osRepo, FeatureRepo $featureRepo)
    {
        $data = [];
        $data['operating_systems'] = $osRepo->getAll();
        $data['features'] = $featureRepo->getAll();

        return view('pages.admin.plan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlanRequest $request, PlanRepo $planRepo)
    {
        $data = $request->input('plan');

        $planRepo->store($data);

        return redirect()->route('admin.plan.index')
                        ->with('status', 'Plan added succesfully');
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
    public function edit(int $id, PlanRepo $planRepo, OperatingSystemRepo $osRepo, FeatureRepo $featureRepo)
    {
        $data = [];
        $data['plan'] = $planRepo->getById($id);
        $data['operating_systems'] = $osRepo->getAll();
        $data['features'] = $featureRepo->getAll();

        

        return view('pages.admin.plan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
