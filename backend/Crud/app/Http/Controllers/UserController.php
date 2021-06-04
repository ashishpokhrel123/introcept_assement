<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;

class UserController extends Controller
{
    public function addUser(Request $request)
    {
        $request->validate([
            'name' => ['required','string'],
            'gender'=> ['required', 'string'],
            'email'=> ['required', 'email'],
            'phone' => ['required', 'string'],
            'dob' => ['required'],
            'nationality' => ['required', 'string'],
            'education' => ['required', 'string']
        ]);

        
        $file_open = fopen('users.csv', 'a');
        $no_rows = count(file("users.csv"));
        if($no_rows > 1)
       {
        $no_rows = ($no_rows - 1) + 1;
        }
        $form_data = array(
            'S_no'  => $no_rows,
            'Name'  => $request->name,
            'Email'  => $request->email,
            'Phone' => $request->phone,
            'Gender' => $request->gender,
            'Date of Birth' => $request->dob,
            'Nationality' => $request->nationality,
            'Education' => $request->education,
         );
         fputcsv($file_open, $form_data);
         return response()->json(['message'=>'successfully, User save to csv','data'=>$form_data],201);


        
        
        

    }

    public function getClient(Request $request)
    {
        $file = fopen('users.csv', 'r');
        $all_userData =  new Collection();
         while (($data = fgetcsv($file)) !== false){
             $all_userData->push($data);
        }
        

         return response()->json($all_userData,200);
    }

   
}
