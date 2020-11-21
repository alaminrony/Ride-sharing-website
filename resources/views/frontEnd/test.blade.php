<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #tab1, #tab2, #tab3{
  background-color:grey;
  color:white;
  padding:5px 10px;
  display:block;
  width:100px;
  border-bottom:1px solid;
}

#tab1:hover, #tab2:hover, #tab3:hover{
  background-color:darkgrey;
}
    </style>
</head>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div id="nav-mobile">
    <a href="#" id="tab1">Products</a>
    <ul style="display: none;">
        <li><a href="index.php">Home</a></li>
        <li><a href="#">Why Us</a></li>
        <li><a href="#">Our Work</a></li>
    </ul>
    <a href="#" id="tab2">About</a>
    <ul style="display: none;">
        <li><a href="#">Our Equipment</a></li>
        <li><a href="#">Video Production</a></li>
    </ul>
    <a href="#" id="tab3">Contact</a>
    <ul style="display: none;">
        <li id="last-child"><a href="#">Contact</a></li>
        <li id="last-child"><a href="#">Social Media</a></li>
    </ul>
</div>
    <script src="assets/js/jquery-1.12.4.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/popper.min.js" ></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/jquery.pagepiling.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="./assets/js/test.js"></script>
</body>
</html>