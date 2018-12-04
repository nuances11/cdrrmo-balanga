<div class="container margin_60_35">
	<div class="row">
		<div class="col-md-8">
			<div class="bloglist singlepost">
				<p><img alt="<?= $post->title ;?>" class="img-responsive" src="<?php echo base_url() . $post->image;?>"></p>
				<h2><?= $post->title ;?></h2>
				<div class="postmeta">
					<ul>
						<li><a href="#"><i class="icon_clock_alt"></i> <?= date("jS F, Y", strtotime($post->created_at));  ;?></a></li>
						<li><a href="#"><i class="icon_pencil-edit"></i> <?= ucfirst($post->first_name) . ' ' . ucfirst($post->last_name);?></a></li>
					</ul>
				</div>
				<!-- /post meta -->
				<div class="post-content">
					<div class="dropcaps">
						<p><?= $post->content ;?></p>
					</div>
				</div>
				<!-- /post -->
			</div>
			<!-- /single-post -->
		</div>
		<!-- /col -->

		<aside class="col-md-4" id="sidebar">
			<?php $this->load->view('templates/frontend/includes/aside') ;?>
		</aside><!-- End aside -->
		<!-- /aside -->
	</div>
	<!-- /row -->
</div>
<!-- /container -->
