<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pcategory;
use App\Models\ProductType;
use App\Models\Product;
use Haruncpi\LaravelIdGenerator\IdGenerator; 
class ProductController extends Controller
{
    public function indexproduct()
    {    
        
        $productId = IdGenerator::generate([
            'table' => 'products',
            'field' => 'product_id',
            'length' => 10,
            'prefix' => 'P-',
        ]);
        $productcategory = pcategory::all();
        $ProductTypes = ProductType::all();
        return view('Userdashboard.product.insert', compact('productcategory','ProductTypes','productId'));
    }
    public function storeproduct(Request $request)
    {
        $request->validate([
            'Product_name' => 'required|string|unique:products,product_name',
            'manufacture_date' => 'required|date|after_or_equal:today',  
            'status' => 'required|in:pending,testing,approved' 
        ], [
            'manufacture_date.after_or_equal' => 'The manufactured date must be today or a future date.', 
            'Product_name.unique' => 'The product name has already been taken. Please choose a different name.',
        ]);

        $productId = IdGenerator::generate([
            'table' => 'products',        
            'field' => 'product_id',      
            'length' => 10,               
            'prefix' => 'P-',            
            'reset_on_prefix_change' => true 
        ]);
        $product = new product();
        $product->Product_name = $request->Product_name;
        $product->manufacture_date = $request->manufacture_date;
        $product->Product_desc = $request->Product_desc;
        $product->category_id = $request->category_id;
        $product->PType_id = $request->PType_id;
        $product->product_id =  $request->product_id;
        $product->status = $request->status;  // Set the default status
        $product->save();
        
        return redirect()->route('product.index')->with('success', 'Product Category Updated Successfully');
    }
    public function listproduct()
    {   $product = product::all();
        return view('Userdashboard.product.index', compact('product'));
    }
    Public function DeleteProduct(int $id){
        $product = product::find($id);
        $product->delete();
        return redirect()->back()->with('DeleteProduct', 'Product Category Deleted Successfully');
        
    }
    public function EditProduct($id)
    {   $product= product::findOrFail($id);
        $productcategory = pcategory::all();
        $ProductTypes = ProductType::all();
     
      return view('Userdashboard.product.editProduct', compact('product','productcategory','ProductTypes'));
   }
    public function updateProduct(Request $request, $id)
    {
        // $request->validate([
        //     'Product_name' => 'required|string|unique:products,product_name',
        //     'manufacture_date' => 'required|date|after_or_equal:today',  
        //     'status' => 'required|in:pending,testing,approved' 
        // ], [
        //     'manufacture_date.after_or_equal' => 'The manufactured date must be today or a future date.', 
        //     'Product_name.unique' => 'The product name has already been taken. Please choose a different name.',
        // ]);

    $product = Product::findOrFail($id);


    $product->Product_name = $request->input('Product_name');
    $product->manufacture_date = $request->input('manufacture_date');
    $product->PType_id = $request->input('PType_id');
    $product->category_id = $request->input('category_id');
    $product->Product_desc = $request->input('Product_desc');

    $product->save();

    return redirect()->route('product.index');
  
 
    }


    // -------- Product Category ------------
    //   ------------------------------------
    public function indexcategory()
    {   $productcategory = pcategory::all();
        return view('Userdashboard.product.PCategory', compact('productcategory'));
    }
    public function storecategory(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:pcategories,category_name',
        ], [
            'name.required' => 'The product type field is required.',
            'name.unique' => 'The product type already exists. Please use a different name.',
        ]);

        $pcategory = new pcategory();
        $pcategory->category_name = $request->name;

        $pcategory->save();
        return redirect()->back()->with('success', 'Category Inserted Successfully');
        
    }
     
    Public function DeleteProductCategory(int $id){
        $pcategory = pcategory::find($id);
        $pcategory->delete();
        return redirect()->back()->with('DeleteProductC', 'Product Category Deleted Successfully');
        
    }
    public function EditProductCategory($id)
    {
      $pcategory = pcategory::findOrFail($id);
      return view('Userdashboard.product.editPCategory', compact('pcategory'));
   }
    public function UpdateProductCategory(Request $request, $id)
    {

  
      $pcategory = pcategory::findOrFail($id);
      $pcategory->category_name = $request->input('category_name');
      $pcategory->save();

      return redirect()->route('pcategory.index')->with('Update', 'Product Category Updated Successfully');
    }

    // ---------------PRODUCT TYPE ------------------------ 
    public function indexptype()
    {   $ProductTypes = ProductType::all();
        return view('Userdashboard.product.Ptype', compact('ProductTypes'));
    }


 
  
    public function storeptype(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:product_types,type_name', // Ensure Type_name is required and unique
        ], [
            'name.required' => 'The product type field is required.', // Custom error message for required
            'name.unique' => 'The product type already exists. Please use a different name.', // Custom error message for unique
        ]);
    


        $ProductType = new ProductType();
        $ProductType->Type_name = $request->name;

        $ProductType->save();
        return redirect()->back()->with('success', 'Product Type Inserted Successfully');
        
    }
    Public function DeleteProductType(int $id){
        $ProductType = ProductType::find($id);
        $ProductType->delete();
        return redirect()->back()->with('DeleteProduct', 'Product Type Deleted Successfully');
        
    }
    public function EditProductType($id)
    {
      $ProductType = ProductType::findOrFail($id);
      return view('Userdashboard.product.editPType', compact('ProductType'));
   }
    public function UpdateProductType(Request $request, $id)
    {

  
      $ProductType = ProductType::findOrFail($id);
      $ProductType->Type_name = $request->input('Type_name');
      $ProductType->save();

      return redirect()->route('pType.index')->with('Update', 'Product Type Updated Successfully');
    }

}
