<?php
include('baglan.php');


if(!is_null($_SESSION['user_id']))
{
      
        session_destroy();
        unset($_SESSION);
        header('Location: index.php');
    
}

?>