<html>
<head>
   <title>Travel Management System</title>
</head>
<body>
   <h1>Available Trips</h1>
   <table>
      <tr>
         <th>Trip Name</th>
         <th>Destination</th>
         <th>Price</th>
         <th>Available Seats</th>
      </tr>
      @foreach($trips as $trip)
      <tr>
         <td>{{ $trip->name }}</td>
         <td>{{ $trip->destination }}</td>
         <td>{{ $trip->price }}</td>
         <td>{{ $trip->available_seats }}</td>
      </tr>
      @endforeach
   </table>
</body>
</html>
