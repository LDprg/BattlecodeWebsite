<?php 
	if($error){
?>

<div class="alert alert-danger alert-dismissible fade show">
	<strong>Error!</strong>
	<?php echo $error; ?>
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<?php } elseif($info) {?>

<div class="alert alert-success alert-dismissible fade show">
	<strong>Success!</strong>
	<?php echo $info; ?>
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<?php } ?>

<form action="#" method="POST" enctype="multipart/form-data">
	<input id="upload" name="upload" type="file" class="file" data-browse-on-zone-click="true">
</form>

<hr>

<h2>Uploads</h2>
<div class="table-responsive">
	<table class="table table-striped table-sm">
		<thead>
			<tr>
				<th scope="col">Created</th>
				<th scope="col">Filename</th>
				<th scope="col">Filesize</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				for ($i=0; $i < count($upload); $i++) {
			 ?>
			 	<tr>
					<td><?php echo $upload[$i]['created']; ?></td>
					<td><?php echo $upload[$i]['filename']; ?></td>
					<td><?php
						$file = $db->getUserLogin()['path'] . $upload[$i]['filename'];
						echo file_exists($file) ? humanFileSize(filesize($file)) : "file not existing";  
					?></td>
				</tr>
			 <?php 
			 	}
			  ?>
		</tbody>
	</table>
</div>