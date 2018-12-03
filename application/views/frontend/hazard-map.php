<div class="container margin_60_35">
	<div class="row">
		<div class="col-md-8">
			<h3 class="main_title_left">
				<em></em>Flooding Susceptibility of <?php echo count($flood_data);?> Barangays
            </h3>
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="box_style_5">
                        <h3>High Risk <small><span style="color:red;display:block;margin-top:10px;">Red(4-6ft-More)</span></small></h3>
                            <ul>
                                <?php foreach($flood_data as $high):?>    
                                    <?php if($high->risk == 'High') :?>
                                        <li>
                                            <?php echo $high->barangay ;?>
                                        </li>
                                    <?php endif;?>
                                <?php endforeach;?>
                            </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="box_style_5">
                        <h3>Medium Risk <small><span style="color:green;display:block;margin-top:10px;">Red(2-4ft)</span></small></h3>
                            <ul>
                                <?php foreach($flood_data as $high):?>    
                                    <?php if($high->risk == 'Medium') :?>
                                        <li>
                                            <?php echo $high->barangay ;?>
                                        </li>
                                    <?php endif;?>
                                <?php endforeach;?>
                            </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="box_style_5">
                        <h3>Low Risk <small><span style="color:yellow;display:block;margin-top:10px;">Yellow(0-2ft)</span></small></h3>
                            <ul>
                                <?php foreach($flood_data as $high):?>    
                                    <?php if($high->risk == 'Low') :?>
                                        <li>
                                            <?php echo $high->barangay ;?>
                                        </li>
                                    <?php endif;?>
                                <?php endforeach;?>
                            </ul>
                    </div>
                </div>
            </div>

            <hr>
            <h3 class="main_title_left">
				<em></em>Affected Population
            </h3>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <table width="100%" border="1" class="table table-responsive">
                        <thead class="text-center" style="background-color:#002849;color:#ffffff;">
                            <td>Barangays</td>
                            <td>No. of Persons Affected</td>
                            <td>Families</td>
                        </thead>
                        <tbody class="text-center">
                            <?php $total_persons = 0 ;?>
                            <?php $total_families = 0 ;?>
                            <?php if($affected_population) :?>
                                
                                <?php foreach($affected_population as $data): ?>
                                    <?php if($data->high_risk == NULL) :?>
                                        <tr>
                                            <td><?php echo $data->barangay;?></td>
                                            <td><?php echo $data->persons_affected;?></td>
                                            <td><?php echo $data->families;?></td>
                                        </tr>
                                        <?php $total_persons += $data->persons_affected;?>
                                        <?php $total_families += $data->families;?>
                                    <?php endif;?>
                                <?php endforeach;?>
                            <?php else: ?>
                                <tr class="text-center">
                                    <td colspan="3">No data available</td>
                                </tr>
                            <?php endif;?>
                        </tbody>
                        <?php if($affected_population) :?>
                            <tfoot class="text-center" style="background-color:#002849;color:#ffffff;">
                                <tr>
                                    <td>TOTAL</td>
                                    <td><?php echo $total_persons;?></td>
                                    <td><?php echo $total_families;?></td>
                                </tr>
                            </tfoot>
                        <?php endif;?>
                    </table>
                </div>
                <hr>
                <div class="col-md-12 col-sm-12">
                    <p>List of High Risk Barangays on Landslide and Estimated Families / Persons to be affectedList of High Risk Barangays on Landslide and Estimated Families / Persons to be affected</p>
                    <table width="100%" border="1" class="table table-responsive">
                        <thead class="text-center" style="background-color:#002849;color:#ffffff;">
                            <td>Barangays</td>
                            <td>No. of Persons Affected</td>
                            <td>Families</td>
                        </thead>
                        <tbody class="text-center">
                            <?php $total_persons = 0 ;?>
                            <?php $total_families = 0 ;?>
                            <?php if($affected_population) :?>
                                
                                <?php foreach($affected_population as $data): ?>
                                    <?php if($data->high_risk == 1) :?>
                                        <tr>
                                            <td><?php echo $data->barangay;?></td>
                                            <td><?php echo $data->persons_affected;?></td>
                                            <td><?php echo $data->families;?></td>
                                        </tr>
                                        <?php $total_persons += $data->persons_affected;?>
                                        <?php $total_families += $data->families;?>
                                    <?php endif;?>
                                <?php endforeach;?>
                            <?php else: ?>
                                <tr class="text-center">
                                    <td colspan="3">No data available</td>
                                </tr>
                            <?php endif;?>
                        </tbody>
                        <?php if($affected_population) :?>
                            <tfoot class="text-center" style="background-color:#002849;color:#ffffff;">
                                <tr>
                                    <td>TOTAL</td>
                                    <td><?php echo $total_persons;?></td>
                                    <td><?php echo $total_families;?></td>
                                </tr>
                            </tfoot>
                        <?php endif;?>
                    </table>
                </div>
            </div>

			
		</div><!-- End col-md-8-->

		<aside class="col-md-4" id="sidebar">
			<?php $this->load->view('templates/frontend/includes/aside') ;?>
		</aside><!-- End aside -->
	</div>
</div>