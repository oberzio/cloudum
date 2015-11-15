<?php include('auth.inc.php'); 
    
    unset($_SESSION['usuario']);
    unset($_SESSION['rol']);
    unset($_SESSION['auth2f']);   
    session_destroy();
    
    if(isset($_GET['id']) && isset($_GET['ty']) && !empty($_GET['id']) && !empty($_GET['ty']))
    {
        $url='login.php?id=' .$_GET['id']. '&ty='. $_GET['ty'];  
        header('Location: '.$url);
    }
    else
    {
        header('Location: ./login.php');
        echo "caca";
    }
 ?>
    