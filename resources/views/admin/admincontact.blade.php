
@extends('layouts.admin-dashboard')
@section('main-section')
<div class="section-header">
            <h1>Contact List</h1>
</div>

                    <table id="myTable" class="display" >
                      <thead >
                       <tr style="font-size: 13px;"  >
                          <th>Name</th>
                            <th>Name</th>
                            <th>Phone Number</th> 
                            <th>Email</th> 
                            <th>Message</th>  
                            <th>Action</th>  
                       </tr>
                     </thead>
                     <tbody>
                     @foreach ($contacts as $c)
                         <tr style="font-size: 13px;" >   
                         <td>{{ $loop->iteration }}</td>                   
                          <td>{{$c->name}}</td>
                          <td>{{$c->phone}}</td>
                          <td>{{$c->email}}</td>
                          <td>{{$c->message}}</td>
                          <td>

                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"  href="{{url('/Delete/Contact',$c->id)}}" ><i class="fas fa-trash"></i></a>

                          </td>
                         </tr>
                        @endforeach

                     </tbody>
                    </table>


                
 


@endsection