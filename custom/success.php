<?php
$conn=mysqli_connect("localhost","root","","opencart");
$q1="select * from oc_product where quantity=0";
$q2=mysqli_query($conn,$q1);
while($r=mysqli_fetch_assoc($q2))
{
    // print_r($r);
    $q3="select * from oc_success where product_id=".$r['product_id'];
    // echo $q3;
    $q4=mysqli_query($conn,$q3);
    $r1=mysqli_num_rows($q4);
     if($r1==0)
     {
         $q5="INSERT INTO `oc_success`(`product_id`) VALUES (".$r['product_id'].")";
         $q6=mysqli_query($conn,$q5);
         if($q6)
         {
            $mob=$r['phnum'];
            $message = "Dear Farmer,Your product with Product Id:".$r['product_id']." has been bought. Please make sure that you don't sell it offline.";
            include_once 'message.php';
         }
     }

    
}
?>