<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Plan\StorePlan as StorePlanRequest;
use App\Http\Requests\Plan\UpdatePlan as UpdatePlanRequest;

use App\Repositories\Plan as PlanRepo;
use App\Repositories\Feature as FeatureRepo;
use App\Repositories\OperatingSystem as OperatingSystemRepo;

use App\Models\Plan as PlanModel;

use App\Helpers\Detection;

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
        $plans = $planRepo->getAll();
        $data['plans'] = $planRepo->parseForList($plans);

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
        $featureIds = $request->input('feature_ids');

        $planRepo->store($data, $featureIds);

        return redirect()->route('admin.plan.index')
                        ->with('status-success', 'Plan added succesfully');
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
    public function edit(PlanModel $plan, PlanRepo $planRepo, OperatingSystemRepo $osRepo, FeatureRepo $featureRepo)
    {
        $data = [];
        $data['plan'] = $plan;
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
    public function update(UpdatePlanRequest $request, PlanModel $plan, PlanRepo $planRepo)
    {
        $data = $request->input('plan');
        $featureIds = $request->input('feature_ids');
        $planRepo->update($data, $plan->id, $featureIds);

        return redirect()->route('admin.plan.index')
                        ->with('status-success', 'Plan updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlanModel $plan, PlanRepo $planRepo)
    {
         $planRepo->destroy($plan->id);

        return redirect()->route('admin.plan.index')
                        ->with('status-success', 'Plan deleted succesfully');
    }

    public function planList(Request $request, PlanRepo $planRepo, Detection $detectionHelper, OperatingSystemRepo $osRepo)
    {
        $data = [];
        $plans = $planRepo->getAll();

        $osFullName = $detectionHelper->getOS($_SERVER['HTTP_USER_AGENT']);
        $osName = explode(' ', $osFullName)[0];
        $os = $osRepo->getByName($osName);

        $plans = $planRepo->filterByOs($plans, $os->id);
        
        $data['plans'] = $planRepo->parseForList($plans);
        $data['applyVoucherUrl'] = route('voucher.apply');

        return view('pages.pricing_plans', $data);
    }
}
