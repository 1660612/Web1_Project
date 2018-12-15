<?php
    ini_set('mysql.connect_timeout',300);
    ini_set('default_socket_timeout',300);

?>
<html>
    <body>
        <form method="post" enctype="multipart/form-data">
            <br/>
            <input type="file" name="image" />
            <br/><br/>
            <input type="submit" name="sumit" value="Upload"/>
        </form>
        <?php
            if(isset($_POST['sumit']))
            {
                if(getimagesize($_FILES['image']['tmp_name']) == FALSE)
                {
                    echo 'please choose an image';
                }
                else
                {
                    $image = addslashes($_FILES['image']['tmp_name']);
                    $name = addslashes($_FILES['image']['name']);
                    $image = file_get_contents($image);
                    $image = base64_encode($image);
                    saveImage($name, $image);
                }
            }
            displayImage();
        function saveImage($name, $image)
        {
            $conn = mysqli_connect("localhost","root","","test_image") or die("Cannot connect to Database");
//                mysqli_set_charset($conn,"utf8");
            $sql = "insert into images (name, image) values ('$name','$image')";
            $result = mysqli_query($conn, $sql);
            if($result)
            {
                echo "File uploaded";
            }
            else
            {
                echo "File not uploaded";
            }
        }
        function displayImage()
        {
            $conn = mysqli_connect("localhost","root","","test_image") or die("Cannot connect to Database");
//                mysqli_set_charset($conn,"utf8");
            $sql = "select * from images";
            $result = mysqli_query($conn, $sql);
            while($row=mysqli_fetch_array($result))
            {
                echo '<img height="300" width="300" src="data:image;base64,'.$row[2].' ">';
            }
            mysqli_close($conn);
        }
        ?>
    </body>
</html>
