@extends('layouts.dashboard')

@section('content')
<style>
    .card {
    display: flex;
    justify-content: center;
    padding: 20px;
}
.custom_heading{
    color:#f18819;
    font-size:20px

}
</style>

                    <div class="container-fluid">
                        <!-- begin row -->
                        <div class="row">
                            <div class="col-md-12 m-b-30">
                              @if (session()->has('message'))
                              <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                      <span class="sr-only">Close</span>
                                  </button>
                                  <span>{{ session()->get('message') }}</span>
                              </div>
                              <br>
                              @endif
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} Admin</div>

                <div class="card-body">
                   <div class="row">
                       <div class="col-md-3">
                           <div class="card" style="height: 90px;">
                               <div class="row py-3 custom_heading">
                                   <div class="col-8 text-center">
                                      <h4> Users</h4>
                                   </div>
                                   <div class="col-4">
                                      <h4> {{$Total_Users}}</h4>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <div class="card" style="height: 90px;">
                               <div class="row py-3 custom_heading">
                                   <div class="col-8 text-center">
                                      <h4> Customers</h4>
                                   </div>
                                   <div class="col-4">
                                      <h4> {{$Total_Customer}}</h4>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <div class="card" style="height: 90px;">
                               <div class="row py-3 custom_heading">
                                   <div class="col-8 text-center">
                                      <h4> Shipment Companies</h4>
                                   </div>
                                   <div class="col-4">
                                      <h4> {{$total_shipment_users}}</h4>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <div class="card" style="height: 90px;">
                               <div class="row py-3 custom_heading">
                                   <div class="col-8 text-center">
                                      <h4> Clearance Agencies</h4>
                                   </div>
                                   <div class="col-4">
                                      <h4> {{$total_clearace_users}}</h4>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <div class="card" style="height: 90px;">
                               <div class="row py-3 custom_heading">
                                   <div class="col-8 text-center">
                                      <h4> Products</h4>
                                   </div>
                                   <div class="col-4">
                                      <h4> {{$Total_products}}</h4>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <div class="card" style="height: 90px;">
                               <div class="row py-3 custom_heading">
                                   <div class="col-8 text-center">
                                      <h4> Published Products</h4>
                                   </div>
                                   <div class="col-4">
                                      <h4> {{$Total_Adds_Product}}</h4>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <div class="card" style="height: 90px;">
                               <div class="row custom_heading">
                                   <div class="col-8 text-center">
                                      <h4> Advertisement</h4>
                                   </div>
                                   <div class="col-4">
                                      <h4> {{$adverttisemnet}}</h4>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <div class="card" style="height: 90px;">
                               <div class="row py-3 custom_heading">
                                   <div class="col-8 text-center">
                                      <h4> Packages</h4>
                                   </div>
                                   <div class="col-4">
                                      <h4> {{$Total_Pacakges}}</h4>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <div class="card" style="height: 90px;">
                               <div class="row py-3 custom_heading">
                                   <div class="col-8 text-center">
                                      <h4> Orders</h4>
                                   </div>
                                   <div class="col-4">
                                      <h4> {{$order}}</h4>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <div class="card" style="height: 90px;">
                               <div class="row py-3 custom_heading">
                                   <div class="col-8 text-center">
                                      <h4> Customer Request</h4>
                                   </div>
                                   <div class="col-4">
                                      <h4> {{$customer_withdraw}}</h4>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <div class="card" style="height: 90px;">
                               <div class="row py-3 custom_heading">
                                   <div class="col-8 text-center">
                                   <h4> User  Request</h4>
                                   </div>
                                   <div class="col-4">
                                      <h4> {{$user_withdraw}}</h4>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
