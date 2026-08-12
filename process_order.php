<?php

require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $customer_name = $_POST["fullname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $product = $_POST["product"];
    $quantity = $_POST["quantity"];
    $address = $_POST["address"];

    $sql = "INSERT INTO orders
            (customer_name, email, phone, product, quantity, address)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Unable to process order.");
    }

    $stmt->bind_param(
        "ssssis",
        $customer_name,
        $email,
        $phone,
        $product,
        $quantity,
        $address
    );

    if ($stmt->execute()) {
        ?>

        <!DOCTYPE html>
        <html>

        <head>
            <title>AMIDZI NUTS | Order Confirmation</title>
            <link rel="stylesheet" href="style.css">
        </head>

        <body>

        <header>
             <img src="images/logo.png"
             alt="AMIDZI NUTS Logo"
             title="AMIDZI NUTS"
             width="100">

            <h1>AMIDZI NUTS</h1>
            <p>Fresh &bull; Healthy &bull; Delicious</p>
        </header>

        <main>

            <h2>Order Submitted Successfully!</h2>

            <p>
                Thank you,
                <strong><?php echo htmlspecialchars($customer_name); ?></strong>.
            </p>

            <p>
                Your order for
                <strong><?php echo htmlspecialchars($quantity); ?> kg
                of <?php echo htmlspecialchars($product); ?></strong>
                has been received.
            </p>

            <p>
                We will process your order and contact you using the
                details provided.
            </p>

            <p>
                <a href="order.html">Place Another Order</a>
            </p>

            <p>
                <a href="index.html">Return to Home</a>
            </p>

        </main>

        <footer>
            <h3>AMIDZI NUTS</h3>

<p>Fresh &bull; Healthy &bull; Delicious</p>

<p><a href="mailto:amidzinuts@gmail.com">Email: amidzinuts@gmail.com</a></p>

<p><a href="tel:+254 700 610 091">Phone: +254 700 610 091</a></p>

<p>Open: Monday - Saturday | 8:00 AM - 6:00 PM</p>

<p>&copy; 2026 AMIDZI NUTS. All Rights Reserved.</p>
        </footer>

        </body>

        </html>

        <?php

    } else {

        echo "Unable to save your order. Please try again.";

    }

    $stmt->close();

} else {

    echo "Invalid request.";

}

$conn->close();

?>