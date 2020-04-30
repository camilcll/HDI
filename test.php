<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="test.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="MAX_FILE_SIZE" value="500000" />
	Send this file: <input name="userfile" type="file" />
    <button type="submit" >Send File</button>
	</form>
</body>
</html>

<?php

if(!empty($_FILES['userfile'])){

$uploaddir = './uploads/avatar/';
$uploadfile = $uploaddir . 'user1.' . pathinfo($_FILES['userfile']['name'],PATHINFO_EXTENSION);


if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "File is valid, and was successfully uploaded.\n";
} else {
    echo "Possible file upload attack!\n";
}

echo 'Here is some more debugging info:';
print_r($_FILES);
}
?>