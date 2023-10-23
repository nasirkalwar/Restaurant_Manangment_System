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

                    <h1 class="title_deg">Add Chef</h1>
                        <form action="{{url('chef')}}" method="post">
                            @csrf
                            <div class="div_center">
                                <label>Chef Name</label>
                                <Input type="text" name="name" placeholder="write chef name">
                            </div>
                            <div class="div_center">
                                <label>Chef Description</label>
                                <Input type="text" name="description" placeholder="write Chef description">
                            </div>
                            <div class="div_center">
                            <label>Chef Category</label>
                                <Select name="category"style="color:black; width:200px;">
                                    <option vlaue="select">--Select--</option>
                                    <option vlaue="spacy">Cookie Chef</option>
                                    <option vlaue="meel">Meel Chef</option>
                                    <option vlaue="sweet">Sweet Chef</option>
                                    <option vlaue="sweet">Pastry Chef</option>
                                </Select>
                            </div>
                            <div class="div_center">
                                <label>Chef Image</label>
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