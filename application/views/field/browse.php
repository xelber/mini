<html>
	<head>
		<title>Mini Project</title>
		<link type="text/css" href="<?php echo site_url('/css/style.css') ?>" rel="stylesheet" >
		
	</head>
	<body>
		<div class="container">
			<div class="header">
			<h1>Custom Fields - Browse</h1>
			
			</div>
			<div class="results">
			<table>
				<tr>
					<th>Field</th>
					<th>Status</th>
					<th>Type</th>
					<th>Is Mandatory</th>
					<th>Delete</th>
				</tr>
				<?php foreach ( $fields as $field ) { ?>
				<tr>
					<td><a href="<?php echo site_url('/field/edit/'.$field['field_id']) ?>"><?php echo $field['description'] ?></a></td>
					<td><?php echo $field['status']==1? 'Active' : 'Inactive' ?></td>
					<td><?php echo $field['field_type'] ?></td>
					<td><?php echo $field['mandatory']==1? 'Yes' : 'No' ?></td>
					<td><a class="delete_field" onclick="return false;" href="<?php echo site_url('/field/delete/'.$field['field_id']) ?>">Delete</a></td>
				</tr>
				<?php } ?>
			</table>
			</div>
		</div>
		<div class="footer">
			<a href="<?php echo site_url('/user') ?>">&laquo;Users&raquo;  </a>
			<a href="<?php echo site_url('/field') ?>">&laquo;View Custom Fields&raquo; </a>
			<a href="<?php echo site_url('/field/edit') ?>">&laquo;New Custom Fields&raquo; </a>
		</div>
		<script src="<?php echo site_url('/js/jquery-1.8.1.min.js') ?>"></script>
		<script src="<?php echo site_url('/js/script.js') ?>"></script>
	</body>
</html>