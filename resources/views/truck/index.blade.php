@foreach ($trucks as $truck)
  <a href="{{route('truck.edit',[$truck])}}">{{$truck->maker}} {{$truck->truckAuthor->name}} {{$truck->truckAuthor->surname}}</a>
  <form method="POST" action="{{route('truck.destroy', [$truck])}}">
   @csrf
   <button type="submit">DELETE</button>
  </form>
  <br>
@endforeach
