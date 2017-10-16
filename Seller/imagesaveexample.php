<!DOCTYPE html>
<html>
<head>
    <title>Image Praktis</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="image" />
        <br>
        <input type="submit" name="sumit" value="Upload">
    </form>
    <?php

       include('..\functions\item.php');
        $itemServices = new ItemServices();

        if(isset($_POST['sumit']))
        {
            echo"<pre>";
            var_dump($_FILES);
            if(getimagesize($_FILES['image']['tmp_name'])==FALSE)
            {
                echo"Please select an image";
            }
            else
            {
                $image=addslashes($_FILES['image']['tmp_name']);
                $name=addslashes($_FILES['image']['name']);
                $image = file_get_contents($image);
                $image= base64_encode($image);
                $itemServices->saveimage($name,$image);
            }   
        }
        displayimage();

        function displayimage()
        {
            $conn=mysql_connect("localhost","root","");
            mysql_select_db("buynsell",$conn);
            $qry="Select * From image";
            $result=mysql_query($qry,$conn);
            while($row = mysql_fetch_array($result))
            {
                echo'<img height="300" width="300" src="data:image;base64,'.$row[2].' " >';

            }
            
        }
    ?>
</body>
</html>