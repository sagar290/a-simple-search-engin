<?php

require 'connect.inc.php';




if(isset($_POST['search_name'])) {
    $search_name = $_POST['search_name'];
    if(!empty($search_name)) {
        $query = "SELECT `name` FROM `names` WHERE `name` LIKE '%".mysql_real_escape_string($search_name)."%' ";
        $query_run = mysql_query($query);
        $num_rows = mysql_num_rows($query_run);
        echo $num_rows .'  <strong> Result found </strong> : <br>';
        if ($num_rows>=1) {
            while ($query_row = mysql_fetch_assoc($query_run)) {
              echo $query_row['name'].'<br>';
            }
        } else {
            echo 'not found';
        }
    }
}

?>

<form class="" action="index.php" method="POST">
  <hr>
    name: <input type="txt" name="search_name" >
    <input type="submit" name="submit" value="submit">
</form>
