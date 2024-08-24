<?php
// Include your database connection script

include 'components/connect.php';
include 'components/wishlist_cart.php';


// Query to retrieve data from the order_details view
$sql = "SELECT * FROM order_details";

try {
    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);
    
    // Execute the query
    $stmt->execute();
    
    // Fetch all rows as associative arrays
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Handle errors
    die("Error: " . $e->getMessage());
}
?>
<?php include 'components/user_header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Order Details</h1>
    <table>
        <tr>
            <th>Order ID</th>
            <th>User Name</th>
            <th>User Email</th>
            <th>Product Name</th>
            <th>Product Number</th>
            <th>Payment Method</th>
            <th>Delivery Address</th>
            <th>Products Ordered</th>
            <th>Total Price</th>
            <th>Order Placed On</th>
            <th>Payment Status</th>
        </tr>
        <?php
        // Check if there are rows returned
        if ($rows) {
            // Output data of each row
            foreach ($rows as $row) {
                echo "<tr>";
                echo "<td>" . $row["order_id"] . "</td>";
                echo "<td>" . $row["user_name"] . "</td>";
                echo "<td>" . $row["user_email"] . "</td>";
                echo "<td>" . $row["product_name"] . "</td>";
                echo "<td>" . $row["product_number"] . "</td>";
                echo "<td>" . $row["payment_method"] . "</td>";
                echo "<td>" . $row["delivery_address"] . "</td>";
                echo "<td>" . $row["products_ordered"] . "</td>";
                echo "<td>" . $row["total_price"] . "</td>";
                echo "<td>" . $row["order_placed_on"] . "</td>";
                echo "<td>" . $row["payment_status"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='11'>No orders found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
// Close the database connection
$conn = null;
?>
