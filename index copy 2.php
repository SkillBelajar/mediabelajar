<?php
error_reporting(0);
$id_k =  rand(000000000, 999999999) . date("d-m-Y");
$fx = md5($id_k);

?>

<script>
window.location = 'indexcam.php?id=<?php echo $fx ?>'
</script>