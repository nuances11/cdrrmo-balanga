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
		<h6 class="card-body-title"><?= $message->first_name . ' ' . $message->last_name;?></h6>
		<p class="mg-b-20 mg-sm-b-30"><small>Added : <?= $message->created_at ;?> </small></p>

		<div class="mg-b-20">
            <div class="mg-b-20 mg-t-20">
                <div class="jumbotron">
                    <?= $message->message_contact ;?>
                </div>
            </div>
		</div><!-- row -->
	</div><!-- card -->
</div>
