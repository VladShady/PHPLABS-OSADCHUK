<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Library";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) { die("Помилка з'єднання: " . $conn->connect_error); }
$message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $member_name = $_POST['member_name'];
    $email = $_POST['email'];
    $membership_date = $_POST['membership_date'];
    $check_email_sql = "SELECT email FROM Members WHERE email = ?";
    $stmt = $conn->prepare($check_email_sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $message = "Помилка: Цей email вже зареєстровано.";
    } else {
        $insert_sql = "INSERT INTO Members (member_name, email, membership_date) VALUES (?, ?, ?)";
        $stmt_insert = $conn->prepare($insert_sql);
        $stmt_insert->bind_param("sss", $member_name, $email, $membership_date);
        if ($stmt_insert->execute()) { $message = "Нового члена бібліотеки успішно додано."; }
        else { $message = "Помилка додавання: " . $conn->error; }
        $stmt_insert->close();
    }
    $stmt->close();
}
$conn->close();
?>
<!DOCTYPE html>
<html>
<head><title>Додати нового члена бібліотеки</title></head>
<body>
    <h2>Форма додавання нового члена бібліотеки</h2>
    <?php if (!empty($message)) { echo "<p>" . $message . "</p>"; } ?>
    <form method="post">
        <label>Ім'я:</label><br><input type="text" name="member_name" required><br><br>
        <label>Email:</label><br><input type="email" name="email" required><br><br>
        <label>Дата реєстрації:</label><br><input type="date" name="membership_date" value="<?php echo date('Y-m-d'); ?>" required><br><br>
        <button type="submit">Додати</button>
    </form>
</body>
</html>