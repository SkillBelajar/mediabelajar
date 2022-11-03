<?php
error_reporting(0);
$id_k =  rand(000000000, 999999999) . date("d-m-Y");
$fx = md5($id_k);

$link = $_SERVER["SERVER_NAME"];
//echo $link;
$alamat = 'https://' . $link . '/mediabelajar/indexcam.php?id=' . $fx . '';
?>

<script>
//window.location = 'https://'.$link.'/mediabelajar/indexcam.php?id=<?php echo $fx ?>'
</script>

<script>
window.location = '<?php echo $alamat ?>'
</script>