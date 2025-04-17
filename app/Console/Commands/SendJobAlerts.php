<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\JobAlert;
use App\Models\Listing;
use Illuminate\Support\Facades\Mail;
use App\Mail\JobAlertMail;

class SendJobAlerts extends Command
{
    protected $signature = 'job-alerts:send';
    protected $description = 'Send job alerts to users';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $alerts = JobAlert::all();

        foreach ($alerts as $alert) {
            $jobs = Listing::where('title', 'like', "%{$alert->keyword}%")->get();
            Mail::to($alert->user->email)->send(new JobAlertMail($jobs));
        }

        $this->info('Job alerts sent successfully.');
    }
}
