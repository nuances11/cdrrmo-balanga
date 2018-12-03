<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

	<div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
		<div class="signin-logo tx-center tx-24 tx-bold tx-inverse">CDRROM</div>
		<div class="tx-center mg-b-30">Admin Login</div>
		<?php // echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

		<?php echo ($this->session->flashdata('login_error')) ? $this->session->flashdata('login_error') : '' ;?>
		<?php echo form_open('admin/user_login', array('id' => 'login_form')) ;?>
			<div class="form-group">
				<input type="email" name="email" class="form-control" placeholder="Email">
			</div><!-- form-group -->
			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="Password">
			</div><!-- form-group -->
			<button type="submit" class="btn btn-info btn-block">Sign In</button>
		<?php echo form_close();?>

	</div><!-- login-wrapper -->
</div><!-- d-flex -->
