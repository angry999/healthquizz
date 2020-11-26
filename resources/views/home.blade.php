<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="{{ csrf_token() }}">
   <script>
         window.Laravel = {
            csrfToken: '{{ csrf_token() }}'
      }
   </script>

<title>Radiant Shenti Body Constitution Quiz</title>
<link rel="icon" type="image/png" href="{{ asset('material') }}/img/logo.jpg">
    
<link rel="stylesheet" href="{{ asset('demo/bootstrap.min.css') }}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

<link rel="stylesheet" href="{{ asset('demo/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('demo/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('demo/cubeportfolio.min.css') }}">
<link rel="stylesheet" href="{{ asset('demo/jquery.fancybox.min.css') }}">
<link rel="stylesheet" href="{{ asset('demo/jquery.background-video.css') }}">
<link rel="stylesheet" href="{{ asset('demo/settings.css') }}">
<link rel="stylesheet" href="{{ asset('demo/layers.css') }}">
<link rel="stylesheet" href="{{ asset('demo/navigation.css') }}">

<link rel="stylesheet" href="{{ asset('demo/style.css') }}">
<style>
   i.fa.fa-facebook, i.fa.fa-pinterest, i.fa.fa-instagram{
      border-radius: 100%;
      font-size: 28px;
      height: 38px;
      line-height: 40px;
      margin: 5px;
      text-align: center;
      width: 38px;
   }
   i.fa.fa-facebook{
    /* border: 1px solid #3B5998; */
   color: #3B5998;
   }
   i.fa.fa-pinterest{
    /* border: 1px solid #00aced; */
   color: #00aced;
   }
   i.fa.fa-instagram{
    /* border: 1px solid #833ab4; */
   color: #833ab4;
}
</style>
</head>
<body  data-spy="scroll" data-target=".navbar" data-offset="90">

<!--PreLoader-->
<div class="loader">
   <div class="loader-inner">
      <img src="{{ asset('demo/Preloader_3.gif') }}" alt="">
   </div>
</div>
<!--PreLoader Ends-->

<!-- header -->
<div class="site-header">
   <nav class="navbar navbar-expand-lg bg-transparent-light static-nav">
      <div class="container">
         <a class="navbar-brand hover-effect" href="#">
         <img style="width:80px;" src="{{ asset('material') }}/img/logo.jpg" alt="logo">
         </a>
         <button class="navbar-toggler navbar-toggler-right collapsed d-none" type="button" data-toggle="collapse" data-target="#xenav">
            <span> </span>
            <span> </span>
            <span> </span>
         </button>
         <div class="collapse navbar-collapse" id="xenav">
            <ul class="navbar-nav ml-auto">
            <ul class="navbar-nav w-100"> 
               <li class="nav-item">
                  <a class="nav-link" href="https://yourelementalwisdom.com"  target="_blank">Radiant Shenti</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#our-service">Our Service</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#blog">Understanding</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#contactus">Contact Us</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="/login">Admin</a>
               </li>
            </ul>
            </ul>
         </div>
      </div>

      <!--side menu open button-->
      <a href="javascript:void(0)" class="d-lg-inline-block sidemenu_btn" id="sidemenu_toggle">
          <span></span> <span></span> <span></span>
       </a>
   </nav>

   <!-- side menu -->
   <div class="side-menu">
      <div class="inner-wrapper">
         <span class="btn-close" id="btn_sideNavClose"><i></i><i></i></span>
         <nav class="side-nav">
            <ul class="navbar-nav w-100"> 
               <li class="nav-item">
                  <a class="nav-link" href="https://yourelementalwisdom.com"  target="_blank">Radiant Shenti</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#our-service">Our Service</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#blog">Understanding</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#contactus">Contact Us</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="/login">Admin</a>
               </li>
            </ul>
         </nav>

         <div class="side-footer w-100">
            <ul class="social-icons-simple white top40">
            <span><a href="https://www.facebook.com/yourelementalwisdom" class="btn social-icon" data-abc="true"><i class="fa fa-facebook btn-round"></i></a></span>
                  <span><a href="https://www.pinterest.com/yourelementalwisdom" class="btn social-icon" data-abc="true"><i class="fa fa-pinterest btn-round" style="color: white"></i></a></span>
                  <span><a href="https://www.instagram.com/yourelementalwisdom/" class="btn social-icon" data-abc="true"><i class="fa fa-instagram btn-round"></i></a></span>
         </ul>
         <p class="whitecolor">&copy; 2020 Radiant Shenti Body Constitution Quick Assessment</p>
         </div>
      </div>
   </div>
   <a id="close_side_menu" href="javascript:void(0);"></a>
   <!-- End side menu -->
    </div>
<!-- header -->


<!--Ful Screen hero Banner-->
<section class="no-padding wow fadeIn no-transition" id="home">
   
</section>
<!-- end Ful Screen hero Banner --> 
  
<!--Some Feature -->  
<section id="our-service" class="padding single-feature">
   <div class="container">
      <div class="row">
         <div class="col-md-6 col-sm-7 text-md-left text-center wow fadeInLeft" data-wow-delay="300ms">
            <div class="heading-title heading_space bottom20">
               <span class="bottom20"><b>{{$top_title}}</b></span>  
               <h3 class="darkcolor bottom10">{{$top_title_body}} </h3>
            </div>
            <p class="bottom35">{{$top_text1}}  </p>
            <p class="bottom35">{{$top_text2}}    </p>
            <p>{{$top_text3}}</p>
            
            <div class="col-md-12 col-sm-12" style="text-align: center;">
                  <a href="/quizz" class="button btnprimary" style="margin:10px;">   LINK TO QUIZ   </a>
            </div>
            
         </div>
         
         <div class="col-md-6 col-sm-6 text-center wow fadeInRight" data-wow-delay="350ms">
            <div class="image hover-effect" top50"><img style="height:360px" alt="SEO" src="{{ 'https://radiantshentiquiz.com/healthquizz/public/uploads/'.$top_image }}"></div>
         </div>
      </div>
   </div>
</section>
<!--Some Feature ends-->          
   
<section id="blog" class="half-section bglight">
   <div class="container">
      <div class="row">
         <div class="col-md-6 col-sm-6 text-center wow">
               <div class="image top50 hover-effect text-center">
                  <img style="height:360px" src="{{ 'https://radiantshentiquiz.com/healthquizz/public/uploads/'.$bottom_image}}" alt="our blog" class="equalheight" />
               </div>
            </div>
            <div class="col-md-6 col-sm-6">
               <div class="split-box text-center center-block equalheight container-padding">
                  <div class="heading-title padding_half wow fadeInUp" data-wow-delay="400ms">
                     <span class="bottom20"><b>{{$bottom_title}}</b></span>
                        <h2 class="darkcolor"></h2>
                        <p class="bottom20" style="text-align: left">{{$bottom_text1}} </p>
                        <p style="text-align: left">{{$bottom_text2}} </p>
                        <p style="text-align: left">{{$bottom_text3}} </p>
                        <div class="col-md-12 col-sm-12" style="text-align: center;">
                        
                              <a href="/quizz" class="button btnprimary" style="margin:10px;">   LINK TO QUIZ   </a>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="contactus" class="padding_top">
   <div class="container">
      <div class="row">
        <div class="col-md-12">
           <div class="heading-title heading_space wow fadeInUp" data-wow-delay="300ms">
               <span>Lets Get In Touch</span>
               <h2 class="darkcolor">Contact US</h2>
            </div>
        </div>
         
         <div class="col-md-12 margin_bottom wow fadeInUp" data-wow-delay="350ms">
            <p> {{ $contact_us}}</p>
           <!--  <p> Want a personalized food plan?</p>
            <p> We’re here to help!</p> -->
            <div class="row">
               <div class="col-md-4 col-sm-6 our-address top40">
                  <h5 class="bottom25">Our Support</h5>
                  <p class="bottom15"><span style="color:#444444">Email Address:</span> <span style="color:#666666">healthquiz@radiantshenti.com</span> </p>
               </div> 
               <div class="col-md-4 col-sm-6 our-address top40">
                  <h5 class="bottom25">Our Website</h5>
                  <p class="bottom15"><span style="color:#444444">URL:</span> <a href="https://radiantshenti.com" style="color:#666666">www.radiantshenti.com</a> </p>
               </div>
               <div class="col-md-4 col-sm-6 our-address top40">
                  <h5 class="bottom25" style="padding-left:30px;">Follow Us</h5>
                  
                  <span><a href="https://www.facebook.com/yourelementalwisdom" class="btn social-icon" data-abc="true"><i class="fa fa-facebook btn-round"></i></a></span>
                  <span><a href="https://www.pinterest.com/yourelementalwisdom" class="btn social-icon" data-abc="true"><i class="fa fa-pinterest btn-round"></i></a></span>
                  <span><a href="https://www.instagram.com/yourelementalwisdom/" class="btn social-icon" data-abc="true"><i class="fa fa-instagram btn-round"></i></a></span>
                  
               </div>
            </div>
         </div> 
      </div>
   </div>
   
   <!--Location Map here-->
</section>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('demo/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('demo/functions.js') }}"></script>
</body>
</html>