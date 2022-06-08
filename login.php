<?php
require_once('./DBConnection.php');
if(isset($_SESSION['employee_id']) && $_SESSION['employee_id'] > 0){
    header("Location:./");
    exit;
}
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN | Simple OPAC</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/script.js"></script>
    <style>
        html, body{
            height:100%;
        }
    </style>
</head>

<script>
    $(function(){
        $('#login-form').submit(function(e){
            e.preventDefault();
            $('.pop_msg').remove()
            var _this = $(this)
            var _el = $('<div>')
                _el.addClass('pop_msg')
            _this.find('button').attr('disabled',true)
            _this.find('button[type="submit"]').text('Loging in...')
            $.ajax({
                url:'./Actions.php?a=employee_login',
                method:'POST',
                data:$(this).serialize(),
                dataType:'JSON',
                error:err=>{
                    console.log(err)
                    _el.addClass('alert alert-danger')
                    _el.text("An error occurred.")
                    _this.prepend(_el)
                    _el.show('slow')
                    _this.find('button').attr('disabled',false)
                    _this.find('button[type="submit"]').text('Save')
                },
                success:function(resp){
                    if(resp.status == 'success'){
                        _el.addClass('alert alert-success')
                        setTimeout(() => {
                            location.replace('./');
                        }, 2000);
                    }else{
                        _el.addClass('alert alert-danger')
                    }
                    _el.text(resp.msg)

                    _el.hide()
                    _this.prepend(_el)
                    _el.show('slow')
                    _this.find('button').attr('disabled',false)
                    _this.find('button[type="submit"]').text('Save')
                }
            })
        })
    })
</script>



<style>
  body {
       background-color: #F3EBF6;
       font-family: 'Ubuntu', sans-serif;
   }

   .main {
       background-color: #FFFFFF;
       width: 400px;
       height: 450px;
       margin: 7em auto;
       border-radius: 1.5em;
       box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
   }

   .sign {
       padding-top: 0px;
       color: #8C55AA;
       font-family: 'Ubuntu', sans-serif;
       font-weight: bold;
       font-size: 23px;
   }

   .un {
   width: 76%;
   color: rgb(38, 50, 56);
   font-weight: 700;
   font-size: 14px;
   letter-spacing: 1px;
   background: rgba(136, 126, 126, 0.04);
   padding: 10px 20px;
   border: none;
   border-radius: 20px;
   outline: none;
   box-sizing: border-box;
   border: 2px solid rgba(0, 0, 0, 0.02);
   margin-bottom: 40px;
   margin-left: 46px;
   text-align: center;
   margin-bottom: 27px;
   font-family: 'Ubuntu', sans-serif;
   }

   form.form1 {
       padding-top: 0px;
   }

   .pass {
           width: 76%;
   color: rgb(38, 50, 56);
   font-weight: 700;
   font-size: 14px;
   letter-spacing: 1px;
   background: rgba(136, 126, 126, 0.04);
   padding: 10px 20px;
   border: none;
   border-radius: 20px;
   outline: none;
   box-sizing: border-box;
   border: 2px solid rgba(0, 0, 0, 0.02);
   margin-bottom: 50px;
   margin-left: 46px;
   text-align: center;
   margin-bottom: 27px;
   font-family: 'Ubuntu', sans-serif;
   }


   .un:focus, .pass:focus {
       border: 2px solid rgba(0, 0, 0, 0.18) !important;

   }

   .submit {
     cursor: pointer;
       border-radius: 5em;
       color: #fff;
       background: linear-gradient(to right, #9C27B0, #E040FB);
       border: 0;
       padding-left: 40px;
       padding-right: 40px;
       padding-bottom: 10px;
       padding-top: 10px;
       font-family: 'Ubuntu', sans-serif;
       margin-left: 35%;
       font-size: 13px;
       box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
   }

   .forgot {
       text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
       color: #E1BEE7;
       padding-top: 10px;
   }

   .logo {
       width: 90px;
       margin: auto;
   }

   .logo img {
       width: 120%;
       height: 120px;
       border-radius:50%;
       object-fit: contain;
       border-radius: 50%;
       margin-bottom: 10px;
       box-shadow: 0px 0px 3px #5f5f5f, 0px 0px 0px 5px #ecf0f3, 8px 8px 15px #a7aaa7, -8px -8px 15px #fff
   }
.circular--square { border-top-left-radius: 50% 50%; border-top-right-radius: 50% 50%; border-bottom-right-radius: 50% 50%; border-bottom-left-radius: 50% 50%; }
   a {
       text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
       color: #E1BEE7;
       text-decoration: none
   }
   html,
body {
  height: match_parent;
}

.mydiv {
  width:100%;
  height:100%;
  color:black;
  font-weight:bold;
  animation: myanimation 10s infinite;
}


@keyframes bgcolor {
  opacity: 0.5;
    0% {
        background-color: #45a3e5
    }

    50% {
        background-color: #66bf39
    }

    50% {
        background-color: #eb670f
    }

    50% {
        background-color: #f35
    }

    50% {
        background-color: #864cbf
    }
}

body {
    -webkit-animation: bgcolor 20s infinite;
    animation: bgcolor 10s infinite;
    -webkit-animation-direction: alternate;
    animation-direction: alternate;
}

   @media (max-width: 600px) {
       .main {
           border-radius: 0px;
       }
</style>


  </div>
</div>
<body style="background-color:powderblue;">

<div class="main">
  <div class="logo">
  <div class="circular--square"> <img src="logo.png" alt="Census 2021 Logo"> </div></div>
  <p class="sign" align="center">DCO Rajasthan Intranet</p>
        <div class="un" style="height:200px; width:300px; padding-bottom: 100px;">
            <div>
                <form action="" id="login-form">
                    <center><small>Please enter your credentials.</small></center>
                    <div >
                    <label for="email" class="control-label">Email</label>
                    <input type="text" id="email" autofocus name="email" class="form-control form-control-sm rounded-0" required>
                    </div>
                    <div>
                    <label for="password" class="control-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control form-control-sm rounded-0" required>
                    </div>
                    <div>
                        <a href="http://localhost/edtms_work1/admin/login.php">Go to Admin Side</a>
                        <button class="btn btn-sm btn-primary rounded-0 my-1">Login</button>
                    </div>
                </form>
            </div>
        </div>
       </div>
   </div>
</body>




</body>

</html>
