

<div class="container margin_60_35">
	<div class="row">

		<div class="col-md-9">
			<h3>Contact us</h3>
			<div>
				<div id="message-contact"></div>
				<?php echo form_open_multipart('imageupload/doupload', 'id="contactform"');?>
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>First name:</label>
								<input type="text" class="form-control styled" id="first_name" name="first_name" placeholder="Jhon">
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Last name:</label>
								<input type="text" class="form-control styled" id="last_name" name="last_name" placeholder="Doe">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Address</label>
								<input type="text" id="address" name="address" class="form-control styled" placeholder="">
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Phone number:</label>
								<input type="text" id="phone_number" name="phone_number" class="form-control styled" placeholder="+639171576335">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Your message:</label>
								<textarea rows="5" id="message_contact" name="message_contact" class="form-control styled" style="height:100px;"
								 placeholder="Type your message..."></textarea>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Upload Image:</label>
								<input name="images[]" class="styled" id="image" type="file" multiple="" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<button type="submit" class="btn_1">Submit</button>
							<!-- <p><input type="submit" value="Submit" class="btn_1" id="submit-contact"></p> -->
						</div>
					</div>
				<?php echo form_close() ?>
			</div>
		</div>
		<!-- End col lg 9 -->
		<aside class="col-md-3">
			<div class="box_style_2">
				<h4>Contacts info</h4>
				<p>
					<br> (047)-237-0687
					<br>
					<a href="#">cdrrmo.cob@gmail.com</a>
				</p>
				
				<hr class="styled">
				
			</div>
		</aside>
		<!--End aside -->
	</div>
	<!-- End row -->
</div>
