<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Hash;
use Validator;

class ApiClientController extends Controller
{

    public function index()
    {
        $clients = [];
        if (($open = fopen("client_data.csv", "r")) !== false) {

            while (($client_data = fgetcsv($open, 1000, ",")) !== false) {
                $clients[] = $client_data;               
            }
            fclose($open);
        }
        return response()->json([
             'status_code'=>200,
            "message" => "Client List",
            "data" => $clients
        ]);
    }




     public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(),
            [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'required|string|max:20',
            'gender' => 'required|string|max:6',
            'address' => 'required',
            'dob' => 'required|date|before:today',
            'nationality' => 'required|string|max:20',
            'education_background' => 'required|string|max:255',
            'mode_of_contact' => 'required|string|max:20',
            ]
        );

        if($validatedData->fails()){
                                return response()->json([
                                    'status_code'=>400,
                                    'message'=>$validator->errors(),
                                    'data'=>[]
                                ]);     
        }else{
            $file_open = fopen('client_data.csv', "a");
            $no_of_rows = count(file('client_data.csv'));
            
            if ($no_of_rows > 1) {
                $no_of_rows = ($no_of_rows - 1) + 1;
            }
            $form_data = array(
                'id'  => $no_of_rows,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'address' => $request->address,
                'dob' => $request->dob,
                'nationality' => $request->nationality,
                'education_background' => $request->education_background,
                'mode_of_contact' => $request->mode_of_contact,
            );
            $success = fputcsv($file_open, $form_data);
            return response()->json([
                                        'status_code'=>200,
                                        'message'=>'Client registered successfully.',
                                         $form_data
                                    ]);
        }
    }
}
