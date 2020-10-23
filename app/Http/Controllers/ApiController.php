<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class ApiController extends Controller
{

    public function getAllCustomer() {
      $customers = Customer::get()->toJson(JSON_PRETTY_PRINT);
      return response($customers, 200);
    }

    public function addCustomer(Request $request) {

        $customer = new Customer;
        $customer->firstname = $request->firstname;
        $customer->lastname = $request->lastname;
        $customer->phoneno = $request->phoneno;
        $customer->email  = $request->email ;
        $customer->address = $request->address;
        $customer->save();
        return response()->json([
            "message" => "customer record created"
        ], 201);
      }

      public function createStudent(Request $request) {
        // logic to create a student record goes here
      }
  
      
      public function getCustomer($id) {
        if (Customer::where('id', $id)->exists()) {
          $customer = Customer::where('id', $id)->get();
          return response($customer, 200);
        } else {
          return response()->json([
            "message" => "Customer not found"
          ], 404);
        }
      }
  
      public function updateCustomer(Request $request, $id) {

        if (Customer::where('id', $id)->exists()) {
          $customer = Customer::find($id);
          $customer->firstname = is_null($request->firstname) ? $customer->firstname : $request->firstname;
          $customer->lastname = is_null($request->lastname) ? $customer->lastname : $request->lastname;
          $customer->phoneno = is_null($request->phoneno) ? $customer->phoneno : $request->phoneno;
          $customer->address = is_null($request->address) ? $customer->address : $request->address;
          $customer->email = is_null($request->email) ? $customer->email : $request->email;
          $customer->save();
  
          return response()->json([
              "message" => "records updated successfully"
          ], 200);
          } else {
          return response()->json([
              "message" => "Customer not found"
          ], 404);
          
      }
      }
  
      public function deleteCustomer($id) {
        if(Customer::where('id', $id)->exists()) {
          $customer = Customer::find($id);
          $customer->delete();
  
          return response()->json([
            "message" => "records deleted"
          ], 202);
        } else {
          return response()->json([
            "message" => "Customer not found"
          ], 404);
        }
      }
}
