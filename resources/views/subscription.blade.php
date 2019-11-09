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
    <button class="btn btn-primary btn-lg" target="_blank"><a href="{{url('user/verify', $verifyUser->token)}}">Verify Email</a></button>
      <br/>
      Please click on the below link to Un-Subscribe your email account
    <button class="btn btn-primary btn-lg" target="_blank"><a href="{{url('user/unsubscribe', $verifyUser->token)}}">Unsubscribe Email</a></button>
  </body>
</html>