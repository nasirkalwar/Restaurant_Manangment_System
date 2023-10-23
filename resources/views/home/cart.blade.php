@include('home.header')
<!-- ***** Header Area End ***** -->
    @if (session()->has('message'))
      <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert">x</button>
          {{session()->get('message')}}
      </div>
    @endif

    <div class="container-fluid">
      <div class="container" style="height:640px;">
    
          <h1 style="text-align:center; padding-top:150px; padding-bottom:30px; font-size:40px;">ALl Cart Atoms</h1>
              <table class="table table-striped table table-hover table table-bordered">
                <tr>
                  <th>Order User ID</th>
                  <th>Order User Name</th>
                  <th>Food ID</th>
                  <th>Food Name</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th>Remove</th>
                </tr>
      <form action="{{url('/confirm_order')}}" method="post">
        @csrf
                @foreach($cart as $cart)
                <tr>
                  <td>{{$cart->user_id}}</td>
                  <td>{{$cart->user_name}}</td>
                  <td>{{$cart->food_id}}</td>
                  <td>
                    <Input type="text" name="foodname[]" value="{{$cart->food_name}}" hidden="">
                    {{$cart->food_name}}
                  </td>
                  <td>
                    <Input type="text" name="quantity[]" value="{{$cart->quantity}}" hidden="" >
                    {{$cart->quantity}}
                  </td>
                  <td>
                    <Input type="text" name="price[]" value="{{$cart->price}}" hidden="">
                    {{$cart->price}}
                  </td>
                  <td><a href="{{url('/remove_cart',$cart->id)}}" class="btn btn-danger" 
                    onclick="return confirm('Are you sure to Remove food from cart')">Remove</a></td>
                </tr>
                @endforeach

               </table>
               <div align="center" style="padding:10px; background-color:grey;">
                   <button class="btn btn-primary" type="submit" id="order">Order Now</button>
                </div>
                <div id="apear" align="center" style="padding:10px;">
                  <div style="padding:10px;">
                      <Input type="text" name="name" requried="" placeholder="Write Name">
                  </div>
                  <div style="padding:10px;">
                      <Input type="number" name="number" requried="" placeholder="Write Phone Number">
                  </div>
                  <div style="padding:10px;">
                    <Input type="text" name="address" requried="" placeholder="Write Address">
                  </div>
                  <div style="padding:10px; background-color:grey;">
                    <button type="submit" class="btn btn-success">Order Confirm</button>
                    <button id="cancel" type="submit" class="btn btn-danger">Cancel</button>
                  </div>

                </div>  
</form>       
    </div>    
  </div>  

 @include('home.script')