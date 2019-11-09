<!DOCTYPE html>
<html>
  <head>
    <title>Welcome Email</title>
  </head>
  <body>
  	
    <h2>Welcome to the site {{$user['email']}}</h2>
    <br/>
    Your registered email-id is {{$user['email']}} , Please click on the below link to verify your email account
    <br/>
    <button class="btn btn-primary btn-lg" target="_blank"><a href="{{url('user/verifyuser', $verifyUser->token)}}">Verify Email</a></button>
      
  </body>
</html>