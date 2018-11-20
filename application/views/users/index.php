<nav class="breadcrumb sl-breadcrumb">
	<a class="breadcrumb-item" href="index.html">CDRRMO</a>
	<span class="breadcrumb-item active">Users</span>
</nav>

<div class="sl-pagebody">
	<div id="accordion" class="accordion" role="tablist" aria-multiselectable="true">
		<div class="card">
			<div class="card-header" role="tab" id="headingOne">
				<h6 class="mg-b-0">
					<a data-toggle="collapse" data-parent="#accordion" href="#addUser" aria-expanded="true" aria-controls="addUser"
					 class="tx-gray-800 transition">
						<i class="icon ion-person-add"></i> Add New User
					</a>
				</h6>
			</div><!-- card-header -->

			<div id="addUser" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
				<div class="card-block pd-20">
					<div class="form-layout">

						<!-- ADD USER FORM -->
						<form id="add_user_form">
						<input type="hidden" name="action" value="add">
						<div class="row mg-b-25">
							<div class="col-lg-6">
								<div class="form-group">
									<label class="form-control-label">Firstname: <span class="tx-danger">*</span></label>
									<input class="form-control" type="text" name="firstname">
								</div>
							</div><!-- col-4 -->
							<div class="col-lg-6">
								<div class="form-group">
									<label class="form-control-label">Lastname: <span class="tx-danger">*</span></label>
									<input class="form-control" type="text" name="lastname">
								</div>
							</div><!-- col-4 -->
							<div class="col-lg-8">
								<div class="form-group mg-b-10-force">
									<label class="form-control-label">Email Address: <span class="tx-danger">*</span></label>
									<input class="form-control" type="email" name="email">
								</div>
							</div><!-- col-8 -->
							<div class="col-lg-4">
								<div class="form-group mg-b-10-force">
									<label class="form-control-label">User Type: <span class="tx-danger">*</span></label>
									<select class="form-control select2" name="user_type" data-placeholder="Choose User Type">
										<option label="Choose User Type"></option>
										<option value="1">Admin</option>
										<option value="2">Staff</option>
									</select>
								</div>
							</div><!-- col-4 -->
							<div class="col-lg-4">
								<div class="form-group">
									<label class="form-control-label">Password: <span class="tx-danger">*</span></label>
										<input class="form-control pass_input" type="password" name="password">
									<label class="ckbox" style="margin-top: 10px;">
										<input type="checkbox" id="show_pass">
										<span>Show Password</span>
									</label>
								</div>
							</div><!-- col-4 -->
							<div class="col-lg-4">
								<div class="form-group">
									<label class="form-control-label">Confirm Password: <span class="tx-danger">*</span></label>
										<input class="form-control pass_input" type="password" name="cpass">
								</div>
							</div><!-- col-4 -->
							<div class="col-lg-4">
								<div class="form-group">
									<label class="form-control-label">Generate Password (Optional)</label>
									<button class="btn btn-info btn-block" id="generate_pasword">Generate Password</button>
								</div>
							</div><!-- col-4 -->
						</div><!-- row -->

						<div class="form-layout-footer">
							<button class="btn btn-info" type="submit">Add User</button>
							<button class="btn btn-warning" type="reset">Reset</button>
							<button class="btn btn-secondary">Cancel</button>
						</div><!-- form-layout-footer -->
						</form>

						<!-- UPDATE USER FORM -->
						<form id="update_user_form">
						<input type="hidden" name="action" value="update">
						<input type="hidden" name="user_id">
						<div class="row mg-b-25">
							<div class="col-lg-6">
								<div class="form-group">
									<label class="form-control-label">Firstname: <span class="tx-danger">*</span></label>
									<input class="form-control" type="text" name="firstname">
								</div>
							</div><!-- col-4 -->
							<div class="col-lg-6">
								<div class="form-group">
									<label class="form-control-label">Lastname: <span class="tx-danger">*</span></label>
									<input class="form-control" type="text" name="lastname">
								</div>
							</div><!-- col-4 -->
							<div class="col-lg-8">
								<div class="form-group mg-b-10-force">
									<label class="form-control-label">Email Address: <span class="tx-danger">*</span></label>
									<input class="form-control" type="email" name="email" readonly>
								</div>
							</div><!-- col-8 -->
							<div class="col-lg-4">
								<div class="form-group mg-b-10-force">
									<label class="form-control-label">User Type: <span class="tx-danger">*</span></label>
									<select class="form-control select2" name="user_type" data-placeholder="Choose User Type">
										<option label="Choose User Type"></option>
										<option value="1">Admin</option>
										<option value="2">Staff</option>
									</select>
								</div>
							</div><!-- col-4 -->
							<div class="col-lg-4">
								<div class="form-group">
									<label class="form-control-label">Password: <span class="tx-danger">*</span></label>
										<input class="form-control pass_input" type="password" name="password">
									<label class="ckbox" style="margin-top: 10px;">
										<input type="checkbox" id="show_pass">
										<span>Show Password</span>
									</label>
								</div>
							</div><!-- col-4 -->
							<div class="col-lg-4">
								<div class="form-group">
									<label class="form-control-label">Confirm Password: <span class="tx-danger">*</span></label>
										<input class="form-control pass_input" type="password" name="cpass">
								</div>
							</div><!-- col-4 -->
							<div class="col-lg-4">
								<div class="form-group">
									<label class="form-control-label">Generate Password (Optional)</label>
									<button class="btn btn-info btn-block" id="generate_pasword">Generate Password</button>
								</div>
							</div><!-- col-4 -->
						</div><!-- row -->

						<div class="form-layout-footer">
							<button class="btn btn-info" type="submit">Update</button>
							<button class="btn btn-secondary" id="cancel_update">Cancel</button>
						</div><!-- form-layout-footer -->
						</form>

					</div><!-- form-layout -->
				</div>
			</div>
		</div><!-- card -->
	</div><!-- accordion -->

	<div class="card pd-20 pd-sm-40">
		<div class="table-wrapper">
			<table id="users" class="table display responsive nowrap">
				<thead>
					<tr>
						<th class="wd-15p">User Type</th>
						<th class="wd-15p">Name</th>
						<th class="wd-20p">Email</th>
						<th class="wd-15p">Account Created</th>
						<th class="wd-25p"></th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div><!-- table-wrapper -->
	</div><!-- card -->

</div><!-- sl-pagebody -->
