<!DOCTYPE html>
<html>
<head>
    <title>Laravel Registeration and Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

  </head>
<body>

<nav class="navbar navbar-expand navbar-light" style="background-color:steelblue">
  <div class="container-fluid">
  <div class="navbar-brand">
    <h3 style="color:beige">Employee Management System</h>
  </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      </ul>
      <div class="navbar-nav">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ route('logout') }}" class="text-sm text-gray-700 dark:text-gray-500 text-white">Log Out</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500  text-white">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500  text-white"> | Register</a>
                    @endif
                @endauth
            </div>
        @endif
      </div>
    </div>
  </div>
</nav>
<br>
<div class="container">
    @yield('content')
</div>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#register").on("click", function(e){
      $("#print-error-msg").find("ul").html('');
			$("#print-error-msg").css('display','none');
			$("#msgSpn").text('');

      e.preventDefault();
      var name = $("#name").val();
       var email = $("#email").val();
       var password = $("#password").val();
      
       
       var name = $("input[name=name]").val();
        var email = $("input[name=email]").val();
        var password = $("input[name=password]").val();
        var url = "{{ route('register.post') }}";

        console.log(url);
        $.ajax({
           url:url,
           method:'POST',
           data:{
                  name:name, 
                  email:email,
                  password:password,
                },
           success:function(data){
            if($.isEmptyObject(data.error)){
                    $("#msgSpn").css('display','block');
                      $("#msgSpn").text(data.success);
                      name = $("input[name=name]").val("");
                      email = $("input[name=email]").val("");
                      password = $("input[name=password]").val("");
	                }else{
	                	printErrorMsg(data.error);
	                }
             
           }
        });
       
    })

    function printErrorMsg (msg) {
			$("#print-error-msg").find("ul").html('');
			$("#print-error-msg").css('display','block');
			$.each( msg, function( key, value ) {
				$("#print-error-msg").find("ul").append('<li>'+value+'</li>');
			});
		}
 
  })
</script>
</body>
</html>