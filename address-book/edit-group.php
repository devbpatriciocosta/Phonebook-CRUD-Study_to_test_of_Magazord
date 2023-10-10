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

$name = '';

$select_query = "SELECT * FROM `_group_` WHERE `id`=:group_id";
$stmt = $conn->prepare($select_query);
$stmt->bindParam(':group_id',$groupId);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
if($result)
{
   $name = $result['name'];
}



// edit group name
if(isset($_POST['submit']))
{

    $name = $_POST['group-name'];

    $stmt = $conn->prepare('UPDATE `_group_` SET `name`=:name WHERE `id`=:id');

    try
    {
        if($stmt->execute(array(':name'=>$name, ':id'=>$groupId)))
        {
            $_SESSION['success'] = "group name updated";
            header('Location: edit-group.php');
            exit();
        }
        else
        {
            $_SESSION['error'] = "group name not updated";
            header('Location: edit-group.php');
            exit();
        }
    }
    catch(PDOException $ex)
    {
        $_SESSION['error'] = "group name not updated - " . $ex->getMessage();
    }

    unset($_SESSION['success']);
    unset($_SESSION['error']);

    header('Location: edit-group.php');
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
  <title>Edit Group</title>
</head>
<body>

    <?php echo '<div class="user-email">' . $email . '</div>' ; ?>
    
    <h1>Edit Group</h1>
    <form method="post" action="#">

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


        <label for="group-name">Group Name:</label>
        <input type="text" name="group-name" id="group-name" value="<?php echo $name ?>" required>
        <input type="submit" name="submit" value="Edit Group">
        <a class="cancel" href="groups.php" title='Groups'>Groups</a>
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




































