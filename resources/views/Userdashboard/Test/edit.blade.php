@extends('layouts.user-dashboard')
@section('main-section')
@if(session('success'))
     <div class="alert alert-secondary">
        {{session('success')}}
     </div>
@endif
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-header">
            <h3>Edit Test</h3>
        </div>
        <form class="forms-sample" action="{{url('Update/Test', $tests->id)}}" method="post">
        @csrf
        <div class="card-body">  
        
            <div class="row">    
            <div class="form-group col-md-6">
                    <label>Test ID</label>
                    <input type="text" class="form-control" name="Test_id" value="{{ $tests->Test_id }}" readonly>
                </div>                      
                <div class="form-group  col-md-6">
               <label>Product ID</label>
               <input type="text" class="form-control" name="product_id" value="{{ $tests->product_id ,old('product_id') }}" required>
              </div>
            </div> 
            
            <div class="row">  
                <div class="form-group  col-md-4">
                    <label>Test Type:</label>
                    <select class="form-control select2" name="T_type" required>  
                        <option value="">-- Select Test Type --</option>
                        <option value="Safety Test" {{ $tests->T_type == 'Safety Test' ? 'selected' : '' }}>Safety Test</option>
                        <option value="Performance Test" {{ $tests->T_type == 'Performance Test' ? 'selected' : '' }}>Performance Test</option>
                        <option value="Quality Test" {{ $tests->T_type == 'Quality Test' ? 'selected' : '' }}>Quality Test</option>
                        <option value="Durability Test" {{ $tests->T_type == 'Durability Test' ? 'selected' : '' }}>Durability Test</option>
                        <option value="Functionality Test" {{ $tests->T_type == 'Functionality Test' ? 'selected' : '' }}>Functionality Test</option>
                        <option value="Regression Test" {{ $tests->T_type == 'Regression Test' ? 'selected' : '' }}>Regression Test</option>
                    </select>
                </div>

                <div class="form-group  col-md-4">
                    <label>Test Criteria:</label>
                    <input type="text" class="form-control" name="criteria" placeholder="voltage level, temperature, etc..." value="{{ $tests->criteria }}" required>
                </div>        
                
                <div class="form-group col-md-4">
                    <label>Test Result:</label>
                    <select class="form-control select2" name="result" required>   
                        <option value="">-- Select Result --</option>
                        <option value="Pass" {{ $tests->result == 'Pass' ? 'selected' : '' }}>Pass</option>
                        <option value="Fail" {{ $tests->result == 'Fail' ? 'selected' : '' }}>Fail</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4">
                    <label>Start Date (Auto-filled)</label>            
                    <input type="date" class="form-control" name="start_date" value="{{ $tests->start_date }}" readonly>
                </div>   

                <div class="form-group col-md-4">
                    <label>End Date:</label>               
                    <input type="date" class="form-control" name="end_date" value="{{ $tests->end_date }}" required>
                </div>   

                <div class="form-group col-md-4">
                    <label>Test Remark:</label>
                    <select class="form-control select2" name="remarks" required>                  
                        <option value="">-- Select Remark --</option>
                        <option value="Good" {{ $tests->remarks == 'Good' ? 'selected' : '' }}>Good</option>
                        <option value="Needs Improvement" {{ $tests->remarks == 'Needs Improvement' ? 'selected' : '' }}>Needs Improvement</option>
                        <option value="Satisfactory" {{ $tests->remarks == 'Satisfactory' ? 'selected' : '' }}>Satisfactory</option>
                        <option value="Poor" {{ $tests->remarks == 'Poor' ? 'selected' : '' }}>Poor</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary mr-2">Update</button>
              <a href="{{url('/test')}}" class="btn btn-light mr-2">Cancel</a>                          
            </div>  
        </div>  
        </form>
    </div>
</div>
@endsection
