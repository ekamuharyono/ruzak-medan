<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    if (isset($input['productId'], $input['quantity'])) {
        $response = [
            'status' => 'success',
            'message' => 'Checkout berhasil!',
            'details' => [
                'productId' => $input['productId'],
                'quantity' => $input['quantity']
            ]
        ];
    } else {
        $response = [
            'status' => 'error',
            'message' => 'Data tidak lengkap!'
        ];
    }

    echo json_encode($response);
} else {
    echo json_encode(['message' => 'Method not allowed']);
}
