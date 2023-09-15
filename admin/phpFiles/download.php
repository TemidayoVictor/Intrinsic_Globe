<?php
if(!empty($_GET['sample'])) {
    $filename = basename($_GET['sample']);
    $filePath = "../samples/".$filename;

    if(!empty($filename) && file_exists($filePath)) {
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");

        readfile($filePath);
        exit;
    }
    else {
        echo "File not found";
    }
}

if(!empty($_GET['support'])) {
    $filename = basename($_GET['support']);
    $filePath = "../support/".$filename;

    if(!empty($filename) && file_exists($filePath)) {
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");

        readfile($filePath);
        exit;
    }
    else {
        echo "File not found";
    }
}

?>