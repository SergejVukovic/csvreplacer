<?php
if(isset($_POST["filename"])) {
    $filename = $_POST["filename"];
    if (!empty($filename)) {
        // Specify file path.
        $path = '../csv/download/'; //
        $download_file = $path . $filename.".csv";
        // Check file is exists on given path.
        if (file_exists($download_file)) {
            // Getting file extension.
            $extension = explode('.', $filename);
            $extension = $extension[count($extension) - 1];
            // For Gecko browsers
            header('Content-Transfer-Encoding: binary');
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s', filemtime($path)) . ' GMT');
            // Supports for download resume
            header('Accept-Ranges: bytes');
            // Calculate File size
            header('Content-Length: ' . filesize($download_file));
            header('Content-Encoding: none');
            // Change the mime type if the file is not PDF
            header('Content-Type: application/' . $extension);
            // Make the browser display the Save As dialog
            header('Content-Disposition: attachment; filename=' . $filename.".csv");
            readfile($download_file);
            exit;
        } else {
            echo 'File does not exists on given path';
        }
    }
}