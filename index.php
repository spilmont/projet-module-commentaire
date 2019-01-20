<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 17/01/2019
 * Time: 14:16
 */

$serverName = "localhost";
$userName = "root";
$password = "";
$dbname = "commentaire";

$conn = new mysqli($serverName, $userName, $password);


if ($conn->connect_error) {
    die("connect failed:" . $conn->connect_error);
} else {
    $conn->select_db($dbname);
}

$limit =5;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="main">
    <div id="formulaire">
        <form action="" method="post">
            <input type="text" class="block" name="pseudo">
            <textarea class="block" name="commentaire"></textarea>
            <input type="submit" name="bouton" value="commenter">
        </form>

        <?php
        function afficher(){

        global $limit;
        global $conn;

        $page = (isset($_GET['page'])?$_GET['page']:0);

        $pagecourrante =$page *5;






        $sql = "select  * from `user`  order by id desc limit $pagecourrante,$limit";


        $result = $conn->query($sql);
        ?>

    </div>
    <div id="cont-com">
        <?php
        while ($row = $result->fetch_assoc()) {
            ?>

            <div id="commentaire">
                <div id=ent><?= nl2br($row['username']) . " le " . $row['date'] ?></div>
                <div><?= $row["commentaire"] ?></div>
            </div>
            <?php
        } ?>
    </div>
</div>
<script type="javascript" src="script.js"></script>
</body>
</html>
<?php
}

function pagination()
{
    global $conn;
    global $limit;

    $sql = "SELECT COUNT(*) AS nbrcomm FROM `user`";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $nbrcomm = $row['nbrcomm'];
    }
    $nbrPage = ceil($nbrcomm / $limit);
    echo "Pages: ";
    for ($i = 1; $i <= $nbrPage; $i++) {
        echo '<a href="index.php?page=' . ($i -1) . '">' . $i . '</a> ';
    }
}





function commentaire()
{
    global $conn;


    $sql = "insert into `user`(`username`,`commentaire`,`date`) values (?,?,NOW())";




    if (isset($_POST['pseudo']) and isset($_POST['commentaire'])) {

        $recup1 = $_POST['pseudo'];
        $recup2 = $_POST['commentaire'];



        $connection = $conn->prepare($sql);

        $connection->bind_param('ss', $recup1, $recup2);

        $connection->execute();


        $connection->close();

        header("location:index.php");

    }

}

commentaire();
        afficher();
pagination();

?>






