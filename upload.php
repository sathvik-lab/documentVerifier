<?php 
// Path configuration 


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

    $fileName = basename($_FILES["file"]["name"]);

    $uploads_dir = 'assets/images';
    $count =0;
    move_uploaded_file($fileName, $uploads_dir.'/'.$pname);

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
    // if (strval($output) == "true" ) { 
    //     // echo 'true';
    //     $count = $count + 2;
    //     // checking the database for information if the user exists or not
    //     if($rnum == $str1) {
    //         $count = $count + 1;
    //     }
    // }
// echo $output;

if(strval($output) == "2")
{
    $targetDir = "uploads/"; 
    $watermarkImagePath = 'C:\xampp\htdocs\watermark\logo.jpg'; 
    
    $uploadedFileName =  $statusMsg = ''; 
    if(isset($_POST["submit"])){ 
        if(!empty($_FILES["file"]["name"])){ 
            // File upload path 
             
            $targetFilePath = $targetDir . $fileName; 
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION); 
            
            // Allow certain file formats 
            $allowTypes = array('jpg','png','jpeg'); 
            if(in_array($fileType, $allowTypes)){ 
                // Upload file to the server 
                if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){ 
                    // Load the stamp and the photo to apply the watermark to 
                    $watermarkImg = imagecreatefromjpeg($watermarkImagePath); 
                    switch($fileType){ 
                        case 'jpg': 
                            $im = imagecreatefromjpeg($targetFilePath); 
                            break; 
                        case 'jpeg': 
                            $im = imagecreatefromjpeg($targetFilePath); 
                            break; 
                        case 'png': 
                            $im = imagecreatefrompng($targetFilePath); 
                            break; 
                        default: 
                            $im = imagecreatefromjpeg($targetFilePath); 
                    } 
                    
                    // Set the margins for the watermark 
                    $marge_right = 10; 
                    $marge_bottom = 10; 
                    
                    // Get the height/width of the watermark image 
                    $sx = imagesx($watermarkImg); 
                    $sy = imagesy($watermarkImg); 
                    
                    // Copy the watermark image onto our photo using the margin offsets and  
                    // the photo width to calculate the positioning of the watermark. 
                    imagecopy($im, $watermarkImg, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($watermarkImg), imagesy($watermarkImg)); 
                    
                    // Save image and free memory 
                    imagepng($im, $targetFilePath); 
                    imagedestroy($im); 

                    $uploadedFileName = $fileName;
        
                    if(file_exists($targetFilePath)){ 
                        $statusMsg = "The image with watermark has been uploaded successfully."; 
                    }else{ 
                        $statusMsg = "Image upload failed, please try again."; 
                    }  
                }else{ 
                    $statusMsg = "Sorry, there was an error uploading your file."; 
                } 
            }else{ 
                $statusMsg = 'Sorry, only JPG, JPEG, and PNG files are allowed to upload.'; 
            } 
        }else{ 
            $statusMsg = 'Please select a file to upload.'; 
        } 
    } 
    
    // Display status message 
    echo $statusMsg;
}
}
    

?>

<html>
<head>
<style type="text/css">
    .img-box{
        display: inline-block;
        text-align: center;
        margin: 0 15px;
    }
</style>
</head>
<body>
    <?php
    
    $image = $uploadedFileName;
    

        echo '<div class="img-box">';
        echo '<img src="uploads/' . $image . '" width="200" alt="' .  pathinfo($image, PATHINFO_FILENAME) .'">';
        echo '<p><a href="download.php?file=' . urlencode($image) . '">Download</a></p>';
        echo '</div>';
    
    ?>
</body>
</html>