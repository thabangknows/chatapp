<?php
$conn = new mysqli('localhost', 'root', '', 'chatapp');

if (isset($_GET['has_messages'])) {
    $chatroom_id = 'chatroom_0065';

    $sql = "SELECT * FROM chatroom WHERE ChatroomID='$chatroom_id'";
    $messages = mysqli_query($conn, $sql);

    //$message = mysqli_fetch_assoc($messages);

    //print_r($message);
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/styles.css">
    <title>Chat App</title>
</head>

<body>
    <section>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Menu</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Play</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Inbox</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Draws</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " aria-disabled="true">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " aria-disabled="true">Share App</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>


    <?php

    if (isset($_GET['open_chat'])) {
    ?>
        <section>
            <div class="chatbox">
                <div class="chatline">
                    <h6><strong>Bot</strong></h6>
                    <p><?php echo $_GET['msg'] ?></p>
                </div>

                <?php
                while ($message = mysqli_fetch_assoc($messages)) {
                ?>

                <div class="chatline">
                    <h6><strong>User</strong></h6>
                    <p><?php echo $message['Content'] ?></p>
                </div>
                <?php
                }

                ?>



                <form action="./backend/chat.php" method="post">


                    <div class="inputbox">
                        <span>
                            <label for="file-input" class="custom-file-input">
                                <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-paperclip" viewBox="0 0 16 16">
                                        <path d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z" />
                                    </svg></span> <!-- Unicode for a file icon (you can replace this with your desired icon) -->

                            </label>
                            <input type="file" id="file-input" class="file-input">


                        </span>
                        <input name="message" placeholder="type your message here..." type="text">
                        <span>
                            <button name="send_message" style="border: none;" type="submit">
                                <svg style="color: blue;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                    <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                                </svg>
                            </button>

                        </span>
                    </div>

                </form>

            </div>


        </section>
    <?php
    }
    ?>

    <section>
        <div class="chat">
            <span>
                <a href="./backend/chat.php?msg=open_chat">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-chat-left-text-fill" viewBox="0 0 16 16">
                        <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z" />
                    </svg>
                </a>

            </span>
        </div>
    </section>









    <script>
        // Add event listener to trigger the real file input when the custom input is clicked
        document.querySelector('.custom-file-input').addEventListener('click', function() {
            document.getElementById('file-input').click();
        });

        // Update the text in the custom input to show the selected file name
        document.getElementById('file-input').addEventListener('change', function() {
            const fileName = this.files[0].name;
            document.querySelector('.custom-file-input').textContent = `Selected: ${fileName}`;
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>