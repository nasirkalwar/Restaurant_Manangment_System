<base href="/public">
@include('admin.header')
<base href="/public">
<style type="text/css">
        .title_deg
        {
            font-size:30px;
            font-weight:bold;
            padding:30px;
            text-align:center;
        }
    label
    {
        display:inline-block;
        width:200px;
        font-size:20px;
        color:white;
    }
    .div_center
    {
        text-align:center;
        padding-top:30px;
        color:black;
    }
</style>
<body>
    <div class="container-scroller">
        @include('admin.slidebar')
        <!-- partial -->
            <!-- partial:partials/_navbar.html -->
            @include('admin.navbar')
            <!-- partial -->

            <div class="container-fluid page-body-wrapper">
        
                <div class="content-wrapper">

                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        {{session()->get('message')}}
                    </div>

                @endif

                    <h1 class="title_deg">Send Reservation Mail</h1>
                        <form action="{{url('send_reservation_mail')}}" method="post">
                            @csrf
                            <div class="div_center">
                                <label>Mail Sender </label>
                                <Input type="text" value="Restaurent Admin">
                            </div>
                            <div class="div_center">
                                <label>Greetings</label>
                                <Input type="text" value="Greetings">
                            </div>
                            <div class="div_center">
                                <label>Reservation Message</label>
                                <Input type="text" name="message" placeholder="write reservation message or mail">
                            </div>
                            
                            <div class="div_center">
                            <Button type="submit" class="btn btn-success">Submit</Button>
                            </div>
                        </form>


                </div>
            </div>

    </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
       @include('admin.footer')