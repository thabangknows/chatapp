<?php
$conn = new mysqli('localhost', 'root', '','chatapp');


if(isset($_GET['msg'])){
    header('location: /index.php?open_chat=true&msg=How can we help today?');
}


if(isset($_POST['send_message'])){
    $message_id = uniqid('mess_00', true);
    $agent_id = 0011;
    $chatroom_id = "chatroom_0065";
    $content = $_POST['message'];

    $sql = "INSERT INTO chatroom (MessageID, AgentID, Content)
            VALUES('$message_id', '$agent_id', '$content')";
    $results = mysqli_query($conn, $sql);

    header('location: /index.php?has_messages=true&msg=How can we help today?&open_chat=true');

}
