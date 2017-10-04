<html>
	<head>
		<title>Mini Project</title>
		<link type="text/css" href="<?php echo site_url('/css/style.css') ?>" rel="stylesheet" >
	</head>
	<body>
		<div class="container">
			<div class="header">
			<h1>Custom Fields - <?php echo empty($edit['field_id'])? 'Create New': ' Edit'?></h1>
			
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
					<p>
						<label>Field Name</label> <input type="text" name="description" value="<?php echo set_value('description',$edit['description']) ?>">
					</p>
					<p>
						<label>Active? </label> 
						<input type="radio" class="option" name="status" value="1" <?php echo set_value('status',$edit['status']) == 1? 'checked':'' ?>> Yes
						<input type="radio" class="option" name="status" value="0" <?php echo set_value('status',$edit['status']) == 0? 'checked':'' ?>> No
					</p>
					<p>
						<label>Field Type</label>
						<?php
						echo form_dropdown('field_type',array(
										'STRING'=> 'String',
										'NUMERIC' => 'Numeric',
										'DATE' => 'Date'
										),
								set_value('field_type',$edit['field_type'])
								)
						?>
					</p>
					<p>
						<label>Mandatory? </label> 
						<input type="radio" class="option" name="mandatory" value="1" <?php echo set_value('mandatory',$edit['mandatory']) == 1? 'checked':'' ?>> Yes
						<input type="radio" class="option" name="mandatory" value="0" <?php echo set_value('mandatory',$edit['mandatory']) == 0? 'checked':'' ?>> No
					</p>
					<p>
						<?php if ( empty($edit['field_id']) ) { ?>
						<button type="submit" name="submit">Create</button>
						<input type="hidden" name="field_id" value="">
						<?php } else { ?>
						<input type="hidden" name="field_id" value="<?php echo $edit['field_id']?>">
						<button type="submit" name="submit">Update</button>
						<?php } ?>
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
	</body>
</html>