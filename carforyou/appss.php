<?php
function demo(){
	$filepath=esc_url( home_url( '/' ) )."wp-content/themes/olomo/app.txt";
	//echo $filepath;
	$myfile=fopen($filepath,"r");
	$id = fread($myfile,4);
	fclose($myfile);
	return $id;
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$myfile = fopen("app.txt","w");
	$id=$_POST['success'];
	fwrite($myfile,$id);
	fclose($myfile);
	//$response['msg']=$id;
//echo json_encode($id);
	//echo $id;
}
?>