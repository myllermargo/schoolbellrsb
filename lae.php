
<?php



$allowed_types = array('audio/mpeg', 'audio/wav', 'audio/x-wav');

if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
    // Check file type
    $file_type = mime_content_type($_FILES['file']['tmp_name']);
    if (in_array($file_type, $allowed_types)) {
        // Validate file extension
        $file_extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        if ($file_extension === 'mp3' || $file_extension === 'wav') {
            // Generate unique filename
            $flname=substr($_FILES['file']['name'],0,-4);
            $file_name = uniqid(str_replace(' ', '_',$flname)) . '.' . $file_extension;
            $target_path = 'muusika/' . $file_name;

            // Move uploaded file to the target folder
            if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
                echo 'Kõik korras';
                header("Location: index.php?leht=satted");
            } else {
                echo 'Ei saa panna kasusta';
            }
        } else {
            echo 'Valet tüüpi muusika ';
        }
    } else {
        echo 'Valet tüüpi muusika teine';
        print_r($allowed_types);
    }
} else {
    echo 'Jama üleslaadimisega';
}
/*
if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
 
} else {
    // Display error message based on error code
    switch ($_FILES['file']['error']) {
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            echo 'The uploaded file exceeds the maximum file size allowed.';
            break;
        case UPLOAD_ERR_PARTIAL:
            echo 'The uploaded file was only partially uploaded.';
            break;
        case UPLOAD_ERR_NO_FILE:
            echo 'No file was uploaded.';
            break;
        case UPLOAD_ERR_NO_TMP_DIR:
            echo 'Missing temporary folder.';
            break;
        case UPLOAD_ERR_CANT_WRITE:
            echo 'Failed to write file to disk.';
            break;
        case UPLOAD_ERR_EXTENSION:
            echo 'A PHP extension stopped the file upload.';
            break;
        default:
            echo 'Unknown error occurred.';
            break;
    }
}*/
?>
