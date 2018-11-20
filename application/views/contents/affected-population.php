<nav class="breadcrumb sl-breadcrumb">
	<a class="breadcrumb-item" href="<?php echo base_url() . 'admin';?>">CDRRMO</a>
	<span class="breadcrumb-item active">Affected Population</span>
</nav>

<div class="sl-pagebody">
	<div id="accordion" class="accordion" role="tablist" aria-multiselectable="true">
		<div class="card">
			<div class="card-header" role="tab" id="headingOne">
				<h6 class="mg-b-0">
					<a data-toggle="collapse" data-parent="#accordion" href="#addData" aria-expanded="true" aria-controls="addUser"
					 class="tx-gray-800 transition">
						<i class="icon ion-person-add"></i> Add Data
					</a>
				</h6>
			</div><!-- card-header -->

			<div id="addData" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
				<div class="card-block pd-20">
					<div class="form-layout">

						<!-- ADD AFFECTED POPULATION FORM -->
						<form id="add_affected_population_form">
							<input type="hidden" name="action" value="add">
							<div class="row mg-b-25">
								<div class="col-lg-10">
									<div class="form-group">
										<label class="form-control-label">Barangay: <span class="tx-danger">*</span></label>
										<input class="form-control" type="text" name="barangay">
									</div>
								</div><!-- col-5 -->
								<div class="col-lg-5">
									<div class="form-group mg-b-10-force">
										<label class="form-control-label">No. of Persons Affected: <span class="tx-danger">*</span></label>
										<input class="form-control" type="number" name="persons_affected">
									</div>
								</div><!-- col-5 -->
								<div class="col-lg-5">
									<div class="form-group mg-b-10-force">
										<label class="form-control-label">Families: <span class="tx-danger">*</span></label>
										<input class="form-control" type="number" name="families_affected">
									</div>
								</div><!-- col-5 -->
								<div class="col-lg-3 mg-t-20 mg-lg-t-0">
									<label class="ckbox">
										<input name="high_risk" type="checkbox" value="1"><span>High Risk</span>
									</label>
								</div><!-- col-3 -->
							</div><!-- row -->

							<div class="form-layout-footer">
								<button class="btn btn-info" type="submit">Add Data</button>
								<button class="btn btn-warning" type="reset">Reset</button>
							</div><!-- form-layout-footer -->
						</form>

						<!-- UPDATE BARANGAY FORM -->
						<form id="update_affected_population_form">
						<input type="hidden" name="action" value="update">
						<input type="hidden" name="data_id">
						<div class="row mg-b-25">
							<div class="col-lg-10">
								<div class="form-group">
									<label class="form-control-label">Barangay: <span class="tx-danger">*</span></label>
									<input class="form-control" type="text" name="barangay">
								</div>
							</div><!-- col-5 -->
							<div class="col-lg-5">
								<div class="form-group mg-b-10-force">
									<label class="form-control-label">No. of Persons Affected: <span class="tx-danger">*</span></label>
									<input class="form-control" type="number" name="persons_affected">
								</div>
							</div><!-- col-5 -->
							<div class="col-lg-5">
								<div class="form-group mg-b-10-force">
									<label class="form-control-label">Families: <span class="tx-danger">*</span></label>
									<input class="form-control" type="number" name="families_affected">
								</div>
							</div><!-- col-5 -->
							<div class="col-lg-3 mg-t-20 mg-lg-t-0">
								<label class="ckbox">
									<input name="high_risk" type="checkbox" value="1"><span>High Risk</span>
								</label>
							</div><!-- col-3 -->
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
			<table id="affectedPopulation" class="table display responsive nowrap">
				<thead>
					<tr>
						<th class="wd-15p">Data ID</th>
						<th class="wd-15p">Barangay</th>
						<th class="wd-20p">Persons Affected</th>
						<th class="wd-20p">Families</th>
						<th class="wd-20p">Risk</th>
						<th class="wd-25p"></th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div><!-- table-wrapper -->
	</div><!-- card -->

</div><!-- sl-pagebody -->
