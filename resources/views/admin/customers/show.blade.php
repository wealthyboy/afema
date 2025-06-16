@extends('admin.layouts.app')
@section('pagespecificstyles')
@stop
@section('content')
<div class="row">
   <div class="col-md-12">
      <div class="text-right">
         <a href="/admin/customers" rel="tooltip" title="Back" class="btn btn-primary btn-simple btn-xs">
            <i class="material-icons">reply</i>
         </a>
      </div>
   </div>
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <h4 class="card-title">User {{ $user->full_name  }}</h4>
         </div>
         <div class="card-content">
            <ul class="nav nav-pills nav-pills-warning">
               <li class="active"><a href="panels.html#pill1" data-toggle="tab">General</a></li>
               <li class=""><a href="panels.html#carts" data-toggle="tab">Cart</a></li>
               <li class=""><a href="panels.html#Addresses" data-toggle="tab">Addresses</a></li>

            </ul>
            <div class="tab-content">
               <div class="tab-pane active" id="pill1">
                  <div class="col-md-12 col-sm-12">
                     <div class="table-responsive">
                        <table class="table">
                           <tbody>
                              <tr>
                                 <td colspan="4"><b>Full Name</b></td>
                                 <td class="text-righ"> {{ $user->fullname() }}</td>
                              </tr>

                              <tr>
                                 <td colspan="4"><b>Email </b></td>
                                 <td class="text-righ">{{ $user->email }}</td>
                              </tr>

                              <tr>
                                 <td colspan="4"><b>Phone </b></td>
                                 <td class="text-righ">{{ $user->phone_number  }}</td>
                              </tr>

                              <tr>
                                 <td colspan="4"><b>Email </b></td>
                                 <td class="text-righ">{{ $user->email }}</td>
                              </tr>

                              <tr>
                                 <td colspan="4"><b>City </b></td>
                                 <td class="text-righ">{{ $user->city }}</td>
                              </tr>

                              <tr>
                                 <td colspan="4"><b>Address </b></td>
                                 <td class="text-righ">{{ $user->address }}</td>
                              </tr>
                              <tr>
                                 <td colspan="4"><b>Verified </b></td>
                                 <td>
                                    @if($user->is_approved)
                                    <span class="badge bg-success">Verified</span>
                                    @else
                                    <span class="badge bg-secondary">Pending</span>
                                    @endif
                                 </td>
                              </tr>
                              <tr>
                                 <td colspan="4"><b>Date of Birth </b></td>
                                 <td class="text-righ">{{ $user->dob }}</td>
                              </tr>
                              <tr>
                                 <td colspan="4"><b>Contact method </b></td>
                                 <td class="text-righ">{{ $user->preferred_way_to_contact }}</td>
                              </tr>

                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>



            </div>
         </div>
      </div>
   </div>
</div>
<!-- end row -->
@endsection
@section('page-scripts')
@stop

@section('inline-scripts')
@stop