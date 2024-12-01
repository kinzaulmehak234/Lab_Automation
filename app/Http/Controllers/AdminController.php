<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Pcategory;
use App\Models\ProductType;
use App\Models\Product;
use App\Models\contact;
use App\Models\User;
use App\Models\Test;
class AdminController extends Controller
{
    //------------------  website Contact Us Data-------------------------------
    public function indexcontact()
    {    
        return view('website.contact');  
    }
    public function storecontact(Request $request)
    {
        $contact = new contact();
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();
        return redirect()->back()->with('success', 'Your Message Send Successfully');
        
    }

    public function contactlist()
    {    
        $contacts = contact::all();
        return view('admin.admincontact',compact('contacts'));  
    }

    Public function DeleteContact(int $id){
        $contact = contact::find($id);
        $contact->delete();
        return redirect()->back()->with('DeleteContact', 'Product Category Deleted Successfully');
        
    }
    
    //----------------------  USER LIST------------------------------------ 
    public function userlist()
    {    $users = User::all(); 
        return view('admin.Userlist',compact('users'));  
    }
    public function edit($id)
    {
        $user = User::findOrFail($id); // Find the user by ID
        return view('admin.editUser', compact('user')); // Show edit form
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->only(['name', 'email', 'role'])); // Update fields
        return redirect()->route('admin.userlist')->with('success', 'User updated successfully!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete(); // Delete the user
        return redirect()->route('admin.userlist')->with('success', 'User deleted successfully!');
    }



    // List all products
    public function manageProducts()
    {
        $products = Product::all(); // Fetch all products
        return view('admin.manageProducts', compact('products'));
    }

    // Approve a product
    public function approveProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->update(['status' => 'approved']); // Update the status
    
        return redirect()->route('admin.manageProducts')->with('success', 'Product approved successfully!');
    }
    // Delete a product
    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete(); // Delete the product

        return redirect()->route('admin.manageProducts')->with('success', 'Product deleted successfully!');
    }

    // List all tests
    public function manageTests()
    {
        $tests = Test::all(); // Fetch all tests
        return view('admin.manageTest', compact('tests'));
    }

    // Approve a test (if needed)
    public function approveTest($id)
    {
        // Implement approval logic if required
    }

    // Delete a test
    public function deleteTest($id)
    {
        $test = Test::findOrFail($id);
        $test->delete(); // Delete the test

        return redirect()->route('admin.manageTests')->with('success', 'Test deleted successfully!');
    }

}
