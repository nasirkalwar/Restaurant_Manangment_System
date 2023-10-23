@include('admin.header')
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

                    <h1 class="title_deg">Add Meal Menu</h1>
                        <form action="{{url('add_meal')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="div_center">
                                <label>Meal Title</label>
                                <Input type="text" name="title" placeholder="write meal title">
                            </div>
                            <div class="div_center">
                                <label>Description</label>
                                <Input type="text" name="description" placeholder="write meal description">
                            </div>
                            <div class="div_center">
                            <label>Meal Type</label>
                                <Select name="type"style="color:black; width:200px;">
                                    <option vlaue="select">--Select Type--</option>
                                    <option vlaue="break-fast">Break-Fast</option>
                                    <option vlaue="lanch">Lanch</option>
                                    <option vlaue="dinner">Dinner</option>
                                </Select>
                            </div>
                            <div class="div_center">
                                <label>Price</label>
                                <Input type="number" name="price" placeholder="write meal price">
                            </div>
                            <div class="div_center">
                                <label>Image</label>
                                <Input type="file" name="file">
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