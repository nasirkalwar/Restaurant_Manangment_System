@include('admin.header')
<body>
    <div class="container-scroller">
      @include('admin.slidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
        @include('admin.body')
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
       @include('admin.footer')