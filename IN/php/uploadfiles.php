
<?php
// In PHP versions earlier than 4.1.0, $HTTP_POST_FILES should be used instead
// of $_FILES.
function uploadfiles($cname)
{
    $uploaddir = '../uploads/';
//upload files for the first upload button
    if (file_exists($_FILES['userfile']['tmp_name']) || is_uploaded_file($_FILES['userfile']['tmp_name'])) {
        $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
        //echo $uploadfile;

        echo '<pre>';
        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
            echo "File is valid, and was successfully uploaded.\n";
            $newname = $cname . '_' . $_FILES['userfile']['name'];
            rename($uploadfile, $uploaddir . $newname);
        } else {
            echo "Sorry! Your first file cannot be uploaded. Try again or contact administrator\n";
            return 0;
        }
    }

//upload files for the second upload button
    if (file_exists($_FILES['userfile2']['tmp_name']) || is_uploaded_file($_FILES['userfile2']['tmp_name'])) {
        $uploadfile = $uploaddir . basename($_FILES['userfile2']['name']);
        //echo $uploadfile;

        echo '<pre>';
        if (move_uploaded_file($_FILES['userfile2']['tmp_name'], $uploadfile)) {
            echo "File is valid, and was successfully uploaded.\n";
            $newname = $cname . '_' . $_FILES['userfile2']['name'];
            rename($uploadfile, $uploaddir . $newname);
        } else {
            echo "Sorry! Your second file cannot be uploaded. Try again or contact administrator\n";
            return 0;
        }
    }

//upload files for the third upload button
    if (file_exists($_FILES['userfile3']['tmp_name']) || is_uploaded_file($_FILES['userfile3']['tmp_name'])) {
        $uploadfile = $uploaddir . basename($_FILES['userfile3']['name']);
        //echo $uploadfile;

        echo '<pre>';
        if (move_uploaded_file($_FILES['userfile3']['tmp_name'], $uploadfile)) {
            echo "File is valid, and was successfully uploaded.\n";
            $newname = $cname . '_' . $_FILES['userfile3']['name'];
            rename($uploadfile, $uploaddir . $newname);
        } else {
            echo "Sorry! Your third file cannot be uploaded. Try again or contact administrator\n";
            return 0;
        }
    }

//echo 'Here is some more debugging info:';
//print_r($_FILES);

    print "</pre>";
    return 1;
}
?>
