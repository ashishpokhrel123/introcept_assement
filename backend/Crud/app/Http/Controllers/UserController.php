<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

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
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $dob = $request->dob;
        $gender = $request->gender;
        $nationality = $request->nationality;
        $education = $request->education;
        
        $file_open = fopen('users.csv', 'a');
        $columns = array('Name', 'Email Address', 'Phone', 'Gender', 'Date of Birth', 'Nationality', 'Education');
        $no_rows = count(file("users.csv"));
        if($no_rows > 1)
       {
        $no_rows = ($no_rows - 1) + 1;
        }
        
        $form_data = [
            'Name' => $name,
            'Email Address' => $email,
            'Phone' => $phone,
            'Gender' => $gender,
            'Date of Birth' => $dob,
            'Nationality' => $nationality,
            'Education' => $education

        ];
        fputcsv($file_open, $columns);
        fputcsv($file_open, $form_data);
       
         return response()->json(['message'=>'successfully, User save to csv','data'=>$form_data],201);


        
        
        

    }

   
}
