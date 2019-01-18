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
$dbname ="commentaire";

$conn = new mysqli($serverName,$userName,$password);




if($conn->connect_error){
    die("connect failed:".$conn->connect_error);
}else{
    $conn->select_db($dbname);
}
?>

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="style.css" >
</head>
<body>
    <div id="main">
    <div id="formulaire">
        <form action="" method="post">
            <input type="text" class="block" name="pseudo" >
           <textarea class="block" name="commentaire"></textarea>
            <input type="submit" name="bouton" value="commenter">
        </form>

<?php
function afficher(){

    global $conn;

    $p= array(1=>0,2=>5);



    foreach ($p as $cles =>$value){



            $sql="select  * from `user` order by id desc limit $value, 5";


 }








    $result=  $conn->query($sql);
    ?>

    </div>
    <div id="cont-com">
    <?php
    while($row = $result->fetch_assoc()){
        ?>

    <div id="commentaire">
        <div id =ent><?= $row['username']." le ".$row['date'] ?></div>
        <div><?= $row["commentaire"] ?></div>
    </div>
    <?php
    }?>
    </div>
    </div>
    <script type="javascript" src="script.js"></script>
</body>
</html>
<?php
}


function commentaire()
{
    global $conn;



    $sql ="insert into `user`(`username`,`commentaire`,`date`) values (?,?,NOW())";

    $username = (isset($_POST['pseudo'])?$_POST['pseudo']:null);
    $username = filter_var($username,FILTER_SANITIZE_STRING);
    $commentaire = (isset($_POST['commentaire'])?$_POST['commentaire']:null);
    $commentaire = filter_var($commentaire,FILTER_SANITIZE_STRING);






if (isset($_POST['pseudo']) and isset($_POST['commentaire']) ) {

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
?>






