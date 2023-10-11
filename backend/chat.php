<?php



if(isset($_GET['msg'])){
    echo 'hello';

    header('location: /index.php?open_chat=true&msg=How can we help today?');
}



?>