<style>
	.ellipsis {
		overflow: hidden;
		white-space: nowrap;
		text-overflow: ellipsis;
	}
</style>
<nav class="breadcrumb sl-breadcrumb">
	<a class="breadcrumb-item" href="index.html">CDRRMO</a>
	<span class="breadcrumb-item active">Dashboard</span>
</nav>

<div class="sl-pagebody">

	<div class="row row-sm">

		<div class="col-xl-4 mg-t-20 mg-xl-t-0">
			<div class="card widget-messages mg-t-20">
				<div class="card-header">
					<span>Messages</span>
					<a href=""><i class="icon ion-more"></i></a>
				</div><!-- card-header -->
				<div class="list-group list-group-flush">
					<a href="" class="list-group-item list-group-item-action media">
						<img src="../img/img10.jpg" alt="">
						<div class="media-body">
							<div class="msg-top">
								<span>Mienard B. Lumaad</span>
								<span>4:09am</span>
							</div>
							<p class="msg-summary">Many desktop publishing packages and web page editors now use...</p>
						</div><!-- media-body -->
					</a><!-- list-group-item -->
					<a href="" class="list-group-item list-group-item-action media">
						<img src="../img/img9.jpg" alt="">
						<div class="media-body">
							<div class="msg-top">
								<span>Isidore Dilao</span>
								<span>Yesterday 3:00am</span>
							</div>
							<p class="msg-summary">On the other hand, we denounce with righteous indignation and dislike...</p>
						</div><!-- media-body -->
					</a><!-- list-group-item -->
					<a href="" class="list-group-item list-group-item-action media">
						<img src="../img/img8.jpg" alt="">
						<div class="media-body">
							<div class="msg-top">
								<span>Kirby Avendula</span>
								<span>Yesterday 3:00am</span>
							</div>
							<p class="msg-summary">It is a long established fact that a reader will be distracted by the readable...</p>
						</div><!-- media-body -->
					</a><!-- list-group-item -->
					<a href="" class="list-group-item list-group-item-action media">
						<img src="../img/img7.jpg" alt="">
						<div class="media-body">
							<div class="msg-top">
								<span>Roven Galeon</span>
								<span>Yesterday 3:00am</span>
							</div>
							<p class="msg-summary">Than the fact that climate change may be causing it to rapidly disappear... </p>
						</div><!-- media-body -->
					</a><!-- list-group-item -->
				</div><!-- list-group -->
				<div class="card-footer">
					<a href="" class="tx-12"><i class="fa fa-angle-down mg-r-3"></i> Load more messages</a>
				</div><!-- card-footer -->
			</div><!-- card -->
		</div><!-- col-3 -->

		<div class="col-xl-8 mg-t-20 mg-xl-t-0">
			<div class="card widget-messages mg-t-20">
				<div class="card-header">
					<span>Announcement</span>
				</div><!-- card-header -->
				<div class="list-group list-group-flush">
				<?php foreach($announcements as $post) :?>
					<a href="<?php echo base_url() . 'admin/announcement/show/' . $post->id; ?>" class="list-group-item list-group-item-action media">
						<img src="<?php echo base_url() . $post->image;?>" alt="<?php echo $post->title;?>">
						<div class="media-body">
							<div class="msg-top">
								<span><?php echo $post->user_id;?></span>
								<span><?php echo $post->created_at;?></span>
							</div>
							<?php //$my_string = substr(strip_tags($post->content), 0, 150)."..."; ?>
							<?php $out = strlen(strip_tags($post->content)) > 150 ? substr(strip_tags($post->content),0,150)."..." : strip_tags($post->content) ;?>
							<p class="msg-summary ellipsis"><?php echo $out;?></p>
						</div><!-- media-body -->
					</a><!-- list-group-item -->
				<?php endforeach;?>
				</div><!-- list-group -->
				<div class="card-footer">
					<a href="<?php echo base_url() . 'admin/announcement/all' ;?>" class="tx-12"><i class="fa fa-angle-down mg-r-3"></i> See more Posts</a>
				</div><!-- card-footer -->
			</div><!-- card -->
		</div><!-- col-3 -->
	</div><!-- row -->

</div><!-- sl-pagebody -->
