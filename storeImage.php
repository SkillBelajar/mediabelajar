<?php
error_reporting(0);
$img = $_POST['image'];
$id_k =  rand(000000000, 999999999) . date("d-m-Y");
$fx = md5($id_k);

$link = $_SERVER["SERVER_NAME"];
$alamat = 'https://' . $link . '/mediabelajar/indexcam.php?id=' . $fx . '';
if (empty($img)) {
    echo "<script>alert('Anda Harus Ambil Gambar , Sebagai Absensi ')</script>";
    echo "<script>window.location='" . $alamat . "'</script>";
}
$folderPath = "upload/";

$image_parts = explode(";base64,", $img);
$image_type_aux = explode("image/", $image_parts[0]);
$image_type = $image_type_aux[1];

$image_base64 = base64_decode($image_parts[1]);

$file = rand(000000000, 999999999) . date("d-m-Y");
//$fx = md5($file);
//$fileName = uniqid() . '.png';
$fx = $_GET["id"];


$fileName = $fx . '.png';

$file = $folderPath . $fileName;
file_put_contents($file, $image_base64);

//print_r($fileName);

include "kn.php";
$tgl_jam = date("d-m-Y H:i:s");
mysqli_query($con, "INSERT INTO `foto` (`id_foto`, `file_name`, `nama` , `tgl_jam`) VALUES (NULL, '$fileName', '-' , '$tgl_jam');");

?>

<script>
window.location = 'siswa/public?id=<?php echo $fx ?>';
</script>