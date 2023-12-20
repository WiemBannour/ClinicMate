<?php
$username = $_POST['username'];
$id = $_POST['id'];
$email = $_POST['mail'];
$password = $_POST['mot_de_passe'];
$roles = $_POST['roles'];
$genre = $_POST['gender'];
$date_de_naissance = $_POST['date_de_naissance'];

$servername = "localhost"; 
$username_db = "root"; 
$password_db = "";
$dbname = "clinimate";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username_db, $password_db);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("INSERT INTO coordonées (Username, ID, Email, Role, Gender,date_birth, password) VALUES (:username, :id, :email, :password, :roles, :genre, :date_de_naissance)");

    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':roles', $roles);
    $stmt->bindParam(':gender', $genre);
    $stmt->bindParam(':date_de_naissance', $date_de_naissance);

    $stmt->execute();
    header('Location: login.html');
 

    echo "Successful registration!";
    exit();
} catch(PDOException $e) {
    echo "Error : " . $e->getMessage();
}


$conn = null;
?>
