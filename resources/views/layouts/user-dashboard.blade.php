<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <link rel="shortcut icon" href="{{asset('images/lab.png')}}" type="">

  <title> Lab Automation </title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('Dash/assets/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('Dash/assets/modules/fontawesome/css/all.min.css')}}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{asset('Dash/assets/modules/bootstrap-daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" href="{{asset('Dash/assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
  <link rel="stylesheet" href="{{asset('Dash/assets/modules/select2/dist/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('Dash/assets/modules/jquery-selectric/selectric.css')}}">
  <link rel="stylesheet" href="{{asset('Dash/assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}">
  <link rel="stylesheet" href="{{asset('Dash/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('Dash/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('Dash/assets/css/components.css')}}">

  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
  
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>

<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
         
        </form>
        <ul class="navbar-nav navbar-right">
          
          
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{asset('Dash/assets/img/avatar/avatar-1.png')}}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->name }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">              
              <a href="{{ route('profile.show') }}" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>         
               <div class="dropdown-divider"></div>
                             <form method="POST" action="{{ route('logout') }}" x-data>
                                 @csrf

                                <button type="submit" class=" btn dropdown-item has-icon
								                 " @click.prevent="$root.submit();">
                                 <i class="fas fa-sign-out-alt" style="font-size:17px;color:red;"></i>   {{ __('Log Out') }}
                                </button>
                             </form>    
            </div>
           

          </li>
        </ul>
        
      </nav>
      <div class="main-sidebar sidebar-style-2 bg-dark">
        <aside id="sidebar-wrapper bg-dark">
          <div class="sidebar-brand">
          <!-- <a href="{{url('')}}"><img src="{{ asset('images/logo.png') }}" alt="logo" style="width: 90px; height: 50px;"></a> -->
          <a href="{{url('')}}" class="text-light h6">LAB <span class="text-primary">AUTOMATION</span></a> 
   
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html" class="text-light">LA</a>
          </div>
         
          <ul class="sidebar-menu">
          <li><a class="nav-link" href="{{url('/userdashboard')}}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Product</span></a>
              <ul class="dropdown-menu">
              <li class="nav-item"> <a class="nav-link" href="{{url('/List/product')}}">Add Products</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{url('/product/Type')}}">Product Type</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{url('/product/category')}}">Product Category</a></li>
              </ul>
            </li>
            
            <li><a class="nav-link" href="{{url('/test')}}"><i class="fas fa-fire"></i> <span>Testing Product</span></a></li>
            <li><a class="nav-link" href="{{url('/')}}"><i class="fas fa-fire"></i> <span>Veiw Website</span></a></li>
          </ul>

        
      </div>
      <div class="main-content">
      <section class="section">
      
      @yield('main-section')
      </section>
      </div>
      <footer class="main-footer">
      <div class="footer-left">
           &copy; 2024 <div class="bullet"></div> Made By <a href=""> Kinza-Ul-Mehak &Tania</a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{asset('Dash/assets/modules/jquery.min.js')}}"></script>
  <script src="{{asset('Dash/assets/modules/popper.js')}}"></script>
  <script src="{{asset('Dash/assets/modules/tooltip.js')}}"></script>
  <script src="{{asset('Dash/assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('Dash/assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
  <script src="{{asset('Dash/assets/modules/moment.min.js')}}"></script>
  <script src="{{asset('Dash/assets/js/stisla.js')}}"></script>
  
   <!-- JS Libraies -->
   <script src="{{asset('Dash/assets/modules/cleave-js/dist/cleave.min.js')}}"></script>
  <script src="{{asset('Dash/assets/modules/cleave-js/dist/addons/cleave-phone.us.js')}}"></script>
  <script src="{{asset('Dash/assets/modules/jquery-pwstrength/jquery.pwstrength.min.js')}}"></script>
  <script src="{{asset('Dash/assets/modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
  <script src="{{asset('Dash/assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
  <script src="{{asset('Dash/assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
  <script src="{{asset('Dash/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
  <script src="{{asset('Dash/assets/modules/select2/dist/js/select2.full.min.js')}}"></script>
  <script src="{{asset('Dash/assets/modules/jquery-selectric/jquery.selectric.min.js')}}"></script>
 
  <!-- Page Specific JS File -->
  <script src="{{asset('Dash/assets/js/page/forms-advanced-forms.js')}}"></script>
  <!-- Template JS File -->
  <script src="{{asset('Dash/assets/js/scripts.js')}}"></script>
  <script src="{{asset('Dash/assets/js/custom.js')}}"></script>

  <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
   <script>
    let table = new DataTable('#myTable');
   </script>
</body>
</html>    