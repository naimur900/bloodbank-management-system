<?php

namespace App\Http\Controllers;

use App\Models\BloodRequest;
use App\Models\BloodStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HospitalController extends Controller
{

    public function Dashboard()
    {
        $user = Auth::user();
        foreach ($user->blood_store as $blood) {
            $availableBloodUnits[$blood->blood_group] = $blood->unit;
        }
        $countPendingRequests = BloodRequest::whereHospitalId($user->id)->pending()->count();
        $countSuccessRequests = BloodRequest::whereHospitalId($user->id)->accepted()->count();
        return view('hospital.dashboard', compact(['availableBloodUnits', 'countPendingRequests', 'countSuccessRequests']));
    }
    public function showBloodRequests()
    {
        $user = Auth::user();
        $BloodRequests = BloodRequest::whereHospitalId($user->id)->paginate(10);
        return view('hospital.blood-request', compact('BloodRequests'));
    }
    public function showAvailableBlood()
    {
        $bloods = Auth::user()->blood_store;
        return view('hospital.available-bloods', compact('bloods'));
    }
    public function AddBlood(Request $request)
    {
        $request->validate([
            'unit' => 'required|numeric'
        ]);
        $bloodStore = Auth::user()->blood_store->where('blood_group', $request->blood_group);
        $bloodStore->first()->update([
            'unit' => $bloodStore->first()->unit + abs($request->unit)
        ]);
        return back();
    }
    public function handleBloodRequests(Request $request)
    {
        $request->validate([
            'status' => 'string',
            'request_id' => 'numeric',
        ]);
        $user = Auth::user();
        $bloodRequest = BloodRequest::findOrFail($request->request_id);
        if (strtolower($request->status) == 'approved') {
            $bloodStock = $user->blood_store->where('blood_group', $bloodRequest->blood_group)->first();
            if ($bloodStock->unit < $bloodRequest->unit) {
                return back()->with('error', 'Can not proceed Request, Blood insufficient');
            }
            $requestAccepted = $bloodRequest->fill(['status' => BloodRequest::STATUS_ACCEPTED, 'responded_at' => now()])->save();
            if ($requestAccepted) {
                $bloodStock->fill([

                    'unit' => $bloodStock->unit - $bloodRequest->unit

                ])->save();

                return back()->with('success', "Data Approved");

            } else {

                return back()->with('error', 'failed Could not Update data');
                
            }
        }
        if (strtolower($request->status) == 'decline') {
            BloodRequest::find($request->request_id)
                ->fill(['responded_at' => now(), 'status' => BloodRequest::STATUS_DECLINED])->save();
        }
        return back()->with('errors', 'Unknown Error Please Refresh your page and try Again');
    }
}
