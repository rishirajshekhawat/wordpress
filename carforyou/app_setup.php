<?php
$con=mysqli_connect("localhost","project11","qy+wS-nlN#4E","database11");
if(!$con){
	echo "connection failure";
}
if($_POST['url']){
		
		$url=$_POST['url'];
		$key=$_POST['skey'];
		$qry=mysqli_query($con,"select * from carforyouurl where url='$url' and skey='$key'");
		$data=mysqli_fetch_array($qry);
		$a=$data['url'];
		$b=$data['skey'];
		
		if($a!==$url && $b!==$key){
		$sql=mysqli_query($con,"insert into carforyouurl (url,skey) values('$url','$key')") or die(mysqli_error($con));
		if($sql){
			
		}
		else{
			
		}
		}
		else{
			
		}
}


?>