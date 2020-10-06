<!DOCTYPE html>
<html lang="en">
<style>
          @import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");
        .login-block{
            background: #62a2de;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to bottom, #FFB88C, #62a2de);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to bottom, #FFB88C, #62a2de); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        float:left;
        width:100%;
        padding : 150px 150px 200px 150px;
        }
        .banner-sec{background:url("/images/img2.jpg") no-repeat left bottom; background-size:cover; min-height:500px; border-radius: 0 10px 10px 0; padding:0;}
        .container{background:#fff; border-radius: 10px; box-shadow:15px 20px 0px rgba(0,0,0,0.1);}
        .carousel-inner{border-radius:0 10px 10px 0;}
        .carousel-caption{text-align:left; left:5%;}
        .login-sec{padding: 50px 30px; position:relative;}
        .login-sec .copy-text{position:absolute; width:80%; bottom:20px; font-size:13px; text-align:center;}
        .login-sec .copy-text i{color:#62a2de;}
        .login-sec .copy-text a{color:#62a2de;}
        .login-sec h2{margin-bottom:30px; font-weight:800; font-size:30px; color: #62a2de;}
        .login-sec h2:after{content:" "; width:100px; height:5px; background:#62a2de; display:block; margin-top:20px; border-radius:3px; margin-left:auto;margin-right:auto}
        .btn-login{background: #62a2de; color:#fff; font-weight:600;}
        .banner-text{width:70%; position:absolute; bottom:40px; padding-left:20px;}
        .banner-text h2{color:#62a2de; font-weight:600;}
        .banner-text h2:after{content:" "; width:100px; height:5px; background:#62a2de; display:block; margin-top:20px; border-radius:3px;}
        .banner-text p{color:#62a2de;}
  </style>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <title>JMROSEL - Login</title>
</head>
<body>
  
  <section class="login-block">
    <div class="container">
	<div class="row">
		<div class="col-md-4 login-sec">
		    <h2 class="text-center">Login Now</h2>
		  
      
        <form method="POST" class="login-form" action="{{ route('login') }}">
          @csrf
        <div class="form-group">
    <label for="exampleInputEmail1" class="text-uppercase">Email</label>
      <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" Placeholder="email" equired autocomplete="email">
      @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
      @enderror

    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-uppercase">Password</label>
    <input id="password" type="password"  Placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
  </div>
  
  
    <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input">
      <small>Remember Me</small>
    </label>
    <button type="submit" class="btn btn-login float-right">Submit</button>
  </div>
</form>

		</div>
		<div class="col-md-8 banner-sec">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                 
            <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <img class="d-block img-fluid" src="/images/img2.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
      
  </div>
    
  </div>
            </div>	   
		    
    </div>
  
	</div>
</div>
</section>

</body>
</html>