<!--<?php
include("db.php");
$query = $_GET['query'];
$query = filter_var($query, FILTER_SANITIZE_URL);

$sql = "SELECT * FROM main_bookdetails WHERE isbn LIKE '%".$query."%' OR name LIKE '%".$query."%' OR author LIKE '%".$query."%';";
$res = mysql_query($sql);

?> -->
<html>
<head>
    <meta charset="utf-8">  
    <title>ghissu :Page 2</title>   
    <link href="http://localhost/public/style/style2.css" rel="stylesheet">
  <link href="http://localhost/public/style/content.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200' rel='stylesheet' type='text/css'>
</head>
<body>
<div id="container">
  <header>
    <nav>
            <ul class="navbar">
                <li class="tabs"><a href="index.php">Home</a></li>
              <li class="tabs"><a href="search.php?query=">Library</a></li>
              <li class="tabs"><a href="#">About Us</a></li>
        <li >
                 <form id="searchform" action="search.php">
                    <input type="search" name="query" placeholder="Search">
                 </form></li>
              <li class="right">Sign Up</li>
        <li class="logo"><a href="#"><img id="facebook" src="http://localhost/public/images/Capture.JPG"></img></a></li>
        <li class="logo"><a href="#"><img id="google" src="http://localhost/public/images/google1.png"></img></a></li>
                <li class="right">Sign In via</li>
            </ul>
        </nav>
    </header>
<div class="wrap">
  <div id="dynamic">
    Catalogue:
    </div>
  <div id="comp-table">
  <p>Featured links<br/></p>
  </div>
  <div id="review">
    <p><b>Search results for... <?php echo $_GET['isbn']; ?></b></p>
    
</div>
<div id="column-left">
      <div id="logo">
        <a href="#">  <img style="width:150px;height:80px;" src="http://localhost/public/images/logo.PNG"></img></a>
      </div>
      <p>Categories</p>
    <div id="categories">
        <ul>
          <li><a href="#">Academic</a></li>
        <li><a href="#">Biography</a></li>
        <li><a href="#">Management</a></li>
        <li><a href="#">Comic</a></li>
        <li><a href="#">Self Help</a></li>
        <li><a href="#">Spiritual</a></li>
        
        <li><a href="#">Lifestyle</a></li>
        <li><a href="#">Historical</a></li>
        <li><a href="#">Humor</a></li>
        <li><a href="#">Love Romance</a></li>
      </ul>
    </div>  
</div>
</div>    
</div>
</body>
</html>   
