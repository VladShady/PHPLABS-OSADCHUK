<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Library";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) { die("Помилка з'єднання: " . $conn->connect_error); }
$last_month_date = date('Y-m-d', strtotime('-1 month'));
$sql = "SELECT id, member_name, email, membership_date FROM Members WHERE membership_date >= ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $last_month_date);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html>
<head><title>Список нових членів бібліотеки</title></head>
<body>
    <h2>Члени бібліотеки, зареєстровані за останній місяць</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr><th>ID</th><th>Ім'я</th><th>Email</th><th>Дата реєстрації</th></tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["member_name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["membership_date"] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Немає членів, зареєстрованих за останній місяць.</td></tr>";
        }
        ?>
    </table>
</body>
</html>
<?php
$stmt->close();
$conn->close();
?>