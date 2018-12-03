<div class="container margin_60_35">
	<div class="row">
		<div class="col-md-8">
			<h3 class="main_title_left">
				<em></em>LIST OF VEHICLES READY TO USE FOR TRANSPORTATION DURING EVACUATION
            </h3>
            
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <table width="100%" border="1" class="table table-responsive">
                        <thead class="text-center" style="background-color:#002849;color:#ffffff;">
                            <td>Vehicle</td>
                            <td>Driver</td>
                        </thead>
                        <tbody class="text-center">
                            <?php if($vehicle_and_drivers) :?>
                                
                                <?php foreach($vehicle_and_drivers as $data): ?>
                                        <tr>
                                            <td><?php echo $data->vehicle;?></td>
                                            <td><?php echo $data->driver;?></td>
                                        </tr>
                                <?php endforeach;?>
                            <?php else: ?>
                                <tr class="text-center">
                                    <td colspan="2">No data available</td>
                                </tr>
                            <?php endif;?>
                        </tbody>
                    </table>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="box_style_5">
                        <h3>LIST OF EVACUATION CENTERS</h3>
                            <ul>
                                <?php if($evacuation_centers) :?>
                                    <?php foreach($evacuation_centers as $data):?>  
                                        <li>
                                            <?php echo $data->evacuation_center ;?>
                                        </li>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </ul>
                    </div>
                </div>
            </div>

			
		</div><!-- End col-md-8-->

		<aside class="col-md-4" id="sidebar">
			<?php $this->load->view('templates/frontend/includes/aside') ;?>
		</aside><!-- End aside -->
	</div>
</div>