@extends('layouts.app')

@section('content')

<div class="container">
<div class="col-md-2">
            <ul class="nav nav-pills flex-column right">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">Home</a>
                </li>
            </ul>
        </div>
    <h2>Customer</h2>
    <!-- Button to Open the Modal -->
    <button type="button" id="btnAdd" class="btn btn-primary" >
        Add Customer
    </button>
    <br>
    <table id="tableCustomers" class="table mt-3">
        <thead class="thead-light">
            <tr>    
                <td>ID</td>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Phone Number</td>
                <td>E-mail</td>
                <td>Address</td>
                <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($customersAll as $customer)
            <tr>
                <td>{{$customer->id}}</td>
                <td>{{$customer->firstname}}</td>
                <td>{{$customer->lastname}}</td>
                <td>{{$customer->phoneno}}</td>
                <td>{{$customer->email}}</td>
                <td>{{$customer->address}}</td>
                <td><a class="btn btn-primary" onclick="getEditCustomer({{$customer->id}})">Edit</a></td>
                <td><a class="btn btn-danger" onclick="confirmDeleteCustomer({{$customer->id}})">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

        <!-- The Modal Add-->
        <div class="modal" id="customerModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add customer</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal addCustomer -->
                    <div class="modal-body">
                        <form onsubmit="return false">
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input type="hidden" name="action" id="action">
                                <input type="hidden" name="custom_id" id="custom_id">
                                <input type="text" class="form-control" placeholder="" name="firstname" id="firstname">
                            </div>
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control" placeholder="" name="lastname" id="lastname">
                            </div>
                            <div class="form-group">
                                <label for="phomeno">Phone Number</label>
                                <input type="text" class="form-control" placeholder="" name="phomeno" id="phomeno">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" placeholder="" name="email" id="email">
                            </div>
                
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" placeholder="" name="address" id="address">
                            </div>
                           
                            <!-- <div class="form-group">
                                <label for="profile">Profile</label>
                                <input type="file" class="form-control" placeholder="Enter password" name="profile"
                                    id="profile">
                            </div> -->
                            <button id="submitAdd" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        @endsection
