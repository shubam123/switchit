<?php 
    require "../db/db.php";

    $db=new Database;
    $db->connect();
    
    $output = Array();

    $query = "SELECT * FROM `table1`";

    $result = $db->makeQuery($query) or die('Query failed!' . mysqli_error($db->connection));
    if($result)
    {
        $output['success'] = true;
        $output['msg'] = "Details fetched";
        $output['response'] = Array();
        while($row = mysqli_fetch_assoc($result))
        {
            array_push($output['response'],$row);
        }

    }
    else
    {
        $output['success'] = false;
        $output['msg'] = "Error in fetching details";
    }



    header("Content-type : application/json");
    echo json_encode($output); 
    
?>





 