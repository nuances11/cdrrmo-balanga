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
						<form id="add_user_form">
						<div class="row mg-b-25">
							<div class="col-lg-4">
								<div class="form-group">
									<label class="form-control-label">Firstname: <span class="tx-danger">*</span></label>
									<input class="form-control" type="text" name="firstname" placeholder="Enter firstname">
								</div>
							</div><!-- col-4 -->
							<div class="col-lg-4">
								<div class="form-group">
									<label class="form-control-label">Lastname: <span class="tx-danger">*</span></label>
									<input class="form-control" type="text" name="lastname" placeholder="Enter lastname">
								</div>
							</div><!-- col-4 -->
							<div class="col-lg-4">
								<div class="form-group">
									<label class="form-control-label">Email address: <span class="tx-danger">*</span></label>
									<input class="form-control" type="text" name="email" placeholder="Enter email address">
								</div>
							</div><!-- col-4 -->
							<div class="col-lg-8">
								<div class="form-group mg-b-10-force">
									<label class="form-control-label">Mail Address: <span class="tx-danger">*</span></label>
									<input class="form-control" type="text" name="address" placeholder="Enter address">
								</div>
							</div><!-- col-8 -->
							<div class="col-lg-4">
								<div class="form-group mg-b-10-force">
									<label class="form-control-label">User Type: <span class="tx-danger">*</span></label>
									<select class="form-control select2" data-placeholder="Choose country">
										<option label="Choose country"></option>
										<option value="1">Admin</option>
										<option value="2">Staff</option>
									</select>
								</div>
							</div><!-- col-4 -->
							<div class="col-lg-4">
								<div class="form-group">
									<label class="form-control-label">Password: <span class="tx-danger">*</span></label>
									<div class="input-group">
										<button class="btn btn-info" id="show_password"><i class="fa fa-eye"></i> Show</button>
										<input class="form-control pass_input" type="text" name="password">
									</div>
								</div>
							</div><!-- col-4 -->
							<div class="col-lg-4">
								<div class="form-group">
									<label class="form-control-label">Confirm Password: <span class="tx-danger">*</span></label>
									<div class="input-group">
										<button class="btn btn-info" id="show_password"><i class="fa fa-eye"></i> Show</button>
										<input class="form-control pass_input" type="text" name="cpass">
									</div>
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
							<button class="btn btn-info" type="submit">Submit Form</button>
							<button class="btn btn-warning" type="reset">Reset</button>
							<button class="btn btn-secondary">Cancel</button>
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
