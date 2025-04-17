<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobAlert;
use App\Models\Listing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\JobAlertMail;

class JobAlertController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'keyword' => 'nullable|string|max:255',
        ]);

        $user = Auth::user();

        JobAlert::updateOrCreate(
            ['user_id' => $user->id],
            ['keyword' => $request->input('keyword')]
        );

        return redirect()->back()->with('status', 'You have subscribed to job alerts!');
    }

    public function sendAlerts()
    {
        $alerts = JobAlert::all();

        foreach ($alerts as $alert) {
            $jobs = Listing::where('title', 'like', "%{$alert->keyword}%")
                ->orWhere('description', 'like', "%{$alert->keyword}%")
                ->get();

            Mail::to($alert->user->email)->send(new JobAlertMail($jobs));
        }

        return 'Job alerts sent successfully.';
    }
}
