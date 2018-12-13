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
					<?php foreach($messages as $message):?>
						<a href="<?php echo base_url() . 'admin/message/show/' . $message->id; ?>" class="list-group-item list-group-item-action media">
							<div class="media-body">
								<div class="msg-top">
									<span><?= $message->first_name . ' ' . $message->last_name ;?></span>
									<span><?php echo $message->created_at;?></span>
								</div>
								<?php $mess = strlen(strip_tags($message->message_contact)) > 150 ? substr(strip_tags($message->message_contact),0,150)."..." : strip_tags($message->message_contact) ;?>
								<p class="msg-summary"><?php echo $mess ;?></p>
							</div><!-- media-body -->
						</a><!-- list-group-item -->
					<?php endforeach;?>
				</div><!-- list-group -->
				<div class="card-footer">
					<a href="<?php echo base_url() . 'admin/messages' ;?>" class="tx-12"><i class="fa fa-angle-down mg-r-3"></i> Load more messages</a>
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
