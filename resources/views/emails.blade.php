<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
     <link rel ="stylesheet" href="{{mix('css/app.css')}}">
    <title></title>
  </head>
  <body>
    <h1 class="brown">Name: {{$details['name']}}</h1>

    <h1 class="brown">Email: {{$details['email']}}</h1>

    <h1 class="brown">Subject: {{$details['subject']}}</h1>

    <h1 class="brown">Message: {{$details['message']}}</h1>
  </body>
</html>
