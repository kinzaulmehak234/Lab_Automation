@extends('layouts.user-dashboard')
@section('main-section')
<div class="section-header d-flex justify-content-between">
    <h4 >Test Product List</h4>
    <a  href="{{url('/insert/test')}}"class="btn btn-primary mr-2">+ Add Test</a>       
</div>
                 
              
                    <table id="myTable" class="display" >
                      <thead >
                       <tr style="font-size: 13px;"  >
                          <th>#</th>
                            <th>Test ID</th>
                            <th>Product ID</th> 
                            <th>Test Type</th> 
                            <th>Test Result</th>                            
                            <!-- <th>Test Remark</th> -->
                            <th>Start Date</th>
                            <th>End Date </th>                         
                            <th>Action</th>
                       </tr>
                     </thead>
                     <tbody>
                     @foreach ($test as $t)
                         <tr style="font-size: 13px;" >
                         <th>{{ $loop->iteration }}</th>
                          <td>{{$t->Test_id}}</td>
                          <td>{{$t->product_id}}</td>
                          <td>{{$t->T_type}}</td>
                          <!-- <td>{{$t->remarks}}</td> -->
                          <td>{{$t->result}}</td>
                          <td>{{$t->start_date}}</td>
                          <td>{{$t->end_date}}</td>
                          <td>
                            <a href="{{url('/Edit/Test',$t->id)}}"  class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"  href="{{url('/Delete/Test',$t->id)}}" ><i class="fas fa-trash"></i></a>
                          </td>
                         </tr>
                         @endforeach
                     </tbody>
                    </table>


                
 
@endsection
