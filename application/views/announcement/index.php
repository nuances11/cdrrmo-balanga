<nav class="breadcrumb sl-breadcrumb">
	<a class="breadcrumb-item" href="index.html">CDRRMO</a>
	<span class="breadcrumb-item active">Announcements</span>
</nav>

<div class="sl-pagebody">

	<div class="card pd-20 pd-sm-40 mg-t-50">
        <h6 class="card-body-title">Add Announcement</h6>
		<form id="add_announcement_form" enctype="multipart/form-data" accept-charset="utf-8">
			<div class="form-layout">
				<div class="row mg-b-25">
					<div class="col-lg-4">
						<div class="form-group">
							<label class="form-control-label">Title: <span class="tx-danger">*</span></label>
							<input class="form-control" type="text" name="title" placeholder="Enter Title">
						</div>
					</div><!-- col-4 -->
					<div class="col-lg-12">
						<div class="form-group mg-b-10-force">
							<label class="form-control-label">Content: <span class="tx-danger">*</span></label>
							<textarea name="content" id="summernote"></textarea>
						</div>
                    </div><!-- col-8 -->
                    <div class="col-lg-4">
						<label class="form-control-label">Post Image: </label> 
						<input type="file" id="post_img" name="post_img" class="form-control">
					</div>
					<div class="col-lg-12">
						<div class="form-group mg-t-20">
							<label class="ckbox">
								<input type="checkbox" value="1" name="show_post">
								<span>Show Post</span>
							</label>
						</div>
					</div><!-- col-4 -->
				</div><!-- row -->

				<div class="form-layout-footer">
					<button class="btn btn-info mg-r-5">Add Post</button>
					<button class="btn btn-secondary">Cancel</button>
				</div><!-- form-layout-footer -->
            </div><!-- form-layout -->
        </form>
	</div><!-- card -->
	

</div><!-- sl-pagebody -->
