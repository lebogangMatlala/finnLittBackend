
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
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
    <link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <body>


    <h1>Contact Form</h1>
<form class="cf" action="/contact" method="post">
@csrf
  <div class="half left cf">
    <input type="text" id="input-name" placeholder="Name" name="name">
    <input type="email" id="input-email" placeholder="Email address"  name="email">
    <input type="text" id="input-subject" placeholder="Subject" name="subject"> 
  </div>
  <div class="half right cf">
    <textarea name="message" type="text" id="input-message" placeholder="Message"></textarea>
  </div>  
  <input type="submit" value="Submit" id="input-submit">
</form>

</body>