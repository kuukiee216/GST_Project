<?php

$filename = 'Documents/Parungao_Ron Henrick_Cadang_Resume(2).pdf'; // Change this to the path of your image or PDF file

// Check if the file exists
if (file_exists($filename)) {
    // Determine the file type based on the file extension
    $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    switch ($extension) {
        case 'jpg':
        case 'jpeg':
            $content_type = 'image/jpeg';
            break;
        case 'png':
            $content_type = 'image/png';
            break;
        case 'pdf':
            $content_type = 'application/pdf';
            break;
        default:
            // Unsupported file type
            header('Content-Type: text/plain');
            echo 'Unsupported file type';
            exit;
    }

    // Set appropriate headers to open in a new tab
    header('Content-Type: ' . $content_type);
    header('Content-Disposition: inline; filename="' . basename($filename) . '"');
    header('Content-Transfer-Encoding: binary');
    header('Accept-Ranges: bytes');

    // Output the file
    readfile($filename);
    ECHO 'FILE';
    exit; // Stop further execution
} else {
    // If the file doesn't exist, you can show an error message or redirect to another page
    echo 'File not found';
}
?>