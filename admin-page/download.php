<?php
if(isset($_GET['file']) && !empty($_GET['file'])){
    $filename = basename($_GET['file']); // sanitize the input to prevent directory traversal attacks
    $filepath = 'pengajuan/' . $filename; // adjust to 'pengajuan/' according to your directory structure

    if(file_exists($filepath)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/pdf'); // Set to application/pdf because you only upload PDF files
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        readfile($filepath);
        exit;
    }else{
        echo "The file does not exist.";
    }
}
