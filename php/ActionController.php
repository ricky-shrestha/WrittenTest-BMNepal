<?php
class ActionController
{
    public function handlePostRequest()
    {
        $input = $_POST;

        // Validate inputs
        if (!isset($input['id']) || !isset($input['value'])) {
            $this->sendErrorResponse("Missing required fields");
        }

        $id = $input['id'];
        $value = $input['value'];

        // Validate ID (should be a number)
        if (!is_numeric($id)) {
            $this->sendErrorResponse("Invalid ID. It should be a number");
        }

        // Validate Value (should be a string)
        if (!is_string($value)) {
            $this->sendErrorResponse("Invalid Value. It should be a string");
        }

        // Process inputs and generate output
        $output = [
            'id' => $id,
            'value' => $value,
            'status' => 'success'
        ];

        // Send JSON response
        header('Content-Type: application/json');
        echo json_encode($output);
    }

    private function sendErrorResponse($message)
    {
        $errorResponse = [
            'status' => 'error',
            'message' => $message
        ];

        // Send JSON response
        header('Content-Type: application/json');
        echo json_encode($errorResponse);
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $actionController = new ActionController();
    $actionController->handlePostRequest();
} else {
    // Handle invalid request method
    header('HTTP/1.1 405 Method Not Allowed');
    echo 'Invalid request method';
}
