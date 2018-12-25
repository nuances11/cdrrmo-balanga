<nav class="breadcrumb sl-breadcrumb">
	<a class="breadcrumb-item" href="index.html">CDRRMO</a>
	<span class="breadcrumb-item active">Send text</span>
</nav>

<div class="sl-pagebody">

	<div class="card pd-20 pd-sm-40 mg-t-50">
        <h6 class="card-body-title">Send Text Messages</h6>
		<form id="send_text_message_form">
			<div class="form-layout">
				<div class="row mg-b-25">
					<div class="col-lg-6">
						<div class="form-group">
							<label class="form-control-label">Phone Number: <span class="tx-danger">*</span></label>
							<input class="form-control" type="text" name="numbers[]" data-role="tagsinput" placeholder="Enter Phone Number">
						</div>
					</div><!-- col-6 -->
					<div class="col-lg-12">
						<div class="form-group mg-b-10-force">
							<label class="form-control-label">Content: <span class="tx-danger">*</span></label>
							<textarea class="form-control" name="content"></textarea>
						</div>
                    </div><!-- col-8 -->
				</div><!-- row -->

				<div class="form-layout-footer">
					<button type="submit" class="btn btn-info mg-r-5">Send Message</button>
				</div><!-- form-layout-footer -->
            </div><!-- form-layout -->
        </form>
	</div><!-- card -->
	

</div><!-- sl-pagebody -->
