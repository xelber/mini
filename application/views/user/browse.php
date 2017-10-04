<html>
	<head>
		<title>Mini Project</title>
		<link type="text/css" href="<?php echo site_url('/css/style.css') ?>" rel="stylesheet" >
		<!-- script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script -->
	</head>
	<body>
		<div class="container">
			<div class="header">
			<h1>Users - Browse</h1>
			
			</div>
			<div class="results">
			<table>
				<tr>
					<th>ID</th>
					<?php foreach ( $fields as $field ) { ?>
						<th><?php echo $field['description'] ?></th>
					<?php } ?>
				</tr>
				<?php
				$current_user = array();
				$first = current($users);
				$current_user_id = $first['user_id'];
				foreach ( $users as $user )
				{
					if ( $user['user_id'] == $current_user_id )// Continue to collect suser data untill id changed
					{
						$current_user[$user['field_id']] = $user['value'];
					}
					else
					{
						?>
						<tr>
							<td><a href="<?php echo site_url('/user/edit/'.$current_user_id) ?>">#<?php echo $current_user_id ?></a></td>
							<?php foreach ( $fields as $field ) { ?>
								<td><?php echo isset($current_user[$field['field_id']])? $current_user[$field['field_id']]:'' ?></td>
							<?php } ?>
						</tr>
						<?php
						$current_user = array();
						$current_user_id = $user['user_id'];
						$current_user[$user['field_id']] = $user['value'];
					}
				}
				?>
				<td><a href="<?php echo site_url('/user/edit/'.$current_user_id) ?>">#<?php echo $current_user_id ?></a></td>
				<?php foreach ( $fields as $field ) { ?>
					<td><?php echo isset($current_user[$field['field_id']])? $current_user[$field['field_id']]:'' ?></td>
				<?php } ?>
			</table>
			</div>
		</div>
		<div class="footer">
			<a href="<?php echo site_url('/user') ?>">&laquo;Users&raquo;  </a>
			<a href="<?php echo site_url('/field') ?>">&laquo;View Custom Fields&raquo; </a>
			<a href="<?php echo site_url('/field/edit') ?>">&laquo;New Custom Fields&raquo; </a>
		</div>
	</body>
</html>