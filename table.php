<?php
  $hostname = 'localhost';
  $username = 'root';
  $password = 'root';
  $dbname = 'FlipDatabase';

  try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);

    $sql = $dbh->prepare("SELECT questionType, questionTitle,choice1,choice2,choice3,answer,major, minor FROM FlipForm ORDER BY questionType");

    if($sql->execute()) {
       $sql->setFetchMode(PDO::FETCH_ASSOC);
    }
  }
  catch(Exception $error) {
      echo '<p>', $error->getMessage(), '</p>';
  }

?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Admin Panel for Flip Database</title>
    <!-- BOOTSTRAP CORE STYLE  -->

    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />

</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <strong>Email: </strong>mewseum@fia.umd
                    &nbsp;&nbsp;
                    <strong>Support: </strong>+333-333-333
                </div>

            </div>
        </div>
    </header>
    <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="firstpage.html">

                    <img src="assets/img/logo.png" />
                </a>

            </div>

            <div class="left-div">
                <div class="user-settings-wrapper">
                    <ul class="nav">

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                <span class="glyphicon glyphicon-user" style="font-size: 25px;"></span>
                            </a>
                            <div class="dropdown-menu dropdown-settings">
                                <div class="media">
                                    <div class="media-body">
                                        <h4 class="media-heading">Flip Admin </h4>
                                    </div>
                                </div>
                                <hr />
                                <a href="index.html" class="btn btn-danger btn-sm">Logout</a>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="firstpage.html">Dashboard</a></li>
                            <li><a class="menu-top-active" href="table.php">Quizzes</a></li>
                            <li><a href="forms.html">Create Quiz</a></li>
                            <li><a href="aboutus.html">About Us</a></li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
                <div class="row">
                    <div class="col-md-24">
                        <h1 class="page-head-line">Quizzes</h1>
                    </div>
                </div>
                
                <div class="row">
                <div class="col-md-18">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Existing Question Database 
                        </div>
                        <!--<div class="panel-body">-->
                            <div class="table-responsive">
                                <table id ="myTable" class="display table" >
                                    <thead>
                                        <tr>
                                            <th class = "col-md-1 text-left">Type</th>
                                            <th class = "col-md-4 text-left">Title</th>
                                            <th class = "col-md-2 text-left">Choice 1</th>
                                            <th class = "col-md-2 text-left">Choice 2</th>
                                            <th class = "col-md-2 text-left">Choice 3</th>
                                            <th class = "col-md-2 text-left">Answer</th>
                                            <th class = "col-md-2 text-left">Major</th>
                                            <th class = "col-md-2 text-left">Minor</th>
                                        </tr>
                                    </thead> 

                                        
                                    <tbody>
                                         <?php while($row = $sql->fetch()) { ?>
                                            <tr>
                                              <td ><?php echo $row['questionType']; ?></td>
                                              <td ><?php echo $row['questionTitle']; ?></td>
                                              <td ><?php echo $row['choice1']; ?></td>
                                              <td ><?php echo $row['choice2']; ?></td>
                                              <td ><?php echo $row['choice3']; ?></td>
                                              <td ><?php echo $row['answer']; ?></td>
                                              <td ><?php echo $row['major']; ?><td>
                                              <td ><?php echo $row['minor']; ?><td>
                                            </tr>   

                                        <?php } ?>  

                                    </tbody>
                                          
                                </table>
                            </div>
                    </div>
                </div>
                     <!-- End  Kitchen Sink -->
        </div>
     </div>

    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
       <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
                
</body>
</html>
