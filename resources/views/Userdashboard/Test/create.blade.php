@extends('layouts.user-dashboard')
@section('main-section')
@if(session('success'))
     <div class="alert alert-secondary">
        {{session('success')}}
     </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">

            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
 
    </div>
@endif

<div class="section-header">
    <h1>Add Test</h1>
</div>

        <form  action="{{url('/insert/test')}}" method="post">
        @csrf
    
            <div class="row">                          
              <div class="form-group  col-md-6">
               <label>Test ID</label>
               <input type="text" class="form-control" name="Test_id"   value="{{ $testId}}" readonly>
              
              </div>
           
                          
              <div class="form-group col-md-6">
            <label>Product ID</label>
            <input type="text" class="form-control" id="product_id" name="product_id" value="{{ old('product_id') }}" required>
            <button type="button" id="fetchManufactureDateBtn" class="btn btn-secondary mt-2">Fetch Manufacture Date</button>
            @error('product_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
            </div> 
            <div class="row">  
            <div class="form-group  col-md-3">
               <label>Test Type:</label>
                 <select class="form-control select2" name="T_type" required>  
                 <option value="">-- Select Test Type --</option>                  
                  
                     <option value="Safety Test">Safety Test</option>
                     <option value="Performance Test">Performance Test</option>
                     <option value="Quality Test">Quality Test</option>
                     <option value="Durability Test">Durability Test</option>
                     <option value="Functionality Test">Functionality Test</option>
                     <option value="regression">Regression Test</option>
                     <option value=""></option>
                  </select>
            </div>

            <div class="form-group  col-md-3">
                <label>Test Criteria:</label>
                <input type="text" class="form-control" name="criteria" placeholder="voltage level, temperature, etc..." required>
            </div>        
            <div class="form-group col-md-3">
               <label>Test Result:</label>
                 <select class="form-control select2" name="result" required>   
                 <option value="">-- Select Result --</option>               
                    <option value="Pass">Pass</option>
                    <option value="Fail">Fail</option>
                  </select>
            </div>
         
         </div>
            <div class="row">
            <div class="form-group col-md-6">
            <label>Manufacture Date</label>
            <input type="date" class="form-control" id="manufacture_date" name="start_date" readonly>
        </div> 
                    <div class="form-group col-md-4">
                       <label>End Date:</label>               
               <input type="date" class="form-control" name="end_date" value="{{ old('end_date') }}" required>
               </div>  
            <div class="form-group col-md-4">
               <label>Test Remark:</label>
                <select class="form-control select2"  name="remarks" required>                  
                 <option value="">-- Select Remark --</option>
                 <option value="Good">Good</option>
                 <option value="Needs Improvement">Needs Improvement</option>
                 <option value="Satisfactory">Satisfactory</option>
                 <option value="Poor">Poor</option>
                </select>
            </div>
     
            <div class="form-group">
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <a href="{{url('/test')}}" class="btn btn-light mr-2">Cancel</a>                          
            </div>  
        </form>


@endsection
<script>
    document.getElementById('fetchManufactureDateBtn').addEventListener('click', async function () {
        const productId = document.getElementById('product_id').value;
        const manufactureDateInput = document.getElementById('manufacture_date');

        try {
            const response = await fetch(`/products/${productId}`);
            const product = await response.json();

            if (product && product.manufacture_date) {
                manufactureDateInput.value = product.manufacture_date;
            } else {
                alert('Manufacture date not found for this product ID');
                manufactureDateInput.value = '';
            }
        } catch (error) {
            console.error('Error fetching manufacture date:', error);
            alert('Error fetching manufacture date');
        }
    });
</script>
