<?php    function username_exists($username,$conn){
        $sql = "select username from where username = '$username'";

        $result = $conn->query($sql);
            if($result->num_rows > 0){
                return true;
            }else{
                return false;
            }
            // return false
    }
?>