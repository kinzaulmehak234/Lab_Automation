<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator; 
use App\Models\Test;
use App\Models\Product;
class TestController extends Controller
{   
    public function userdashboard()
{
 
    $totalProducts = Product::count();
    
  
    $testProducts = Test::count();
    
    // $remainingProducts = $totalProducts - $testProducts;

    return view('Userdashboard.index', compact('totalProducts', 'testProducts'));
}




    public function indextest()
    {
        $testId = IdGenerator::generate([
            'table' => 'tests',        
            'field' => 'Test_id',      
            'length' => 12,               
            'prefix' => 'PT-',            
            'reset_on_prefix_change' => true 

            
        ]);
     
        $products = Product::all();
        return view('Userdashboard.Test.create', compact('testId', 'products'));
    }

    public function index()
    {
        $test = Test::all();
        return view('Userdashboard.Test.index', compact('test'));

    }

    public function storetest(Request $request)
    {
        // Fetch the product based on the product ID
        $product = Product::where('product_id', $request->input('product_id'))->first();
    
        if ($product) {
            // Set the manufacture date as the start date
            $manufacture_date = $product->manufacture_date;
    
            // Manually add the start date to the request data for validation
            $request->merge(['start_date' => $manufacture_date]);
    

            $request->validate([
                'product_id' => 'required|exists:products,product_id',
                'T_type' => 'required',
                'criteria' => 'required',
                'result' => 'required',
                'end_date' => 'required|date|after_or_equal:start_date',
                'remarks' => 'required',
            ]);
            // Save the test
            $tests = new Test();
            $tests->product_id = $request->product_id;
            $tests->T_type = $request->T_type;
            $tests->result = $request->result;
            $tests->remarks = $request->remarks;
            $tests->criteria = $request->criteria;
            $tests->Test_id = $request->Test_id;
            $tests->start_date = $manufacture_date;  // Auto-fill start date from product manufacture date
            $tests->end_date = $request->end_date;   // End date input from form
            $tests->save();
           
            return redirect()->route('test.index')->with('success', 'Product Test Inserted Successfully');
        } else {
            // If the product is not found
            return redirect()->back()->withErrors('Product not found');
        }
    }

    Public function DeleteTest(int $id){
        $tests = Test::find($id);
        $tests->delete();
        return redirect()->back()->with('DeleteTest', 'Product Category Deleted Successfully');
        
    }
    public function EditTest($id)
    {  $products = Product::all();  
      $tests = Test::findOrFail($id);
      return view('Userdashboard.Test.edit', compact('tests', 'products'));
   }
   public function UpdateTest(Request $request, $id)
   {
       // Find the test record by ID
       $test = Test::findOrFail($id);
   
       // Update only the editable fields
       $test->product_id = $request->input('product_id');
       $test->T_type = $request->input('T_type');
       $test->criteria = $request->input('criteria');
       $test->result = $request->input('result');
       $test->start_date = $request->input('start_date');
       $test->end_date = $request->input('end_date');
       $test->remarks = $request->input('remarks');
   
       // Save the updated record without modifying Test_id
       $test->save();
   
       // Redirect with a success message
       // return redirect()->back()->with('success', 'Test updated successfully!');
       return redirect()->route('test.index');
   }
}

