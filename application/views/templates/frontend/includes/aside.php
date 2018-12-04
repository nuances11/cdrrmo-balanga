<div class="widget">
	<h4>Recent post</h4>
	<ul class="recent_post">
		<?php foreach($announcements as $post) : ?>
		<li>
			<i class="icon-calendar-empty"></i>
			<?= date("jS F, Y", strtotime($post->created_at));  ;?>
			<div>
				<a href="<?php echo base_url() . 'post/show/' . $post->id ;?>">
					<?= $post->title ;?></a>
			</div>
		</li>
		<?php endforeach;?>
		<!-- <li>
                <i class="icon-calendar-empty"></i> 16th July, 2020
                <div><a href="#">It is a long established fact that a reader will be distracted </a>
                </div>
            </li>
            <li>
                <i class="icon-calendar-empty"></i> 16th July, 2020
                <div><a href="#">It is a long established fact that a reader will be distracted </a>
                </div>
            </li> -->
	</ul>
</div><!-- End widget -->
<hr>
<div class="widget">
	<div class="fb-page" data-href="https://www.facebook.com/Cdrrmo-Balanga-1438659259772513/" data-tabs="timeline"
	 data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
		<blockquote cite="https://www.facebook.com/Cdrrmo-Balanga-1438659259772513/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Cdrrmo-Balanga-1438659259772513/">Cdrrmo
				Balanga</a></blockquote>
	</div>
</div>
