<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
</head>
<body>
   <h1> Mechanic: {{$truck->truckAuthor->name}} {{$truck->truckAuthor->surname}} {{$truck->mechanic_notice}} </h1>
   <div class="form-group">
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
</body>
</html>