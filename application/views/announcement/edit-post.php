<nav class="breadcrumb sl-breadcrumb">
	<a class="breadcrumb-item" href="<?php echo base_url() . 'admin';?>">CDRRMO</a>
	<a class="breadcrumb-item" href="<?php echo base_url() . 'admin/announcement';?>">Announcements</a>
	<a class="breadcrumb-item" href="<?php echo base_url() . 'admin/announcement/post/' . $post->id ;?>"><?= $post->title ?></a>
	<span class="breadcrumb-item active">
        Edit
    </span>
</nav>

<div class="sl-pagebody">

	<div class="card pd-20 pd-sm-40 mg-t-50">
        <div class="mg-b-20">
            <a href="<?php echo base_url() . 'admin/announcement/all';?>"><i class="icon ion-arrow-left-a"></i> Back to List</a>
        </div>
        <h6 class="card-body-title">Edit Announcement</h6>
        <form id="edit_announcement_form" enctype="multipart/form-data" accept-charset="utf-8">
        <input type="hidden" name="action" value="update">
        <input type="hidden" name="id" value="<?= $post->id ;?>">
			<div class="form-layout">
				<div class="row mg-b-25">
					<div class="col-lg-4">
						<div class="form-group">
							<label class="form-control-label">Title: <span class="tx-danger">*</span></label>
							<input class="form-control" type="text" name="title" placeholder="Enter Title" value="<?= $post->title ?>">
						</div>
					</div><!-- col-4 -->
					<div class="col-lg-12">
						<div class="form-group mg-b-10-force">
							<label class="form-control-label">Content: <span class="tx-danger">*</span></label>
							<textarea name="content" id="summernote"><?= $post->content ?></textarea>
						</div>
                    </div><!-- col-8 -->
                    <div class="col-lg-4">
                    <?php if(!empty($post->image)) :?>
                        <img src="<?php echo base_url() . $post->image ;?>" alt="<?= $post->title ?>" width="300">
                        <input type="hidden" name="old_img" value="<?= $post->image ;?>">
                    <?php endif;?>
						<label class="form-control-label">Post Image: </label> 
						<input type="file" id="post_img" name="post_img" class="form-control">
					</div>
					<div class="col-lg-12">
						<div class="form-group mg-t-20">
							<label class="ckbox">
								<input type="checkbox" value="1" <?php echo ($post->show_post == '1') ? 'checked=""' : '' ;?> name="show_post">
								<span>Show Post</span>
							</label>
						</div>
					</div><!-- col-4 -->
				</div><!-- row -->

				<div class="form-layout-footer">
					<button class="btn btn-info mg-r-5">Update Post</button>
				</div><!-- form-layout-footer -->
            </div><!-- form-layout -->
        </form>
	</div><!-- card -->
	

</div><!-- sl-pagebody -->
