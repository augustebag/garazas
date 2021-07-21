<form method="POST" action="{{route('mechanic.update',$mechanic)}}">
    Name: <input type="text" name="mechanic_name" value="{{$mechanic->name}}">
    Surname: <input type="text" name="mechanic_surname" value="{{$mechanic->surname}}">
    @csrf
    <button type="submit">EDIT</button>
 </form>
 