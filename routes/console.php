<?php

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('deactivate-user', function () {
    $dateSevenDaysAgo = Carbon::now()->subDays(7);

// Query to get all users with created_at more than 7 days ago
    $users = User::where('status', User::STATUS_ACTIVE)
        ->where('starts_at', '<', $dateSevenDaysAgo)
        ->get();

    foreach ($users as $user) {
        $user->status = User::STATUS_INACTIVE;
        $user->save();
    }



    \Illuminate\Support\Facades\Log::info(date('Y-m-d H:i:s').' Inspiring '.Inspiring::quote());
})->purpose('Display an inspiring quote');
