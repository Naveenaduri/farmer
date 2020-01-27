<html>
    <head>
	 <script src="../farmers/vendor/jquery/jquery.js"></script>

    </head>
    <body>
        <?php
        $conn=mysqli_connect("localhost","root","","opencart");
        $data = file_get_contents("https://control.textlocal.in/feeds/inbox/?id=1049281&inbox=10&hash=ba1475525039fbdb31c9dbd7a60a0e51a66332a7485b5527f959cb1f5b0479da");
        $x = new SimpleXmlElement($data);
        echo "<pre>".$x."</pre>";
        $i=0;
        foreach($x->channel->item as $entry) {
            $i++;
            if($i==10){
            break;
            }
            // echo "<li><a href='$entry->link' title='$entry->title'>" . $entry->title . "</a></li>";
            echo $i.".)".$entry->description. " ......... ";
            $str= $entry->description;
            // $str=explode(" ",$str);
            $time=$entry->pubDate;
            $mob=$entry->title;
            $valid="Select * from oc_farmer where oc_f_num='$mob' and oc_f_status=0 and oc_f_otp_status=1";
            // echo $valid;
            $v=mysqli_query($conn,$valid);
            $rowcountf=mysqli_num_rows($v);
            $a = explode(' ', $str);
            
            if($rowcountf==1)
            {  
                $query="select * from oc_msg where mobile='$mob' and msgtime='$time'";
                // echo $query."<br>";
                $q=mysqli_query($conn,$query);
                $rowcount=mysqli_num_rows($q);
                // echo $rowcount."<br>";
                if($rowcount < 1)
                {
                    $query1="INSERT INTO `oc_msg`(`mobile`, `msg`, `msgtime`,`status`) VALUES ('$mob','$str','$time','1')";
                    // echo "$query1";
                    $q1=mysqli_query($conn,$query1);
                    if($q1){
                        echo "..Not Found Inserted into Message Table..";
                    }
                    if($a[1] == "ADD")
                    {
                      if(count($a)==5)
                      {
                        $pro_id= $a[2];
                        $pro_quantity= $a[3];
                        $pro_price= $a[4];
                        
                        ?>
                        <script>
                            add_product(<?php echo $a[2].",".$a[3].",".$a[4].",".$mob ?>);
                            function add_product(pro_id,pro_quantity,pro_price,number) 
                            {
                                    var pro_id = pro_id;
                                    var pro_quantity = pro_quantity;
                                    var pro_price = pro_price;
                                    var number=number;

                                    var ret = true;
                                    
                                    $.ajax({
                                        url: '../farmers/queries/product.php',
                                        data: {
                                            pro_id: pro_id,
                                            pro_quantity: pro_quantity,
                                            pro_price: pro_price,
                                            number:number,
                                            product_add: ''
                                        },
                                        dataType: 'text',
                                        type: 'post',
                                        success: function(data) {
                                            console.log(data);
                                            // window.location = 'pro_view.php';
                                        },
                                        failure: function(data) {
                                            console.log('Error While Adding Product.');
                                        }
                                    });
                        }

                        </script>
                        <?php
						echo "..Product Created Successfully..". "<br>";
                      } 
                      else
                      {
                        echo "..Unable to ADD product!..". "<br>";
                        //   echo count($a);
                        $message = "Unable to add product! Message format is ADD <product id> <quantity> <price>. Please check again.";
                        include_once 'message.php';
                          
                      } 
                        
                    }
                    else if($a[1] == "DEL")
                    {
                        if(count($a)==3)
                        {
							$v1="select * from oc_product where product_id=".$a[2];
							$v1=mysqli_query($conn,$v1);
							$phn=mysqli_fetch_assoc($v1);
							if(($phn['phnum']==$mob) && ($phn['status'] == 1) && ($phn['quantity'] == 1)){
									?>
									<script>
									del(<?php echo $a[2].",".$mob ; ?>);
									function del(id,number) 
									{
										
											$.ajax({
												url: '../farmers/queries/product.php',
												dataType: 'text',
												type: 'POST',
												data: {
													product_id: id,
                                                    number:number,
													product_del: ''
												},
												success: function(data) {
													console.log(data);
												},
												failure: function(data) {
													console.log("Problem While Deleting.");
												}
											});
										
									}
									</script>
									<?php
									echo "..Product Deleted Successfully..". "<br>";
                            }
                            else
							{
								echo "..Unable to delete Product..". "<br>";
								//   echo count($a);
								$message = "Unable to delete Product. It may not belong to you or may be some other reason. Please check again.";
								include_once 'message.php';	
							}
							
                        }
                        else
                        {
                            echo "Unable to Delete Product!". "<br>";
                            //   echo count($a);
                            $message = "Unable to delete Product! Message format is DEL <product id that is given at Product ADDITION>. Please check again.";
                            include_once 'message.php';
                            
                        }  
                    }
                    else if($a[1] == "SELL")
                    {
                        if(count($a)==3)
                        {
                            $v1="SELECT * FROM `oc_category_description` where upper(name)='$a[2]'";
                            // echo $v1;
                            $v1=mysqli_query($conn,$v1);
							$phn=mysqli_num_rows($v1);
                            if($phn!=0)
                            {
                                $v2="select category_id from `oc_category_description` where upper(name)='$a[2]'";
                                $v2=mysqli_query($conn,$v2);
                                $catid=mysqli_fetch_assoc($v2);
                                $v3="select pro_name,pro_id from oc_pro where pro_category=".$catid['category_id'];
                                $v3=mysqli_query($conn,$v3);
                                $message="\n"."The Product Names and The Respecitve Codes are :"."\n";
                                while($a=mysqli_fetch_assoc($v3))
                                {
                                 $message=$message.($a['pro_name'] . ":" .$a['pro_id']."\n");    
                                }
                                echo strlen($message)."<br>";
                                include_once 'message.php';


                            }
                            else{
                                echo "..Invalid Category.."."<br>";
                                $message = "Invalid Category";
                                include_once 'message.php';
                            }
							
                        }
                        else
                        {
                            echo "..Unable to DELETE product..". "<br>";
                            //   echo count($a);
                            $message = "Unable to sell product! Message format is SELL <CATEGORY NAME>. Please check again.";
                            include_once 'message.php';
                            
                        }  
                    }
                    else if($a[1]=="UPD")
                    {
                        if(count($a)==5)
                        {
							$v1="select * from oc_product where product_id=".$a[2];
							$v1=mysqli_query($conn,$v1);
							$phn=mysqli_fetch_assoc($v1);
							if(($phn['phnum']==$mob) && ($phn['status'] == 1) && ($phn['quantity'] == 1)){
                            ?>
                        <script>
                            upd(<?php echo $a[2].",".$a[3].",".$a[4].",".$mob ?>);
                            function upd(pro_id,pro_quantity,pro_price,number) 
                            {
                                    var product_id = pro_id;
                                    var pro_quantity = pro_quantity;
                                    var pro_price = pro_price;

                                    var ret = true;
                                    
                                    $.ajax({
                                    url: '../farmers/queries/product.php',
                                    data: {
                                        product_id: product_id,
                                        pro_quantity: pro_quantity,
                                        pro_price: pro_price,
                                        number:number,
                                        product_upd: ''
                                    },
                                    dataType: 'text',
                                    type: 'post',
                                    success: function(data) {
                                        console.log(data);
                                        // window.location = 'pro_view.php';
                                    },
                                    failure: function(data) {
                                        console.log('Error While Adding Product.');
                                    }
                                });
                            }

                        </script>
                        <?php

                                echo "..Product Updated Successfully..". "<br>";
							}
							else{
								echo "..Unable to Update Product..". "<br>";
								//   echo count($a);
								$message = "Unable to Update Product";
								include_once 'message.php';
								
							}

                        }
                        else{
                            echo "..Unable to UPDATE product..". "<br>";
                            $message = "Unable to update product! Message format is UPD <product id that is given at Product ADDITION> <quantity> <price>. Please check again. ";
                            include_once 'message.php';
                        }
                    }
                    else if($a[1]=="SOLD")
                    {
                        if(count($a) == 3)
                        { 
						    $v1="select * from oc_product where product_id=".$a[2];
							$v1=mysqli_query($conn,$v1);
							$phn=mysqli_fetch_assoc($v1);
							if(($phn['status'] == 1) && ($phn['quantity'] == 1) && ($phn['phnum']==$mob)) {
								?>
								<script>
									sold(<?php echo $a[2].",".$mob ; ?>);
									function sold(id,number) {
										if (true) {
											$.ajax({
												url: '../farmers/queries/product.php',
												dataType: 'text',
												type: 'POST',
												data: {
													product_id: id,
                                                    number:number,
													product_sold: ''
												},
												success: function(data) {
													console.log(data);
												},
												failure: function(data) {
													console.log("Problem While Moving to Sold.");
												}
											});
										}
									}

								</script>
								 <?php
								 echo "..Product is Added to Sold out Category..". "<br>";
							}
							else{
								echo "..Unable to Add Product Sold Out Category..". "<br>";
								$message = "Unable to Add Product Sold Out Category,";
								include_once 'message.php';
							}
							
                         
                        }
                        else{
                            echo "..Unable to UPDATE product..". "\n";
                            $message = "Unable to process! Format may be incorrect. Please try again.Message format is SOLD <product id>.";
                            include_once 'message.php';
                        }

                    }
                    else
                    {
                        echo "..Invalid Message! Please Enter in the Message Format..". "<br>";
                        $message = "Invalid format! Message format is <SELL/ADD/UPD/DEL/SOLD> <CATEGORY NAME/product id> <quantity> <price> respectively."."\n"."- Kisan Kart Team";
                        include_once 'message.php'; 
                    }       
                }
                else
                {
                    echo "..Message Already Inserted into DB..". "<br><br>";
                }
                
                
            }
            else{
                $query="select * from oc_msg where mobile='$mob' and msgtime='$time'";
                // echo $query."<br>";
                $q=mysqli_query($conn,$query);
                $rowcount=mysqli_num_rows($q);
                // echo $rowcount."<br>";
                if($rowcount < 1)
                {
                    $query1="INSERT INTO `oc_msg`(`mobile`, `msg`, `msgtime`,`status`) VALUES ('$mob','$str','$time','0')";
                    echo "Invalid user";
                    $q1=mysqli_query($conn,$query1);
                            if($q1){
                                echo "..Not Found So Inserted..". "<br><br>";
                                $message = "You are not a valid user.Please register on the website: <URL>";
                                include_once 'message.php';
                            }
                    
                }
                else{
                    echo "..Invalid user. Already inserted.."."<br>";
                }
            }
            
        } ?>
    </body>
</html>