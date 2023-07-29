<?php
if(isset($_GET['file']) && !empty($_GET['file'])){
    $filename = basename($_GET['file']);
    $filepath = 'pengajuan/' . $filename;

    if(file_exists($filepath)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/pdf');
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
