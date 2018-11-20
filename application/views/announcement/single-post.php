<nav class="breadcrumb sl-breadcrumb">
	<a class="breadcrumb-item" href="<?php echo base_url() . 'admin';?>">CDRRMO</a>
	<a class="breadcrumb-item" href="<?php echo base_url() . 'admin/announcement';?>">Announcements</a>
	<span class="breadcrumb-item active">
        <?= $post->title ;?>
    </span>
</nav>

<div class="sl-pagebody">
	<div class="card pd-20 pd-sm-40">
        <div class="mg-b-20">
            <a href="<?php echo base_url() . 'admin/announcement/all';?>"><i class="icon ion-arrow-left-a"></i> Back to List</a>
        </div>
		<h6 class="card-body-title"><?= $post->title ;?></h6>
		<p class="mg-b-20 mg-sm-b-30"><small>Added : <?= $post->created_at ;?> by : <?= $post->user_id ;?></small></p>

		<div class="mg-b-20">
            <div class="text-center">
                <img src="<?php echo base_url() . $post->image;?>" alt="<?= $post->title ;?>" class="img-fluid mx-auto d-block">
            </div>
            <div class="mg-b-20 mg-t-40">
                <?= $post->content ;?>
            </div>
		</div><!-- row -->
	</div><!-- card -->
</div>
