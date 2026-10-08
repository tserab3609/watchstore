<?php

include('layouts/header.php');
include('server/connection.php');

if (isset($_GET['data'])) {

    // Get eSewa response
    $decoded_data = base64_decode($_GET['data']);
    $response_data = json_decode($decoded_data, true);

    // Check payment status
    if (
        isset($response_data['status']) &&
        $response_data['status'] === 'COMPLETE'
    ) {

        // Get the actual database order ID
        $order_id = $_SESSION['order_id'];

        // Get transaction ID from eSewa
        $transaction_id = $response_data['transaction_code'];

        // Update order status
        $sql = "UPDATE orders SET order_status = 'Paid' WHERE order_id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $order_id);

        if ($stmt->execute()) {

            echo '
            <section class="my-5 py-5">
                <div class="container text-center mt-3 pt-5">
                    <h2>Payment Successful!</h2>

                    <p>Transaction ID: ' . $transaction_id . '</p>

                    <p>
                        Amount: Rs.' .
                        $response_data['total_amount'] .
                    '</p>

                    <a href="account.php" class="btn btn-primary">
                        View My Orders
                    </a>
                </div>
            </section>';

            // Remove order ID from session
            unset($_SESSION['order_id']);
            unset($_SESSION['transaction_uuid']);

        } else {

            echo '
            <section class="my-5 py-5">
                <div class="container text-center mt-3 pt-5">
                    <h2>Payment was successful, but order update failed.</h2>
                </div>
            </section>';
        }

        $stmt->close();

    } else {

        echo '
        <section class="my-5 py-5">
            <div class="container text-center mt-3 pt-5">
                <h2>Payment Failed!</h2>
            </div>
        </section>';
    }

} else {

    echo '
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2>Invalid Payment Response</h2>
        </div>
    </section>';
}

include('layouts/footer.php');

?>