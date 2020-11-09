<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>JMROSEL - Login</title>
<style>
  body {font-family: Arial, Helvetica, sans-serif;}
  * {box-sizing: border-box;}

  .input-container {
    display: -ms-flexbox; /* IE10 */
    display: flex;
    width: 100%;
    margin-bottom: 15px;
  }

  .icon {
    padding: 10px;
    background: dodgerblue;
    color: white;
    min-width: 50px;
    text-align: center;
  }

  .input-field {
    width: 100%;
    padding: 10px;
    outline: none;
  }

  .input-field:focus {
    border: 2px solid dodgerblue;
  }

  /* Set a style for the submit button */
  .btn {
    background-color: dodgerblue;
    color: white;
    padding: 15px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
  }

  .btn:hover {
    opacity: 1;
  }
</style>
</head>
<body>

  <body style="
    background: black;
">


  <form method="POST" class="login-form" style="max-width:500px;margin:auto" action="{{ route('login') }}">
    @csrf
  <br><br><br><br><br><br><br><br>
  <img src="/images/logo.png" width="100%">
  <br><br>
  

  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input id="email" type="text" class="input-field @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" Placeholder="email" equired autocomplete="email">
      @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
      @enderror
  </div>
  
  <div class="input-container">
    <i class="fa fa-key icon"></i>
 
    <input id="password" type="password"  Placeholder="Password" class="input-field @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>

  <button type="submit" class="btn">Login</button>
</form>

</body>
</html>
