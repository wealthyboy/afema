@extends('layouts.auth')

@section('content')

<!--Content-->
<section class="sec-padding">
   <div class="container">
      <div class="d-flex justify-content-center align-items-center">
         <div class="ml-1 col-md-7 mr-1">
            <div class=" mt-4 mb-4">
               @if(session('success'))
               <div class="d-flex justify-content-center align-items-center " style="min-height: 100vh;">
                  <p class="bold-2">{{ session('success') }}</p>

               </div>
               @else
               <form method="POST" class=" pl-4 pr-4 border" action="/register">
                  <div class="text-center">
                     <h2 class="bold-3">Register</h2>
                     <p class="">Join the Afemai Group to receive updates, connect with the community, and be part of something meaningful.</p>
                  </div>
                  @csrf

                  @if ($errors->all() )
                  @foreach($errors->all() as $error)
                  <span class="error d-block">
                     <strong class="text-danger">{{ $error }}</strong>
                  </span>
                  @endforeach
                  @endif

                  <div class="form-row">
                     <div class="form-group bmd-form-group col-6">
                        <label class="bmd-label-floating">First name</label>
                        <input id="first_name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                     </div>


                     <div class="form-group bmd-form-group col-md-6 col-12">
                        <label class="bmd-label-floating">Last name</label>
                        <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required>

                     </div>

                     <div class="form-group bmd-form-group col-md-6 col-12">
                        <label class="bmd-label-floating">Email</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                     </div>

                     <div class="form-group bmd-form-group col-md-6 col-12">
                        <label class="bmd-label-floating ">Phone</label>
                        <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}" required>
                     </div>

                     <div class="form-group bmd-form-group col-md-12 col-12">
                        <label class="bmd-label-floating">Address</label>
                        <input id="Address" type="text" class="form-control" name="address" required>
                     </div>

                     <div class="form-group bmd-form-group col-md-12 col-12">
                        <label class="bmd-label-floating">Date of birth</label>
                        <input type="text" id="checkin" class="form-control " name="date_of_birth" required>

                     </div>

                     <div class="form-group bmd-form-group col-md-12 col-12  align-items-center">
                        <select required="true" name="preferred_way_to_contact" id="mySelect" class="form-control ">
                           <option selected value="">Preferred way to contact</option>
                           <option value="email">Email</option>
                           <option value="phone">Phone</option>
                        </select>
                     </div>

                  </div>

                  <button type="submit" id="login_form_button" data-loading="Loading" class=" ml-1 btn btn-primary btn-round btn-lg btn-block" name="login" value="Log in">Submit</button>


               </form>

               @endif
            </div>
         </div>
      </div>
   </div>
</section>
<!--End Content-->
@endsection
@section('page-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.1/min/dropzone.min.js" integrity="sha512-En/Po50Bl8kIECa2WkhxhdYeoKDcrJpBKMo9tmbuwbm9RxHWZV8/Y5xM9sh3QbrnFgM3hVR/2umJ33qGJk45pQ==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/upload.js') }}"></script>
@stop