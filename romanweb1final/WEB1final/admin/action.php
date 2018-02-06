<?php  	
// Սա ապրանքը բազա ավելացնելու համար նախատեսված կոդն է
if( isset($_POST["add"]) ){
	
	$name = $_POST["name"];
	$description = $_POST["description"];
	$price = $_POST["price"];
	$src="";

	// նկար ավելացնելու հատվածը
	if( isset($_FILES["src"]) ){

		$img_src = "Images/" . $_FILES["src"]["name"];
		$file_path = "../" . $img_src;

		move_uploaded_file($_FILES["src"]["tmp_name"], $file_path);
	}

	$db = mysqli_connect("localhost", "root", "usbw", "rom");
	$sql = "
		INSERT INTO `products`
			(name, description ,src, price)
		VALUES
			('$name', '$description', '$src', '$price')
	";
	$r = mysqli_query($db, $sql);

	if($r){
		echo "Product Successfuly Inserted";
	}
	else{
		echo "db error";
	}
}

// ԱՅՍ ԿՈԴՏ ՆԱԽԱՏԵՍՎԱԾ Է ԱՊՐԱՆՔԻ ՏՎՅԱԼՆԵՐԸ ԹԱՐՄԱՑՆԵԼՈՒ ՀԱՄԱՐ
if( isset($_POST["update"]) ){
	echo "ապրանքը թարմացնելու համար նախատեսված sql կոդը գրեք ինքներդ (UPDATE)";

	$id = $_POST['id'];
	$name = $_POST["name"];
	$description = $_POST["description"];
	$src = $_POST["src"];
	$price = $_POST["price"];

	$db = mysqli_connect("localhost", "root", "usbw", "rom");

	// գրեք sql կոդը այստեղ(UPDATE)
	// classroom-ի 6-րդ դասի մեջ նայիր թե ինչպես է պետք գրել UPDATE հրամանը
	// ՈՒՇԱԴՐՈՒԹՅՈՒՆ կդարձնես չակերտներին
	$sql = "UPDATE  `products`
		SET title = '$title', excerpt='$excerpt' ,content='$content'
		WHERE id = $id";

	$r = mysqli_query($db, $sql);

	if($r){
		echo "Product Successfuly Updated";
	}
	else{
		echo "db error";
	}
}


// Սա ապրանքը բազայից ջնջելու համար նախատեսված կոդն է
if( isset($_GET['action']) && $_GET['action'] == "delete"){
	$id = $_GET['id'];

	$db = mysqli_connect("localhost", "root", "usbw", "rom");
	$sql = "DELETE FROM `products` WHERE id = $id";

	$r = mysqli_query($db, $sql);
	// քեզ մնում է իրականացնես $sql հրամանը
		if($r){
		echo "products Successfuly Updated";
	}
	else{
		echo "db error";
	}
}

?>