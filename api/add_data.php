<?php 
    require "../db/db.php";
    $output = Array();

    if(isset($_FILES['image']) && isset($_POST['title']) && isset($_POST['description']) && isset($_POST['url']))
    {
        $db=new Database;
        $db->connect();

        $title = mysqli_real_escape_string($db->connection,$_POST['title']);
        $description = mysqli_real_escape_string($db->connection,$_POST['description']);
        $url = mysqli_real_escape_string($db->connection,$_POST['url']);

        $image_url = "http://35.154.85.66/switchit/images/".$_FILES['image']['name'].rand();
        if(move_uploaded_file($_FILES['image']['tmp_name'], "$image_url"))
        {
            $output['img_upload'] = true;
        }

        $query = "INSERT INTO `table1`(`image`, `title`, `description`, `url`) VALUES ('$image_url','$title', '$description', '$url')";

        $result = $db->makeQuery($query) or die('Query failed!' . mysqli_error($db->connection));
        if($result)
        {
            $output['success'] = true;
            $output['msg'] = "Details added";
        }
        else
        {
            $output['success'] = false;
            $output['msg'] = "Error in adding details";
        }
    }
    else
    {
        $output['success'] = false;
        $output['msg'] = "Key not found";

    }


    header("Content-type : application/json");
    echo json_encode($output); 
    
?>





 