@include('home.header')
<!-- ***** Header Area End ***** -->
<body >
    @if (session()->has('message'))
      <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert">x</button>
          {{session()->get('message')}}
      </div>
    @endif

    <div class="container-fluid">
      <div class="container" style="height:640px;">
    
          <h1 style="text-align:center; padding-top:150px; padding-bottom:30px; font-size:40px;">All Reservations</h1>
              <table class="table table-striped table table-hover table table-bordered">
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone no</th>
                  <th>Guests</th>
                  <th>Date</th>
                  <th>Massage</th>
                  <th>Status</th>
                  <th>Cancel</th>                    
                </tr>
                @foreach($reservation as $reservation)
                <tr>
                  <td>{{$reservation->name}}</td>
                  <td>{{$reservation->email}}</td>
                  <td>{{$reservation->phone}}</td>
                  <td>{{$reservation->guests}}</td>
                  <td>{{$reservation->date}}</td>
                  <td>{{$reservation->message}}</td>
                  <td>{{$reservation->status}}</td>
                  <td>
                  @if($reservation->status=='In pending')  
                    <a href="{{url('/cancel_reservation',$reservation->id)}}" class="btn btn-danger" 
                    onclick="return confirm('Are you sure to Cancel Reservation')">Cancel</a>
                  @else
                     <p style="color:red;">Canceled</p>
                  @endif
                  </td>
                </tr>
                @endforeach

               </table>
    </div>    
  </div>  
</body>    
 @include('home.footer')