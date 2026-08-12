<?php

require_once "db.php";

$sql = "SELECT * FROM orders ORDER BY order_date DESC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>

<head>
    <title>AMIDZI NUTS | Orders</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<header>
    <h1>AMIDZI NUTS</h1>
    <p>Customer Orders</p>
</header>

<nav>
    <a href="index.html">Home</a>
    <a href="products.html">Products</a>
    <a href="gallery.html">Gallery</a>
    <a href="order.html">Order</a>
    <a href="contact.html">Contact</a>
</nav>

<main>

    <h2>Customer Orders</h2>

    <?php if ($result->num_rows > 0): ?>

        <table border="1">

            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Address</th>
                <th>Order Date</th>
            </tr>

            <?php while ($row = $result->fetch_assoc()): ?>

                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo htmlspecialchars($row["customer_name"]); ?></td>
                    <td><?php echo htmlspecialchars($row["email"]); ?></td>
                    <td><?php echo htmlspecialchars($row["phone"]); ?></td>
                    <td><?php echo htmlspecialchars($row["product"]); ?></td>
                    <td><?php echo $row["quantity"]; ?></td>
                    <td><?php echo htmlspecialchars($row["address"]); ?></td>
                    <td><?php echo $row["order_date"]; ?></td>
                </tr>

            <?php endwhile; ?>

        </table>

    <?php else: ?>

        <p>No orders have been received yet.</p>

    <?php endif; ?>

</main>

<footer>
    <p>&copy; 2026 AMIDZI NUTS. All Rights Reserved.</p>
</footer>

</body>
</html>

<?php
$conn->close();
?>