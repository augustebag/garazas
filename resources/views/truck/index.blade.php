@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">All Trucks</div>

               <div class="card-body">
                <ul class="list-group">
                @foreach ($trucks as $truck)
                <li class="list-group-item">
                    <div class="list-container">
                        <div class="list-container__content">
                            <span class="list-container__content__truck">{{$truck->maker}} plate: {{$truck->plate}}</span>
                            <span class="list-container__content__mechanic">{{$truck->truckAuthor->name}} {{$truck->truckAuthor->surname}}</span>
                        </div>
                        <div class="list-container__buttons">
                            <a href="{{route('truck.edit',[$truck])}}" class="btn btn-primary">Edit</a>
                            <form method="POST" action="{{route('truck.destroy', [$truck])}}">
                                @csrf
                                <button type="submit" class="btn btn-danger">DELETE</button>
                            </form>
                        </div>
                    </div>
                </li>
              @endforeach
                </ul>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection

@section('title') All Trucks @endsection