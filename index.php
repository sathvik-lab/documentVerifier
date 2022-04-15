
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Verifier</title>
    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Smooch+Sans:wght@700&display=swap" rel="stylesheet">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   
    <!-- <script src="app.js" defer></script> -->
</head>
<body class="container">
    <div class="card mt-3">
        <div class="search m-2">
            <form action="upload.php" method="POST" enctype = "multipart/form-data">
                <input type="text" name="title" placeholder= "Enter a title" >
                Name : <input type="text" name="name" placeholder = "Enter your name" >
                RollNo: <input type="text" name="rnum" placeholder = "Enter roll no" >
                DOB:<input type="text" name="dob" placeholder = "dd/mm/yyyy" >

                Select Image File to Upload:
                <input type="file" name="file">
                <input type="submit" name="submit" value="Upload">
                <button type="submit" name ="download">Download</button>
                
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>






<!-- 
<php

$servername = "localhost:4306";
$username = "root";
$password = "";
$database = "docverifier";
// $database2 = "userInputs";

$conn = mysqli_connect($servername,$username,$password,$database);
// $connect = mysqli_connect($servername,$username,$password,$database2);

if (!$conn)
{
	die("Failed to Connect" . mysqli_connect_error());
}
// if (!$connect)
// {
// 	die("Failed to Connect" . mysqli_connect_error());
// }

if(isset($_POST['submit'])) {
    $title = $_POST["title"];
    $name = $_POST["name"];
    $rnum = $_POST["rnum"];
    $dob = $_POST["dob"];

    $pname = rand(1000,10000)."-".$_FILES["file"]["name"];

    $tname = $_FILES["files"]["tmp_name"];

    $uploads_dir = 'assets/images';
    $count =0;
    move_uploaded_file($tname, $uploads_dir.'/'.$pname);

    $sql = "INSERT into fileup(title,Name,DOB,rollnum,image) VALUES('$title','$name','$dob','$rnum','$pname')";

    // $sql1 = "INSERT into info(title,image) VALUES('$title','$pname')";

    // taking the info from the existing image .
    $str = "AMOLE ON THE RIGHT LEG";
    $str1 = "1821101039";

    // if(mysqli_query($conn,$sql)){
    //     echo "File Successfully uploaded";
    // }

    $command = escapeshellcmd('python test.py');
    $output = shell_exec($command);

    //trial
    // $str = 'Aadhaar No. ' .$anum. ' CERTIFIED THAT : ' .$name. ' ';

    // to verify if the given data exists or not


    //checked if the two conditions in the verification are satisfied or not.
    // 1- text in image  2- info in QR  
    if (strval($output) == 'true' ) { 
        echo 'true';
        $count = $count + 2;
        // checking the database for information if the user exists or not
        if($rnum == $str1) {
            $count = $count + 1;
        }
    }

    // checking the database for information if the user exists or not

   




 -->