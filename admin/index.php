<?php
require_once('../DBConnection.php');
if(!isset($_SESSION['admin_id'])){
    header("Location:./login.php");
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
    <title><?php echo ucwords(str_replace('_','',$page)) ?> | ORGI MIS</title>
    <link rel="stylesheet" href="../Font-Awesome-master/css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../select2/css/select2.min.css">
    <link rel="stylesheet" href="../summernote/summernote-lite.css">
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../DataTables/datatables.min.css">
    <script src="../DataTables/datatables.min.js"></script>
    <script src="../Font-Awesome-master/js/all.min.js"></script>
    <script src="../select2/js/select2.min.js"></script>
    <script src="../summernote/summernote-lite.js"></script>
    <script src="../js/script.js"></script>



    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Carousel</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">




    <style>
    .carousel-item{
    min-height: 280px;
}
        :root{
            --bs-bg-success:#00ff80 !important;
            --bs-success-rgb: 0,255,128 !important;
        }
        html,body{
            height:100%;
            width:100%;
        }
        main{
            height:100%;
            display:flex;
            flex-flow:column;
        }
        #page-container{
            flex: 1 1 auto;
            overflow:auto;
        }
        #topNavBar{
            flex: 0 1 auto;
        }
        .thumbnail-img{
            width:50px;
            height:50px;
            margin:2px
        }
        .truncate-1 {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
        }
        .truncate-3 {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }
        .modal-dialog.large {
            width: 80% !important;
            max-width: unset;
        }
        .modal-dialog.mid-large {
            width: 50% !important;
            max-width: unset;
        }
        @media (max-width:720px){

            .modal-dialog.large {
                width: 100% !important;
                max-width: unset;
            }
            .modal-dialog.mid-large {
                width: 100% !important;
                max-width: unset;
            }

        }
        .display-select-image{
            width:60px;
            height:60px;
            margin:2px
        }
        img.display-image {
            width: 100%;
            height: 45vh;
            object-fit: cover;
            background: black;
        }
        /* width */
        ::-webkit-scrollbar {
        width: 5px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
        background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
        background: #888;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
        background: #555;
        }
        .img-del-btn{
            right: 2px;
            top: -3px;
        }
        .img-del-btn>.btn{
            font-size: 10px;
            padding: 0px 2px !important;
        }

        body {
            height: 100%;
            background: linear-gradient( #FFA500,#FFFFFF,	#008000);
            background-size: cover;
            background-attachment: fixed;
        }

        .box {
          color:white;
          text-shadow: black 0.1em 0.1em 0.1em;
          height: 0px;width: 32%;
          text-align: justify;
          padding-left: 40px;
          margin-top: 0px;
        }
        .boxone {
         background-color: black;
         color:purple;
         text-shadow: black 0.1em 0.1em 0.1em;
         height: 0px;
         width: 64%;
         text-align: justify;
         padding-left: 650px;
       }
        .boxtwo {color:white; text-shadow: black 0.1em 0.1em 0.1em;height: 0px;width: 95%;text-align: justify;padding-left: 1250px;}
        .large {color:white; text-shadow: black 0.1em 0.1em 0.1em;height: 100px;width: 95%;text-align: justify;padding-left: 40px;padding-right: 0px;padding-top: 400px;}



        .column {
          float: left;
          width: 10%;
          padding: 15px;
          margin: inherit;
          padding-left: 300px;
          padding-right: 120px;
          margin-top: 0px;
        }

        /* Clearfix (clear floats) */
        .row::after {
          content: "";
          clear: both;
          display: table;
        }
        .tales {
          width: 100%;
          height: 100%
        }
        .carousel-inner{
          width: 100%;
          max-height: 100%!important;
          fon
        }
        .onecontainer
        {
          padding-top: 100px;
          padding-left: 500px;
          padding-right: 500px;

        }





    </style>
</head>
<body>
    <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-gradient" id="topNavBar">
        <div class="container">
            <a class="navbar-brand" href="#">
            ORGI MIS
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($page == 'home')? 'active' : '' ?>" aria-current="page" href="./"><i class="fa fa-home"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  <?php echo ($page == 'employees')? 'active' : '' ?>" href="./?page=employees"><i class="fa fa-user-tie"></i> Officials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  <?php echo ($page == 'tasks')? 'active' : '' ?>" href="./?page=tasks"><i class="fa fa-tasks"></i> Receipts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($page == 'admin')? 'active' : '' ?>" aria-current="page" href="./?page=admin"><i class="fa fa-user-cog"></i> Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./?page=maintenance"><i class="fa fa-cogs"></i> Manage Section</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="./?page=designation"><i class="fa fa-cogs"></i> Manage Designation</a>
                    </li>

                </ul>
            </div>
            <div>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle bg-transparent  text-light border-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><img src="https://img.icons8.com/metro/26/000000/guest-male.png">
                    Hello <?php echo $_SESSION['fullname'] ?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="./?page=manage_account">Manage Account</a></li>
                    <li><a class="dropdown-item" href="../Actions.php?a=logout"> Logout</a></li>
                </ul>
            </div>
            </div>
        </div>
    </nav>
    <div class="container py-3" id="page-container">
        <?php
            if(isset($_SESSION['flashdata'])):
        ?>
        <div class="dynamic_alert alert alert-<?php echo $_SESSION['flashdata']['type'] ?>">
        <div class="float-end"><a href="javascript:void(0)" class="text-dark text-decoration-none" onclick="$(this).closest('.dynamic_alert').hide('slow').remove()">x</a></div>
            <?php echo $_SESSION['flashdata']['msg'] ?>
        </div>
        <?php unset($_SESSION['flashdata']) ?>
        <?php endif; ?>
        <?php
            include $page.'.php';
        ?>
    </div>
  </div>
    <div class="modal fade" id="uni_modal" role='dialog' data-bs-backdrop="static" data-bs-keyboard="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title"></h5>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer py-1">
            <button type="button" class="btn btn-sm rounded-0 btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
            <button type="button" class="btn btn-sm rounded-0 btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
        </div>
    </div>
    <div class="modal fade" id="uni_modal_secondary" role='dialog' data-bs-backdrop="static" data-bs-keyboard="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title"></h5>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer py-1">
            <button type="button" class="btn btn-sm rounded-0 btn-primary" id='submit' onclick="$('#uni_modal_secondary form').submit()">Save</button>
            <button type="button" class="btn btn-sm rounded-0 btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
        </div>
    </div>
    <div class="modal fade" id="confirm_modal" role='dialog'>
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content rounded-0">
            <div class="modal-header py-2">
            <h5 class="modal-title">Confirmation</h5>
        </div>
        <div class="modal-body">
            <div id="delete_content"></div>
        </div>
        <div class="modal-footer py-1">
            <button type="button" class="btn btn-primary btn-sm rounded-0" id='confirm' onclick="">Continue</button>
            <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
        </div>
    </div>

    <div class="container-lg my-3">
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <!-- Carousel indicators -->
            <ol class="carousel-indicators">
                <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
            </ol>

            <!-- Wrapper for carousel items -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/examples/images/slide1.png" class="d-block w-100" alt="Slide 1">
                </div>
                <div class="carousel-item">
                    <img src="/examples/images/slide2.png" class="d-block w-100" alt="Slide 2">
                </div>
                <div class="carousel-item">
                    <img src="/examples/images/slide3.png" class="d-block w-100" alt="Slide 3">
                </div>
            </div>

            <!-- Carousel controls -->
            <a class="carousel-control-prev" href="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>

    <div class="row">
      <div class="column">
        <a href="https://www.mha.gov.in/">
        <img src="unnamed (2).jpg" alt="Snow" width="350" height="150">
      </a>
      </div>
      <div class="column">
        <a href="https://www.mygov.in/">
        <img src="unnamed (3).jpg" alt="Forest" width="350" height="150" >
      </a>
    </div>
      <div class="column">
        <a href="https://www.censusindia.gov.in/">

        <img src="unnamed (4).jpg" alt="Mountains" width="350" height="150">
      </a>
      </div>
      <div class="column">
        <a href="https://digitalindia.gov.in/">
        <img src="unnamed.jpg" alt="Mountains" width="350" height="150">
      </a>
      </div>
    </div>


      <div class="box">
        <div class="shadow p-3 mb-5 bg-body rounded"style="background-color:Orange;">
        <h4>As per details from Census 2011, Rajasthan has population of 6.86 Crores, an increase from figure of 5.65 Crore in 2001 census. Total population of Rajasthan as per 2011 census is 68,548,437 of which male and female are 35,550,997 and 32,997,440 respectively. In 2001, total population was 56,507,188 in which males were 29,420,011 while females were 27,087,177. The total population growth in this decade was 21.31 percent while in previous decade it was 28.33 percent. The population of Rajasthan forms 5.66 percent of India in 2011. In 2001, the figure was 5.49 percent.
      </h4>
      </div>
    </div>

      <div class="boxone">
        <div class="shadow p-3 mb-5 bg-body rounded"style="background-color:white;">
        <h4>As per details from Census 2011, Rajasthan has population of 6.86 Crores, an increase from figure of 5.65 Crore in 2001 census. Total population of Rajasthan as per 2011 census is 68,548,437 of which male and female are 35,550,997 and 32,997,440 respectively. In 2001, total population was 56,507,188 in which males were 29,420,011 while females were 27,087,177. The total population growth in this decade was 21.31 percent while in previous decade it was 28.33 percent. The population of Rajasthan forms 5.66 percent of India in 2011. In 2001, the figure was 5.49 percent.
      </h4>
      </div>
    </div>


      <div class="boxtwo">
        <div class="shadow p-3 mb-5 bg-body rounded"style="background-color:green;">
        <h4>As per details from Census 2011, Rajasthan has population of 6.86 Crores, an increase from figure of 5.65 Crore in 2001 census. Total population of Rajasthan as per 2011 census is 68,548,437 of which male and female are 35,550,997 and 32,997,440 respectively. In 2001, total population was 56,507,188 in which males were 29,420,011 while females were 27,087,177. The total population growth in this decade was 21.31 percent while in previous decade it was 28.33 percent. The population of Rajasthan forms 5.66 percent of India in 2011. In 2001, the figure was 5.49 percent.
      </h4>
      </div>
    </div>
    </span>

    </div>
<span class="border">
    <div class="large">
    <div class="shadow-lg p-3 mb-5 bg-body rounded" style="background-color:lightblue;">This is a intranet used for Managment of Documents </div>
    </div>
    </body>

    <div>

    </div>
</body>
</html>
