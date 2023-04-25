<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <title>DASHMIN - Bootstrap Admin Template</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <meta content="" name="keywords">
   <meta content="" name="description">

   <!-- Favicon -->
   <link href="img/favicon.ico" rel="icon">

   <link rel="stylesheet" href="./assets/themify-icons/themify-icons.css">

   <!-- Icon Font Stylesheet -->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">


   <!-- Customized Bootstrap Stylesheet -->
   <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">

   <!-- Template Stylesheet -->
   <link href="{{url('css/style.css')}}" rel="stylesheet">
</head>

<body>
   <!-- <div class="container-fluid position-relative bg-white d-flex p-0">
      -->


            <!-- Header -->
   <header>

   <div class="container">
         <div class="row menu">
            <div class="col-md-8 menu-left">
               <div class="logo">
                     <img src="./assets/img/Logo.png" alt="">
                     <h1>SALT</h1>
               </div>

               <ul class="menu-right">
                     <li><a href="">Tin tức</a></li>
                     <li><a href="">Khám phá</a></li>
                     <li><a href="">Tạo</a></li>
                     <li><a href="">Cộng đồng</a></li>
                     <li><a href="">Liên hệ</a></li>
               </ul>
            </div>

            <div class="col-md-4">
               <div class="setting">
                     <a class="connectwallet" href=""> <i class="ti ti-wallet"></i>Kết nối ví</a>
                     <a href=""> <i class="ti ti-shopping-cart"><sup>2</sup></i></a>
                     <a href=""> <i class="ti ti-bell"><sup>1</sup></i></a>
               </div>
            </div>
         </div>
   </div>
</header>
<!-- End header -->


   <!-- Content Start -->
   <div class="content">



      <!-- Sale & Revenue Start -->
      <div class="container-fluid pt-4 px-4">
         <div class="row g-4">
               <div class="col-sm-6 col-xl-3">
                  <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                     <i class="fa fa-chart-line fa-3x text-primary"></i>
                     <div class="ms-3">
                           <p class="mb-2">Giá NFT cao nhất</p>
                           <h6 class="mb-0">$1234</h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-xl-3">
                  <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                     <i class="fa fa-chart-bar fa-3x text-primary"></i>
                     <div class="ms-3">
                           <p class="mb-2">Số giao dịch NFT nhiều nhất</p>
                           <h6 class="mb-0">1234</h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-xl-3">
                  <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                     <i class="fa fa-chart-area fa-3x text-primary"></i>
                     <div class="ms-3">
                           <p class="mb-2">Số giao dịch NFT ít nhất</p>
                           <h6 class="mb-0">1234</h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-xl-3">
                  <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                     <i class="fa fa-chart-pie fa-3x text-primary"></i>
                     <div class="ms-3">
                           <p class="mb-2">Số lượng tài sản</p>
                           <h6 class="mb-0">34</h6>
                     </div>
                  </div>
               </div>
         </div>
      </div>
      <!-- Sale & Revenue End -->


      <!-- Sales Chart Start -->
      <div class="container-fluid pt-4 px-4">
         <div class="row g-4">
               <div class="col-sm-12 col-xl-6">
                  <div class="bg-light text-center rounded p-4">
                     <div class="d-flex align-items-center justify-content-between mb-4">
                           <h6 class="mb-0">Worldwide Sales</h6>
                           <a href="">Tất cả</a>
                     </div>
                     <canvas id="worldwide-sales"></canvas>
                  </div>
               </div>
               <div class="col-sm-12 col-xl-6">
                  <div class="bg-light text-center rounded p-4">
                     <div class="d-flex align-items-center justify-content-between mb-4">
                           <h6 class="mb-0">Salse & Revenue</h6>
                           <a href="">Tất cả</a>
                     </div>
                     <canvas id="salse-revenue"></canvas>
                  </div>
               </div>
         </div>
      </div>
      <!-- Sales Chart End -->


      <!-- Recent Sales Start -->
      <div class="container-fluid pt-4 px-4">
         <div class="bg-light text-center rounded p-4">
               <div class="d-flex align-items-center justify-content-between mb-4">
                  <h6 class="mb-0">TOP 5 NFT BÁN CHẠY NHẤT</h6>
                  <a href="">Tất cả</a>
               </div>
               <div class="table-responsive">
                  <table class="table table-dark">
                     <thead>
                     <tr>
                        <th scope="col">Top</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Thể loại</th>
                        <th scope="col">Tác giả</th>
                        <th scope="col">Chi tiết</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <th scope="row">1</th>
                        <th>
                           <img src="https://99designs-blog.imgix.net/blog/wp-content/uploads/2021/05/merlin_184196631_939fb22d-b909-4205-99d9-b464fb961d32-superJumbo.jpeg?auto=format&q=60&fit=max&w=930" alt="">
                        </th>
                        <td>Bootstrap 4 CDN and Starter Template</td>
                        <td>Cristina</td>
                        <td>913</td>
                        <td>2.846</td>
                     </tr>
                     <tr>
                        <th scope="row">1</th>
                        <th>
                           <img src="https://99designs-blog.imgix.net/blog/wp-content/uploads/2021/05/merlin_184196631_939fb22d-b909-4205-99d9-b464fb961d32-superJumbo.jpeg?auto=format&q=60&fit=max&w=930" alt="">
                        </th>
                        <td>Bootstrap 4 CDN and Starter Template</td>
                        <td>Cristina</td>
                        <td>913</td>
                        <td>2.846</td>
                     </tr>

                     <tr>
                        <th scope="row">1</th>
                        <th>
                           <img src="https://99designs-blog.imgix.net/blog/wp-content/uploads/2021/05/merlin_184196631_939fb22d-b909-4205-99d9-b464fb961d32-superJumbo.jpeg?auto=format&q=60&fit=max&w=930" alt="">
                        </th>
                        <td>Bootstrap 4 CDN and Starter Template</td>
                        <td>Cristina</td>
                        <td>913</td>
                        <td>2.846</td>
                     </tr>

                     <tr>
                        <th scope="row">1</th>
                        <th>
                           <img src="https://99designs-blog.imgix.net/blog/wp-content/uploads/2021/05/merlin_184196631_939fb22d-b909-4205-99d9-b464fb961d32-superJumbo.jpeg?auto=format&q=60&fit=max&w=930" alt="">
                        </th>
                        <td>Bootstrap 4 CDN and Starter Template</td>
                        <td>Cristina</td>
                        <td>913</td>
                        <td>2.846</td>
                     </tr>

                     <tr>
                        <th scope="row">1</th>
                        <th>
                           <img src="https://99designs-blog.imgix.net/blog/wp-content/uploads/2021/05/merlin_184196631_939fb22d-b909-4205-99d9-b464fb961d32-superJumbo.jpeg?auto=format&q=60&fit=max&w=930" alt="">
                        </th>
                        <td>Bootstrap 4 CDN and Starter Template</td>
                        <td>Cristina</td>
                        <td>913</td>
                        <td>2.846</td>
                     </tr>
                     
                  </tbody>
                  </table>
               </div>
         </div>
      </div>
      <!-- Recent Sales End -->




   </div>
   <!-- Content End -->


   <!-- Back to Top -->
   <!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a> -->
   <!-- </div> -->

   <!-- JavaScript Libraries -->
   <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
   <script src="{{ url('lib/chart/chart.min.js') }}"></script>
   <script src="{{ url('lib/easing/easing.min.js') }}"></script>
   <script src="{{ url('lib/waypoints/waypoints.min.js') }}"></script>
   <script src="{{ url('lib/owlcarousel/owl.carousel.min.js') }}"></script>
   <script src="{{ url('lib/tempusdominus/js/moment.min.js') }}"></script>
   <script src="{{ url('lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
   <script src="{{ url('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

   <!-- Template Javascript -->
   <script src="{{url('js/main.js')}}"></script>
</body>

</html>
