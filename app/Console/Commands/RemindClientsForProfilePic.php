<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Http\Request; // Import the Request class
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificationMail;

class RemindClientsForProfilePic extends Command
{
    protected $signature = 'remind:clients';

    protected $description = 'Send reminder to clients without profile pictures';

    public function handle()
    {
        $clients = User::where('profileImage','default-image.png')->get();

        foreach ($clients as $client) {
            $request = new Request(); 
            $request->merge(['type' => "Profile-Image-Reminder"]);

            $subject = "Update Profile Image";
            Mail::to($client->email)->send(new NotificationMail($request, $subject));
        }
    }
}
