<?php

namespace App\Http\Controllers;

use App\Models\BloodRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function showHospital()
    {
        $profile = Auth::user();
        return view('hospital.profile', compact('profile'));
    }
    public function updateHospital(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:5',
            'description' => 'nullable|string',
            'address' => 'nullable|string'
        ]);
        $detailsUpdated = Auth::user()->fill($request->all())->save();
        if ($detailsUpdated) {
            return back()->with('success', 'Details Updated');
        } else {
            return back()->with('error', 'Unexpected Error');
        }
    }
    public function showConsumer()
    {
        $user = Auth::user();
        $BloodRequests = BloodRequest::whereConsumerId($user->id)->paginate(10);
        return view('profile', compact(['user', 'BloodRequests']));
    }
    public function updateConsumer(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:5',
            'description' => 'nullable|string',
            'address' => 'nullable|string'
        ]);
        if (Auth::user()->fill($request->all())->save()) {
            return back()->with('success', 'Details Updated');
        } else {
            return back()->with('error', 'Unexpected Error');
        }
    }
}
