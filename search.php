<?php
include 'db.php';

if (isset($_POST['searchQuery'])) {
    $searchQuery = $_POST['searchQuery'];

    $sql = "SELECT * FROM beds WHERE name LIKE ?";
    $stmt = $conn->prepare($sql);
    $searchTerm = '%' . $searchQuery . '%';
    $stmt->bind_param("s", $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="product-card">';
            echo '<img src="' . $row['image'] . '" alt="' . $row['name'] . '">';
            echo '<h3>' . $row['name'] . '</h3>';
            echo '<p>' . $row['price'] . ' руб.</p>';
            echo '<a href="blog.php?id='.$row['id'].'"><button class="add-to-cart">Подробнее</button></a>';
            echo '</div>';
        }
    } else {
        echo 'Ничего не найдено.';
    }
} else {
    echo 'Поисковый запрос не был передан.';
}
?>

