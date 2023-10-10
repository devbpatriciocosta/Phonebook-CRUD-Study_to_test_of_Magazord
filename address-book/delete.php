<?php

// start the session
session_start();

$email = "";

// check if the user is logged in
if(isset($_SESSION['user_id']))
{
    $email = $_SESSION['email'];
}

// if not redirect to the login page
else
{
   header('Location: login.php');
   exit();
}

require_once 'db_connect.php';


// get the group id from the url
$groupId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if($groupId === false)
{
    die("Invalid Group ID");
}


// remove group
if(isset($_POST['submit']))
{

    $stmt = $conn->prepare('DELETE FROM `_group_` WHERE `id`=:id');

    try
    {
        if($stmt->execute(array(':id'=>$groupId)))
        {
            if($stmt->rowCount() > 0)
            {
                $_SESSION['success'] = "group deleted";
                header('Location: delete.php');
                exit();
            }
            else
            {
                $_SESSION['error'] = "group not deleted";
                header('Location: delete.php');
                exit();
            }
        }
        else
        {
            $_SESSION['error'] = "group not deleted";
            header('Location: delete.php');
            exit();
        }
    }
    catch(PDOException $ex)
    {
        $_SESSION['error'] = "group not deleted - " . $ex->getMessage();
    }

    unset($_SESSION['success']);
    unset($_SESSION['error']);

    header('Location: delete.php');
    exit();

}


/* 
add a foreign key constraint to the group_id column in the _contacts_ table, 
referencing the id column in the _groups_ table. 
The ON DELETE CASCADE option ensures that when a group is deleted, 
all contacts associated with that group will also be deleted.

ALTER TABLE _contact_ 
ADD FOREIGN KEY (group_id) REFERENCES _group_(id) ON DELETE CASCADE


*/



?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="form-style.css">
  <title>Remove Group</title>

  <style>

    input[type="submit"]{ background-color: #f44336; width:45%; }

    input[type="submit"]:hover{ background-color: #e53935; }



  </style>

</head>
<body>

    <?php echo '<div class="user-email">' . $email . '</div>' ; ?>

    <h1>Remove Group</h1>
    <form method="post" action="#">
    <p class="confirm">Are you sure you want to delete this group?<p>
        <?php

            if(isset($_SESSION['error'])){
                echo '<div class="alert error"><p>' . $_SESSION['error'] . '</p><span class="close">
                        &times;</span></div>' ;
            }
            elseif(isset($_SESSION['success']))
            {
                echo '<div class="alert success"><p>' . $_SESSION['success'] . '</p><span class="close">
                &times;</span></div>' ;
            }

            unset($_SESSION['error']);
            unset($_SESSION['success']);

        ?>

        <input type="submit" name="submit" value="Delete Group">
        <a class="cancel" href="groups.php" title='back to groups'>Groups</a>
    </form>

<script>

// close the alert message
document.querySelectorAll(".close").forEach(function(closeButton){

   closeButton.addEventListener("click",function(){
       closeButton.parentElement.style.display = "none";
   });

});

</script>



</body>
</html>




































