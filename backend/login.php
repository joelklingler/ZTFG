<?php
$db_servername = "5.175.26.146:3307";
$db_username = "web";
$db_password = "123";
$db_name = "website";

$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

function login($username, $password, $conn) {
    $sql_statement = "SELECT * FROM users WHERE username = '". $username . "';";
    $result = $conn->query($sql_statement);
    $userId = -1;
    while($row = $result->fetch_assoc()) {
        if(password_verify($password, $row["password"]))
        {
            $userId = $row["id"];
            break;
        }
    }
    if($userId != -1) {
        setcookie("user", $userId, time()+86400);
        header('Location: /ZTFG');
        exit();
    }
    else {
        header('Location: /ZTFG/Login.html');
        exit();
    }
    
}

function register($username, $password, $conn) {
    $sql_statement = "INSERT INTO users (username, password) VALUES ('". $username . "', '" . password_hash($password, PASSWORD_DEFAULT) . "')";
    if($conn->query($sql_statement) === TRUE) {
        echo "SUCCESS";
    } else {
        echo "Error: " . $sql_statement . "<br>" . $conn->error;
    }
}

$username = $_POST["username"];
$password = $_POST["password"];
if(isset($_POST["login"]))
{
    login($username, $password, $conn);
}
elseif(isset($_POST["register"])) {
    register($username, $password, $conn);
}
else
{
    echo "ERROR";
}
?>