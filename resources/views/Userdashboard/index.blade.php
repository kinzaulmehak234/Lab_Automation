@extends('layouts.user-dashboard')
@section('main-section')
<div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12">
            
              <div class="card card-statistic-2">
                
                <div class="card-chart">
                <h4 class="text-center">Product</h4>
                  
                </div>
                <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-archive"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Product</h4>
                  </div>
                  <div class="card-body">
                  {{ $totalProducts }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
            
              <div class="card card-statistic-2">
                
                <div class="card-chart">
                <h4 class="text-center"> Test</h4>
                  
                </div>
                <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-archive"></i>

                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Test Product</h4>
                  </div>
                  <div class="card-body">
                  {{ $testProducts }}
                  </div>
                </div>
              </div>
            </div>
</div>           
          </div>
          
</div>
@endsection
