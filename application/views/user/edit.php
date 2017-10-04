<html>
	<head>
		<title>Mini Project</title>
		<link type="text/css" href="<?php echo site_url('/css/style.css') ?>" rel="stylesheet" >
		<link type="text/css" href="<?php echo site_url('/css/jquery-ui-1.8.23.custom.css') ?>" rel="stylesheet" >
	</head>
	<body>
		<div class="container">
			<div class="header">
			<h1>Users - Edit</h1>
			
			</div>
			<div class="content">
				<div class="form_error">
					<?php $errors = validation_errors(); ?>
					<?php if ( !empty($errors) ) { ?>
						<h3>Please correct the following validation errors</h3>
						<?php echo validation_errors(); ?>
					<?php } ?>
				</div>
				<?php echo form_open(); ?>
				<fieldset>
					<?php foreach ( $fields as $field ) { ?>
						<th></th>
						<p>
							<label><?php echo $field['description'] ?></label>
							<input type="text" name="field[<?php echo $field['field_id'] ?>]"
								   value="<?php echo set_value('field['.$field['field_id'].']',isset($edit[$field['field_id']])? $edit[$field['field_id']] : '') ?>"
								   class="<?php echo $field['field_type'] == 'DATE' ? 'date':'' ?>"
								   >
						</p>
					<?php } ?>
					<p>
						<button type="submit" name="submit">Update</button>
					</p>
				</fieldset>
				<?php echo form_close(); ?>
			</div>
		</div>
		
		<div class="footer">
			<a href="<?php echo site_url('/user') ?>">&laquo;Users&raquo;  </a>
			<a href="<?php echo site_url('/field') ?>">&laquo;View Custom Fields&raquo; </a>
			<a href="<?php echo site_url('/field/edit') ?>">&laquo;New Custom Fields&raquo; </a>
		</div>
		<script src="<?php echo site_url('/js/jquery-1.8.1.min.js') ?>"></script>
		<script src="<?php echo site_url('/js/jquery-ui-1.8.23.custom.min.js') ?>"></script>
		<script src="<?php echo site_url('/js/script.js') ?>"></script>
	</body>
</html>