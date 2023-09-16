
<html>
    <head>
        <style>
            body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  background-color: darkslateblue;
}
.topnav {
  overflow: hidden;
  background-color:#8d2663;
  height: 70px;
  border: 3px solid #b40a70;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 35px;
  font-weight: bold;
}

.topnav-right {
  float: right;
}
            table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    outline:#b40a70 solid 5px;
    width: 70%;
    margin:5px ;
    background: #FAFAFA;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}
th{
  background-color:#8d2663;
}

        </style>
    </head>
    <body>
    <div class="topnav">
            <a class="active" href="home.html"><img src="logo.jpg" style="border:1px solid #000;" alt="Add photo here"></a>
            <a href="customer.php">Customers</a>
            <div class="topnav-right">
              <a href="viewallpetdetails.php">Go Back</a>
            </div>
          </div>





<?php
$con = mysqli_connect("localhost","root","","pet_shop");
if(!$con)
{ 
die("could not connect");
}

$var=mysqli_query($con,"select * from order_placed ");
echo "<table>";
echo "<tr>
<th>order_id</th>
<th>pet_id</th>
<th>qty</th>
<th>user_id</th>
<th>order_cancel</th>
<th>date</th>
</tr>";

if(mysqli_num_rows($var)>0){
    while($arr=mysqli_fetch_row($var))
    { echo "<tr>
    <td>$arr[0]</td>
    <td>$arr[1]</td>
    <td>$arr[2]</td>
    <td>$arr[3]</td>
    <td>$arr[4]</td>
    <td>$arr[5]</td>
    
    </tr>";}
    echo "</table>";
    mysqli_free_result($var);
}

mysqli_close($con);
    
    
?>