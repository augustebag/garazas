@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Edit Mechanics</div>

               <div class="card-body">
                <form method="POST" action="{{route('mechanic.update',$mechanic)}}">
                    Name: <input type="text" name="mechanic_name" value="{{$mechanic->name}}">
                    Surname: <input type="text" name="mechanic_surname" value="{{$mechanic->surname}}">
                    @csrf
                    <button type="submit">EDIT</button>
                 </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection

@section('title') Edit Mechanic @endsection

