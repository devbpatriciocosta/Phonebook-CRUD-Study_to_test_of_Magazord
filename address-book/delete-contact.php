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
$contactId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if($contactId === false)
{
    die("Invalid Contact ID");
}


// remove contact
if(isset($_POST['submit']))
{

    $stmt = $conn->prepare('DELETE FROM `_contact_` WHERE `id`=:id');

    try
    {
        if($stmt->execute(array(':id'=>$contactId)))
        {
            if($stmt->rowCount() > 0)
            {
                $_SESSION['success'] = "contact deleted";
                header('Location: delete-contact.php');
                exit();
            }
            else
            {
                $_SESSION['error'] = "contact not deleted";
                header('Location: delete-contact.php');
                exit();
            }
        }
        elseif($stmt->rowCount() > 0)
        {
            $_SESSION['error'] = "contact not deleted";
            header('Location: delete-contact.php');
            exit();
        }
        else
        {
            $_SESSION['error'] = "contact not deleted";
            header('Location: delete-contact.php');
            exit();
        }
    }
    catch(PDOException $ex)
    {
        $_SESSION['error'] = "contact not deleted - " . $ex->getMessage();
    }

    unset($_SESSION['success']);
    unset($_SESSION['error']);

    header('Location: delete-contact.php');
    exit();

}


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="form-style.css">
  <title>Remove Contact</title>

  <style>

    input[type="submit"]{ background-color: #f44336; width:45%; }

    input[type="submit"]:hover{ background-color: #e53935; }



  </style>

</head>
<body>

    <?php echo '<div class="user-email">' . $email . '</div>' ; ?>

    <h1>Remove Contact</h1>
    <form method="post" action="#">
    <p class="confirm">Are you sure you want to delete this contact?<p>
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

        <input type="submit" name="submit" value="Delete Contact">
        <a class="cancel" href="contacts.php" title='contacts'>Contacts</a>
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




































