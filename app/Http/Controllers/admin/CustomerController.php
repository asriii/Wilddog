<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::get();
        // $customers = Customer::get();
      
        // $data['customerAll'] = customers;
        // echo json_encode($customers);
        // exit;
        return view('/admin/customer',  ["customersAll"=>$customers]);
    }
  
    public function addCustomer(Request $request)
    {
        $response = [
            'success' => true,
            'data'    => [],
            'message' => "Success",
        ];


        return response()->json($response, 200);
    }

    public function showCustomer($id)
    {
        $customers = customers::find($id);
        return view('admin/customer',compact('customers'));
    }

}
