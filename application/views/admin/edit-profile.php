<nav class="breadcrumb sl-breadcrumb">
	<a class="breadcrumb-item" href="<?php echo base_url() ;?>">CDRRMO</a>
	<a class="breadcrumb-item" href="<?php echo base_url() ;?>admin/users">Users</a>
	<span class="breadcrumb-item active">Edit User - <strong><?php echo $user->first_name . ' ' . $user->last_name ;?></strong></span>
</nav>

<div class="sl-pagebody">
	<div id="accordion" class="accordion" role="tablist" aria-multiselectable="true">
		<div class="card">
			<div class="card-header" role="tab" id="headingOne">
				<h6 class="mg-b-0">
					<a data-toggle="collapse" data-parent="#accordion" href="#addUser" aria-expanded="true" aria-controls="addUser"
					 class="tx-gray-800 transition">
						<i class="icon ion-person-add"></i> Update User
					</a>
				</h6>
			</div><!-- card-header -->

			<div id="addUser" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
				<div class="card-block pd-20">
					<div class="form-layout">

						<!-- UPDATE USER FORM -->
						<form id="update_profile_form">
						<input type="hidden" name="user_id" value="<?= $user->id ;?>">
						<div class="row mg-b-25">
							<div class="col-lg-6">
								<div class="form-group">
									<label class="form-control-label">Firstname: <span class="tx-danger">*</span></label>
									<input class="form-control" type="text" name="firstname" value="<?= $user->first_name ;?>">
								</div>
							</div><!-- col-4 -->
							<div class="col-lg-6">
								<div class="form-group">
									<label class="form-control-label">Lastname: <span class="tx-danger">*</span></label>
									<input class="form-control" type="text" name="lastname" value="<?= $user->last_name ;?>">
								</div>
							</div><!-- col-4 -->
                            <?php if ($user->id == 1 && $user->user_type == '1') :?>
                                <div class="col-lg-4">
                                    <div class="form-group mg-b-10-force">
                                        <label class="form-control-label">User Type: <span class="tx-danger">*</span></label>
                                            <select class="form-control select2" name="user_type" data-placeholder="Choose User Type" <?php echo ($user->id == 1 && $user->user_type == '1') ? 'disable readonly' : '' ;?> >
                                                <option label="Choose User Type"></option>
                                                <option value="1" <?= ($user->user_type == '1') ? 'selected' : '' ;?>>Admin</option>
                                                <option value="2" <?= ($user->user_type == '2') ? 'selected' : '' ;?>>Staff</option>
                                            </select>
                                    </div>
                                </div><!-- col-4 -->
                            <?php endif;?>
						</div><!-- row -->

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
