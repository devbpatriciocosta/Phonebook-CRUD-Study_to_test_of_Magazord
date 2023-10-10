<?php

// start the session
session_start();

$email = '';

// check if the user is logged in
if(isset($_SESSION['user_id']))
{
    $email = $_SESSION['email'];
}
// if not redirect to the login page
else
{
   header('Location: login.php');
}

require_once "db_connect.php";

$user_id = $_SESSION['user_id'];

// get the user contacts
// Query to retrieve contacts
$sql = "SELECT _contact_.id, _contact_.name, _contact_.email, _contact_.phone, 
        _contact_.address, _group_.name as 'group' 
        FROM _contact_ 
        INNER JOIN _group_ 
        ON _contact_.group_id = _group_.id 
        WHERE _contact_.user_id =".$user_id;

if(isset($_POST['search-submit']))  
{
    $searchValue = $_POST['search-value'];
/*     $sql = "SELECT _contact_.id, _contact_.name, _contact_.email, _contact_.phone, 
            _contact_.address, _group_.name as 'group' 
            FROM _contact_ 
            INNER JOIN _group_ 
            ON _contact_.group_id = _group_.id 
            WHERE _contact_.name LIKE '%". $searchValue."%' 
            OR _contact_.email LIKE '%". $searchValue."%' 
            OR _contact_.phone  LIKE '%". $searchValue."%' 
            OR _contact_.address  LIKE '%". $searchValue."%' 
            OR _group_.name  LIKE '%". $searchValue."%' 
            AND _contact_.user_id =".$user_id; */
        
            $sql = "SELECT c.id, c.name, c.email, c.phone, c.address, g.name as 'group' 
            FROM _contact_ c
            INNER JOIN _group_ g ON c.group_id = g.id 
            WHERE c.user_id = ".$user_id."
            AND (
                c.name LIKE '%".$searchValue."%' 
                OR c.email LIKE '%".$searchValue."%' 
                OR c.phone  LIKE '%".$searchValue."%' 
                OR c.address  LIKE '%".$searchValue."%' 
                OR g.name  LIKE '%".$searchValue."%'
            )";
}      


$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id', $user_id );
$stmt->execute();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="contacts-style.css">
  <title>My Contacts</title>
</head>
<body>

    <div class="container">
    
       <?php echo '<div class="user-email">' . $email . '</div>' ; ?>

        <nav class="menu">
            <ul>
                <li><a href="groups.php">Groups</a></li>
                <li><a href="contacts.php">Contacts</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>

        <h1>My Contacts</h1>

        <div class="search">
            <form action="#" method="post">
                <input type="search" name="search-value" placeholder="search contacts...">
                <button type="submit" name="search-submit">search</button>
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Group</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php

                    // Generate table rows
                    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                    {
                        echo "<tr>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['email']."</td>";
                        echo "<td>".$row['phone']."</td>";
                        echo "<td>".$row['address']."</td>";
                        echo "<td>".$row['group']."</td>";
                        echo "<td>";
                        echo "<a href=edit-contact.php?id=".$row['id']." class='icon icon-edit' title='edit'></a>";
                        echo "<a href=delete-contact.php?id=".$row['id']." class='icon icon-delete' title='remove'></a>";
                        echo "</td>";
                        echo "</tr>";
                    }

                ?>

            </tbody>

        </table>

        <div class="icon-add-container">
            <a href="add-contact.php" class="icon icon-add" title="add contact">
                <i class="fas fa-plus"></i>
            </a>
        </div>

    </div>

</body>
</html>


