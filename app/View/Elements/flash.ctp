<?php 
if(empty($type)) { 
	$type = 'success';
}
?>
	<div class="alert alert-<?php echo $type; ?>" >
    <button data-dismiss="alert" class="close" type="button">×</button>
    <?php echo $message; ?>
</div>