<nav class="breadcrumb sl-breadcrumb">
	<a class="breadcrumb-item" href="<?php echo base_url() . 'admin';?>">CDRRMO</a>
	<span class="breadcrumb-item active">
		Message content
	</span>
</nav>

<div class="sl-pagebody">
	<div class="card pd-20 pd-sm-40">
		<div class="mg-b-20">
			<a href="<?php echo base_url() . 'admin/messages';?>"><i class="icon ion-arrow-left-a"></i> Back to List</a>
		</div>
		<h6 class="card-body-title">
			<?= $message->first_name . ' ' . $message->last_name;?>
		</h6>
		<p class="mg-b-20 mg-sm-b-30"><small>Added :
				<?= $message->created_at ;?> </small></p>

		<div class="mg-b-20">
			<div class="mg-b-20 mg-t-20">
				<div class="jumbotron">
					<p>
						<?= $message->message_contact ;?>
					</p>
					<?php if(!empty(unserialize($message->images))) :?>
						<?php 
							$images = unserialize($message->images); 
							$i = 1;
						?>
						<div id="myCarousel" class="carousel slide">

							<!-- Indicators -->
							<ul class="carousel-indicators">
								<?php foreach($images as $key => $value):?>
									<li class="item<?= $i ;?> <?php echo ($i == 1) ? 'active' : '' ;?>"></li>
									<?php $i++  ;?>
								<?php endforeach;?>
							</ul>

							<!-- The slideshow -->
							<div class="carousel-inner">
								<?php foreach($images as $key => $value):?>
									<div class="carousel-item <?php echo ($key == 0) ? 'active' : '' ;?>">
										<img src="<?php echo base_url() . 'uploads/contact_messages/' . $value['file_name'] ;?>" style="width:100%;">
									</div>
								<?php endforeach;?>
							</div>

							<!-- Left and right controls -->
							<a class="carousel-control-prev" href="#myCarousel">
								<span class="carousel-control-prev-icon"></span>
							</a>
							<a class="carousel-control-next" href="#myCarousel">
								<span class="carousel-control-next-icon"></span>
							</a>
						</div>
					<?php endif;?>
				</div>
			</div>
		</div><!-- row -->
	</div><!-- card -->
</div>
