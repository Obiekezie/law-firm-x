<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\NotificationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UserStoreRequest;

class UserController extends Controller
{
    public function account()
    {

      return view('panel.account');
    
     
    }


    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    
        $user = User::where('email', $request->email)->first();
    
 
        if ($user &&  Hash::check($request->input('password'), $user->password)) {

            $data['status'] = 200;
            $data['message'] = "Login successful";
            return response()->json($data);
        }else{

            $data['status'] = 400;
            $data['message'] = "Login unsuccessful";
            return response()->json($data);

        }
      
    
     
    }


    public  function random_strings($length_of_string) 
    { 
    
        // String of all alphanumeric character 
        $str_result = '0123456789'; 
    
    
        return substr(str_shuffle($str_result), 
                        0, $length_of_string); 
    } 
    public function createUser(UserStoreRequest $request)
    {
        // Validate the request
        $validatedData = $request->validated();
    
        // Process image upload
        $imageName = "default-image.png";
        if ($request->hasFile('profileImage')) {
            $image = $request->file('profileImage');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
        }
    
        // Generate OTP
        $otp = $this->random_strings(4);

        // Create a new user instance with the validated data
        $user = new User([
            'firstName' => $validatedData['firstName'],
            'lastName' => $validatedData['lastName'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
            'sex' => $validatedData['sex'],
            'primaryLegalCounsel' => $validatedData['primaryLegalCounsel'],
            'dateOfBirth' => $validatedData['dateOfBirth'],
            'case_details' => $validatedData['case_details'],
            'otp' => $otp,
            'profileImage' =>"$imageName",
            'password' => Hash::make('12345678'),
            // Add other user properties as needed
        ]);
    
        // Save the user to the database
        if ($user->save()) {
            // Send notification email
            $request['type'] = "Register";
            $subject = "Welcome to " . config('constants.options.company_name');
            Mail::to($validatedData['email'])->send(new NotificationMail($request, $subject));
    
            // Return success response
            return response()->json(['status' => 200, 'message' => 'User created']);
        } else {
            // Return error response
            return response()->json(['status' => 800, 'message' => 'Error creating user']);
        }
    }
    
    public function clientDetails($id)
    {
        $user = User::findOrFail($id);
        return view('panel.clients.details', compact('user'));
    }
    
    public function getClients()
    {
        $clients = User::where('role', 2) // Assuming 'client' is the role for clients
                        ->orderBy('id', 'desc') // Order by ID in descending order
                        ->get();
        return response()->json($clients);
    }
    

    public function logout()
    {
        // $user = Auth::user();
        // Log::info('User Logged Out. ', [$user]);
        Auth::logout();
        Session::flush();

        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }

}

