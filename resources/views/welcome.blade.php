
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


   <!-- Header -->

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" integrity="sha512-kIGQ2BYY0fn8U6qZUJhDTH2psV7sL9Xq3I7CHljBOEiZG7fTbhTlZIX7yf1luEHTJbsYX9gENjFpr38xHtBOvw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-NfLLKr2c0xAdTd3a3K5p5ue5FY5zRftXyKj5OawKGKTjjHXitcPZ3xNq3q74p5L5M5ql21xyJ9XzK6/30o6lA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>FinnLITT</title>

    <!-- bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!------ Include the above in your HEAD tag ---------->
    <script></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/welcome.css') }}"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


    

    <style>

    </style>
</head>

<body>

<div class="m-6">
    <nav class="shadow p-2 mb-5 bg-white rounded">
        <div class="container">
            <a href="#" class="navbar-brand">
                <img src="{{asset('assets/img/home/FLTlogo.png')}}" height="50" alt="Finn LITT Logo">
            </a>
           
            </div>
            
        </div>
    </nav>
</div>

<div class="container">

  <div class="row">
    <div class="col-md-6  justify-content-center ">
     <p>Introducing the finance learning App</p>
     <img src={{ asset('assets/img/home/FinnLitt_stacked_Logo.png') }} height="250" width= "250" >
    
    
     <p>*Disclaimer:We are not a Financial Service Provider</p>
     <div class="mobile">
     <div class="row">
    <div class="col-4">
    <a href="https://apps.apple.com/za/app/finnlitt/id6466396895"><img src="{{ asset('assets/img/home/Apple_Store.png') }}" class="img-fluid" style="border-radius: 15px;" height="50" alt="Finn LITT Logo"></a>
    </div>
    <div class="col-4">
    <a href="https://play.google.com/store/apps/details?id=com.finnlitt.finnlittApp&pcampaignid=web_share"><img src="{{ asset('assets/img/home/Google_App.png') }}" class="img-fluid" style="border-radius: 15px;" height="50" alt="Finn LITT Logo"></a>
    </div>
    <div class="col-4">
    <a  href="https://appgallery.huawei.com/app/C109244627"><img  src="{{ asset('assets/img/home/huawei_App.png') }}" class="img-fluid" style="border-radius: 15px;" height="50" alt="Finn LITT Logo"></a>
    </div>
  </div>

</div>
    </div>
    

    
    <div class="col-md-6">
    <img src={{ asset('assets/img/home/finnliit_welcome.png') }} height="430" width= "410">
 
    </div>
  </div>
</div>
</div>

<div class="gradient-bg">
<div class="container">


<div class="row">
        <div class="col-md-6 d-flex">
        <div class="card mt-3 mb-3">
<div class="card flex-fill">
  <div class="card-body">
    <h5 class="card-title">What</h4>
    <h3>    <span class="special">We</span> Do</h3>
    <img src={{ asset('assets/img/home/What_we_do.png') }} height="300" width= "300" >
    <p class="card-text">On this app, we will help you understand the adult things you will 
        need to manage such things as tax compliance or why a credit score is important. Our content is designed for the youth
         of South Africa. We've simplified it for those who are new to finance.</p>
    
</div>
  </div>
</div>
                </div>



        <div class="col-md-6 d-flex">
        <div class="card mt-3 mb-3">
<div class="card flex-fill">
  <div class="card-body">
    <h5 class="card-title">Who</h4>
    <h3>    <span class="special">We</span>Are</h3>
    <img src={{ asset('assets/img/home/Who_we_are.png') }} height="300" width= "300" >
    <p class="card-text">Our team is made up of finance experts who are passionate about helping and growing the youth in finacial literacy.
       We're committed to supporting you on your journey through life as an adult.</p>
    
  
  </div>
</div>
    </div>
    </div>
</div>



</div>


<footer class="footer-shadow">
    
     
   
    <div class="row">
    <div class="col-md-6">
<img src="{{asset('assets/img/home/FLTlogo.png')}}" height="50" alt="Finn LITT Logo">
</div>

<div class="col-md-5  justify-content-center ">
  <div class="row">

  
    <p><b>Download now:</b></p>
     <div class="row">
     <div class="container">
<div class="row">
        <div class="col-4">
        <a href="https://apps.apple.com/za/app/finnlitt/id6466396895"><img src="{{ asset('assets/img/home/Apple_Store.png') }}" class="img-fluid" style="border-radius: 15px;" height="50" alt="Finn LITT Logo"></a>
        </div>
        <div class="col-4">
        <a href="https://play.google.com/store/apps/details?id=com.finnlitt.finnlittApp&pcampaignid=web_share"><img src="{{ asset('assets/img/home/Google_App.png') }}" class="img-fluid" style="border-radius: 15px;" height="50" alt="Finn LITT Logo"></a>
        </div>
        <div class="col-4">
        <a  href="https://appgallery.huawei.com/app/C109244627"><img  src="{{ asset('assets/img/home/huawei_App.png') }}" class="img-fluid" style="border-radius: 15px;" height="50" alt="Finn LITT Logo"></a>
        </div>
</div>

</br>
<div class="row">
        <div class="col-4">
        <a  href="/user-privacy-policy" class="custom-link">Privacy Policy</a>
        </div>
        <div class="col-4">
        <a href="/terms-and-conditions" class="custom-link">Terms of Use</a>
        </div>
        <div class="col-4">
        <a id  href=""  class="custom-link">Contact us</a>
        </div>
</div>
       
</div>       



</div>
</div>

</footer>


  </div>
</div>





  


 