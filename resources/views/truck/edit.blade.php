@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Edit Truck</div>

               <div class="card-body">
                <form method="POST" action="{{route('truck.update',[$truck])}}">
                    <div class="form-group">
                        <label>Maker</label>
                        <input type="text" class="form-control" name="truck_maker" value="{{old('truck_maker',$truck->maker)}}">
                        <small class="form-text text-muted">Kurejo pavadinimas</small>
                      </div>

                      <div class="form-group">
                        <label>Plate</label>
                        <input type="text" class="form-control" name="truck_plate" value="{{old('truck_plate',$truck->plate)}}">
                        <small class="form-text text-muted">Platforma</small>
                      </div>

                      <div class="form-group">
                        <label> Make Year</label>
                        <input type="text" class="form-control" name="truck_make_year" value="{{old('truck_make_year',$truck->make_year)}}">
                        <small class="form-text text-muted">Metai</small>
                      </div>

                      <div class="form-group">
                        <label>Mechanic Notices</label>
                        <textarea type="text" class="form-control" name="truck_mechanic_notices" value="{{old('truck_mechanic_notices',$truck->mechanic_notices)}}" id="summernote"></textarea>
                        <small class="form-text text-muted">Aprasymas</small>
                      </div>
                      <div class="form-group">
                        <select name="mechanic_id">
                            @foreach ($mechanics as $mechanic)
                                <option value="{{$mechanic->id}}" @if($mechanic->id == $truck->mechanic_id) selected @endif>
                                    {{$mechanic->name}} {{$mechanic->surname}}
                                </option>
                            @endforeach
                    </select>
                      </div>
                    @csrf
                    <button type="submit" class="btn btn-primary">EDIT</button>
                </form>
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