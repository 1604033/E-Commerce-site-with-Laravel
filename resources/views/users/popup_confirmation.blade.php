<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <!-- Include any CSS styles or libraries here -->
</head>
<body>
    <!-- Add HTML content for the confirmation popup -->
    <script>
        // JavaScript code to display the popup confirmation
        alert('Your order has been successfully placed! Please wait for confirmation from the admin.');
        // Redirect the user to the homepage after displaying the popup
        window.location.href = "{{ route('homepage') }}";
    </script>
</body>
</html>
