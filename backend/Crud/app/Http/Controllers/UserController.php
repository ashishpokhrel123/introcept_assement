<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;

class UserController extends Controller
{

    /*  Store Client data to CSV file */
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
        header('Content-type: application/csv');
        header('Content-Disposition: attachment; filename='.$file_open);
        header("Content-Transfer-Encoding: UTF-8");
        $no_rows = count(file("users.csv"));
        if($no_rows > 1)
       {
        $no_rows = ($no_rows - 1) + 1;
        }
        $form_data = array(
            's_no'  => $no_rows,
            'name'  => $request->name,
            'email'  => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'nationality' => $request->nationality,
            'education' => $request->education,
         );
         fputcsv($file_open, $form_data);
    
         fclose($file_open);
        
            
         return response()->json($form_data,201);


        
        
        

    }
     /* Fetching all Client from csv file */
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
