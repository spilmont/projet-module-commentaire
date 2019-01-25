


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







        function afficher(){
        global $limit;
        global $conn;
            $i =0;
        $page = (isset($_GET['page'])?$_GET['page']:1);
        $pagecourrante =($page-1) *5;

switch($_GET['action']) {
    case"affProducts":
        $sql = "select  * from `user`  order by id desc limit $pagecourrante,$limit";
        break;
}

if(isset($sql)){

        $result = $conn->query($sql);

       $arr = array();
        while ($row = $result->fetch_assoc()) {

            $arr[] = $row;

        }

 echo json_encode($arr);

}

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
        echo '<a href="index.php?page=' . $i  . '">' . $i . '</a> ';
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






?>





