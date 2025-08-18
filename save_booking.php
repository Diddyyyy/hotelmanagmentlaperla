<?php
// 1. Database connection
$host = "localhost";
$user = "root"; // default in XAMPP
$pass = ""; // default is empty
$dbname = "booking";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// 2. Get form data from payment.html
$full_name = $_POST['Full_Name'];
$phone_number = $_POST['Phone_Number'];
$ic_number = $_POST['IC_Number'];
$arrival_date = $_POST['Arrival_Date'];
$departure_date = $_POST['Departure_Date'];
$guests = (int) $_POST['Number_of_Guests'];
$rooms = isset($_POST['Rooms']) ? (int) $_POST['rooms'] : 1;
$nights = (int) $_POST['Nights'];
$total_amount = (float) $_POST['Total_Amount'];
$room = $_POST['Room'];

// 3. Insert into database
$sql = "INSERT INTO bookings (Full_name, Phone_Number, IC_Number, Arrival_Date, Departure_Date, Number_of_Guests, Rooms, nights, Total_Amount, Room)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssiiids", $Full_Name, $Phone_Number, $IC_Number, $Arrival_Date, $Departure_Date, $Number_of_Guests, $Rooms, $Nights, $Total_Amount, $Room);

if ($stmt->execute()) {
    echo "<h2>Booking saved successfully!</h2>";
    echo "<p><a href='index.html'>Return to Home</a></p>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
