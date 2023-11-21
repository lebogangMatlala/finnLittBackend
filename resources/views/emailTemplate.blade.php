
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
</head>

    <body>
    <p><strong>Name:</strong>{{ $datareceived['name'] }}</p>
    <p><strong>Name:</strong>{{$datareceived['email']}}</p>
    <br>
    <h2>Message</h2>
    $datareceived['message']
</body>
</html>