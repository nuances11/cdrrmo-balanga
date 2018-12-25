<nav class="breadcrumb sl-breadcrumb">
	<a class="breadcrumb-item" href="<?php echo base_url() ;?>">CDRRMO</a>
	<a class="breadcrumb-item" href="<?php echo base_url() ;?>admin/users">Users</a>
	<span class="breadcrumb-item active">Change Password - <strong><?php echo $user->first_name . ' ' . $user->last_name ;?></strong></span>
</nav>

<div class="sl-pagebody">
	<div id="accordion" class="accordion" role="tablist" aria-multiselectable="true">
		<div class="card">
			<div class="card-header" role="tab" id="headingOne">
				<h6 class="mg-b-0">
					<a data-toggle="collapse" data-parent="#accordion" href="#addUser" aria-expanded="true" aria-controls="addUser"
					 class="tx-gray-800 transition">
						<i class="icon icon ion-locked"></i> Change Password
					</a>
				</h6>
			</div><!-- card-header -->

			<div id="addUser" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
				<div class="card-block pd-20">
					<div class="form-layout">

						<!-- UPDATE PASSWORD FORM -->
						<form id="change_password_form">
						<input type="hidden" name="user_id" value="<?= $user->id ;?>">
						<div class="row mg-b-25">
							<div class="col-lg-6">
								<div class="form-group">
									<label class="form-control-label">Old Password <span class="tx-danger">*</span></label>
									<input class="form-control" type="password" name="old_pass">
								</div>
							</div><!-- col-4 -->
						</div><!-- row -->
                        <div class="row">
                            <div class="col-lg-6">
								<div class="form-group">
									<label class="form-control-label">New Password<span class="tx-danger">*</span></label>
									<input class="form-control" type="password" name="new_pass"> 
								</div>
							</div><!-- col-4 -->
                            <div class="col-lg-6">
								<div class="form-group">
									<label class="form-control-label">Confirm Password<span class="tx-danger">*</span></label>
									<input class="form-control" type="password" name="confirm_pass">
								</div>
							</div><!-- col-4 -->
                        </div>

						<div class="form-layout-footer">
							<button class="btn btn-info" type="submit">Update</button>
						</div><!-- form-layout-footer -->
						</form>

					</div><!-- form-layout -->
				</div>
			</div>
		</div><!-- card -->
	</div><!-- accordion -->

</div><!-- sl-pagebody -->
