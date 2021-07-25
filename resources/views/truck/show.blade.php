@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">{{$truck->maker}}</div>
               <div class="card-body">
                    <div class="form-group">
                        <label>Maker</label>
                        <small class="form-text text-muted">Truck maker: {{$truck->maker}}</small>
                      </div>
                      <div class="form-group">
                        <label>Plate</label>
                        <small class="form-text text-muted">Platforma: {{$truck->plate}}</small>
                      </div>
                      <div class="form-group">
                        <label> Make Year</label>
                        <small class="form-text text-muted">Metai {{$truck->make_year}}</small>
                      </div>
                      <div class="form-group">
                        <small class="form-text text-muted">Aprasymas: <div> {{$truck->mechanic_notice}}</div></small>
                      </div>
                      <div class="form-group">
                        <small class="form-text text-muted">Select Mechanic from the list {{$truck->truckAuthor->name}} {{$truck->truckAuthor->surname}} {{$truck->mechanic_notice}}</small>
                      </div>
                      <a href="{{route('truck.edit',[$truck])}}" class="btn btn-primary">Edit</a>
                      <a href="{{route('truck.pdf',[$truck])}}" class="btn btn-primary">PDF</a>
               </div>
           </div>
       </div>
   </div>
</div>
<script>
    $(document).ready(function() {
       $('#summernote').summernote();
     });
    </script>
    
@endsection

@section('title') Edit Truck @endsection