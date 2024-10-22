<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $password = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql_check = "SELECT * FROM users WHERE name = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("s", $name);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        echo "Такой пользователь уже существует!";
    } else {
        $sql = "INSERT INTO users (name, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $name, $hashed_password);

        if ($stmt->execute()) {
            header('Location: index.php');
        } else {
            echo "Ошибка: " . $stmt->error;
        }
    }
}
?>

