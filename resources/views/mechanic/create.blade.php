<form method="POST" action="{{route('mechanic.store')}}">
    Name: <input type="text" name="mechanic_name">
    Surname: <input type="text" name="mechanic_surname">
    @csrf
    <button type="submit">ADD</button>
 </form>
 