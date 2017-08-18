<!-- begin row -->
			<div class="row">
                <!-- begin col-6 -->
			    <!-- <div class="col-md-12">

                    <div class="panel panel-inverse" data-sortable-id="form-plugins-1">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">FORM USER MANAGEMENT </h4>
                        </div>
                        <div class="panel-body panel-form">
                            <form class="form-horizontal form-bordered">


								<div class="form-group">
									<label class="control-label col-md-4">Default Date Ranges</label>

									<div class="col-md-8">
											<div class="input-group" >
												 2

										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-4">XX XX XX</label>

									<div class="col-md-8">
											<div class="input-group" >
												<select class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-white">
	                                            <option value="" selected>Select a Country</option>
	                                            <option value="AF">Afghanistan</option>
	                                            <option value="AL">Albania</option>
	                                            <option value="DZ">Algeria</option>
	                                            <option value="AS">American Samoa</option>
	                                            <option value="AD">Andorra</option>
	                                            <option value="AO">Angola</option>
	                                            <option value="AI">Anguilla</option>
	                                            <option value="AQ">Antarctica</option>
	                                            <option value="AG">Antigua and Barbuda</option>
	                                        </select>
										</div>
									</div>
								</div>


								<div class="form-group">
									<label class="control-label col-md-4">Default Date Ranges</label>

									<div class="col-md-12">
											<div class="input-group" >

												<select class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-white">
	                                            <option value="" selected>Select a Country</option>
	                                            <option value="AF">Afghanistan</option>
	                                            <option value="AL">Albania</option>
	                                            <option value="DZ">Algeria</option>
	                                            <option value="AS">American Samoa</option>
	                                            <option value="AD">Andorra</option>
	                                            <option value="AO">Angola</option>
	                                            <option value="AI">Anguilla</option>
	                                            <option value="AQ">Antarctica</option>
	                                            <option value="AG">Antigua and Barbuda</option>
	                                        </select>
										</div>
									</div>
								</div>



								<div class="form-group">
									<label class="control-label col-md-4">Advance Date Ranges</label>
									<div class="col-md-8">
                                        <div id="advance-daterange" class="btn btn-white">
                                            <span></span>
                                            <i class="fa fa-angle-down fa-fw"></i>
                                        </div>
									</div>
								</div>
							</form>
                        </div>
                    </div>

                </div>-->
								<!-- begin col-6 -->
 			    <div class="col-md-12">
 			        <!-- begin panel -->
                     <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
                         <div class="panel-heading">
                             <div class="panel-heading-btn">
                                 <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                 <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                 <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                 <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                             </div>
                             <h4 class="panel-title">REQUEST GOODS MANAGEMENT FORM</h4>
                         </div>

                         <div class="panel-body">
                             <form class="form-horizontal" action="<?php echo base_url('req_goods/save'); ?>" method="POST">
															 <input type="hidden" name="id" value="<?php echo $parseform->id; ?>">
															 <input type="hidden" name="user_insert" value="<?php echo $this->session->userdata('username'); ?>">
															 <input type="hidden" name="date_insert" value="<?php echo date('Y-m-d H:i:s'); ?>">
															 <div class="form-group">
																  <label class="col-md-3 control-label">No Po
																	</label>
															 		<div class="col-md-9">
																		<?php
																		if($this->uri->segment(3) == '' || $this->uri->segment(3) == NULL ){
																			/*$loc = $nopo;*/
																			$loc = "PO".$po_no_val;
																		}else{
																			$loc = $parseform->no_po;
																		}
																		?>
															 				<input type="text" name="no_po" readonly="readonly" value="<?php echo $loc; ?>" class="form-control" />
															 		</div>
															 </div>

															 <div class="form-group">
															 		<label class="col-md-3 control-label">Nama Supplier</label>
															 		<div class="col-md-9">
																		<select name="id_supplier"  readonly="readonly" class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-white">
																						<option value = "">--Pilih--</option>
																						<?php foreach ($opt_supplier as $row){

																								if($row->id == $parseform->id_supplier){
																									echo '<option value='.$row->id.' selected=selected> '.$row->nama_supplier.' </option>';
																								}else{
																									echo '<option value='.$row->id.'> '.$row->nama_supplier.' </option>';
																								}

																						}
																						?>
																	  </select>
															 		</div>
															 </div>

															 <div class="form-group">
																 <label class="col-md-3 control-label">Nama Barang</label>
																 <div class="col-md-9">
																	 <select name="id_barang"  readonly="readonly" class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-white">
																					 <option value = "">--Pilih--</option>
																					 <?php foreach ($opt_goods as $row){

																							 if($row->id == $parseform->id_barang){
																								 echo '<option value='.$row->id.' selected=selected> '.$row->nama_barang.' </option>';
																							 }else{
																								 echo '<option value='.$row->id.'> '.$row->nama_barang.' </option>';
																							 }

																					 }
																					 ?>
																	 </select>
																 </div>
															</div>
															<div class="form-group">
																 <label class="col-md-3 control-label">Qty
																 </label>
																 <div class="col-md-9">
																		<input type="text" name="qty" value="<?php echo $parseform->qty; ?>" class="form-control" />
																 </div>
															</div>
															<div class="form-group">
																 <label class="col-md-3 control-label">Satuan
																 </label>
																 <div class="col-md-9">
																		<input type="text" name="satuan" value="<?php echo $parseform->satuan; ?>" class="form-control" />
																 </div>
															</div>
															<div class="form-group">
																 <label class="col-md-3 control-label">Harga
																 </label>
																 <div class="col-md-9">
																		<input type="text" name="harga" value="<?php echo $parseform->harga; ?>" class="form-control" />
																 </div>
															</div>
															<div class="form-group">
																 <label class="col-md-3 control-label">Status Paid
																 </label>
																 <div class="col-md-9">
																	 <select name="status_paid" class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-white">
																					<option value = "">--Pilih--</option>
																					<option value = "paid" <?php if($parseform->status_paid == 'paid'){ echo "selected=selected"; } ?> >Paid</option>
																					<option value = "unpaid" <?php if($parseform->status_paid == 'unpaid'){ echo "selected=selected"; } ?> >UnPaid</option>
																	</select>
																 </div>
															</div>


															 <div  align="center">
															 		<button type="submit" name="save" class="btn btn-large btn-primary" > <i class="fa fa-archive"></i> Save </button>
																	<a class="btn btn-danger" href="<?php echo base_url('req_goods'); ?>"> <i class="fa fa-reply-all"></i> Back </a>
															 </div>
																 <!-- <div class="form-group">
                                     <label class="col-md-3 control-label">Default Input</label>
                                     <div class="col-md-9">
                                         <input type="text" class="form-control" placeholder="Default input" />
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <label class="col-md-3 control-label">Disabled Input</label>
                                     <div class="col-md-9">
                                         <input type="text" class="form-control" placeholder="Disabled input" disabled />
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <label class="col-md-3 control-label">Select</label>
                                     <div class="col-md-9">
                                         <select class="form-control">
                                             <option>1</option>
                                             <option>2</option>
                                             <option>3</option>
                                             <option>4</option>
                                             <option>5</option>
                                         </select>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <label class="col-md-3 control-label">Select (multiple)</label>
                                     <div class="col-md-9">
                                         <select multiple class="form-control">
                                             <option>1</option>
                                             <option>2</option>
                                             <option>3</option>
                                             <option>4</option>
                                             <option>5</option>
                                         </select>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <label class="col-md-3 control-label">Textarea</label>
                                     <div class="col-md-9">
                                         <textarea class="form-control" placeholder="Textarea" rows="5"></textarea>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <label class="col-md-3 control-label">Checkbox</label>
                                     <div class="col-md-9">
                                         <div class="checkbox">
                                             <label>
                                                 <input type="checkbox" value="" />
                                                 Checkbox Label 1
                                             </label>
                                         </div>
                                         <div class="checkbox">
                                             <label>
                                                 <input type="checkbox" value="" />
                                                 Checkbox Label 2
                                             </label>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <label class="col-md-3 control-label">Inline Checkbox</label>
                                     <div class="col-md-9">
                                         <label class="checkbox-inline">
                                             <input type="checkbox" value="" />
                                             Checkbox Label 1
                                         </label>
                                         <label class="checkbox-inline">
                                             <input type="checkbox" value="" />
                                             Checkbox Label 2
                                         </label>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <label class="col-md-3 control-label">Radio Button</label>
                                     <div class="col-md-9">
                                         <div class="radio">
                                             <label>
                                                 <input type="radio" name="optionsRadios" value="option1" checked />
                                                 Radio option 1
                                             </label>
                                         </div>
                                         <div class="radio">
                                             <label>
                                                 <input type="radio" name="optionsRadios" value="option2" />
                                                 Radio option 2
                                             </label>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <label class="col-md-3 control-label">Inline Radio Button</label>
                                     <div class="col-md-9">
                                         <label class="radio-inline">
                                             <input type="radio" name="optionsRadios" value="option1" checked />
                                             Radio option 1
                                         </label>
                                         <label class="radio-inline">
                                             <input type="radio" name="optionsRadios" value="option2" />
                                             Radio option 2
                                         </label>
                                     </div>
                                 </div>
                                 <div class="form-group has-success has-feedback">
                                     <label class="col-md-3 control-label">Input with Success</label>
                                     <div class="col-md-9">
                                         <input type="text" class="form-control" />
                                         <span class="fa fa-check form-control-feedback"></span>
                                     </div>
                                 </div>
                                 <div class="form-group has-warning has-feedback">
                                     <label class="col-md-3 control-label">Input with Warning</label>
                                     <div class="col-md-9">
                                         <input type="text" class="form-control" />
                                         <span class="fa fa-warning form-control-feedback"></span>
                                     </div>
                                 </div>
                                 <div class="form-group has-error has-feedback">
                                     <label class="col-md-3 control-label">Input with Error</label>
                                     <div class="col-md-9">
                                         <input type="text" class="form-control" />
                                         <span class="fa fa-times form-control-feedback"></span>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <label class="col-md-3 control-label">Submit</label>
                                     <div class="col-md-9">
                                         <button type="submit" class="btn btn-sm btn-success">Submit Button</button>
                                     </div>
                                 </div><div class="form-group">
                                     <label class="col-md-3 control-label">Default Input</label>
                                     <div class="col-md-9">
                                         <input type="text" class="form-control" placeholder="Default input" />
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <label class="col-md-3 control-label">Disabled Input</label>
                                     <div class="col-md-9">
                                         <input type="text" class="form-control" placeholder="Disabled input" disabled />
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <label class="col-md-3 control-label">Select</label>
                                     <div class="col-md-9">
                                         <select class="form-control">
                                             <option>1</option>
                                             <option>2</option>
                                             <option>3</option>
                                             <option>4</option>
                                             <option>5</option>
                                         </select>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <label class="col-md-3 control-label">Select (multiple)</label>
                                     <div class="col-md-9">
                                         <select multiple class="form-control">
                                             <option>1</option>
                                             <option>2</option>
                                             <option>3</option>
                                             <option>4</option>
                                             <option>5</option>
                                         </select>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <label class="col-md-3 control-label">Textarea</label>
                                     <div class="col-md-9">
                                         <textarea class="form-control" placeholder="Textarea" rows="5"></textarea>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <label class="col-md-3 control-label">Checkbox</label>
                                     <div class="col-md-9">
                                         <div class="checkbox">
                                             <label>
                                                 <input type="checkbox" value="" />
                                                 Checkbox Label 1
                                             </label>
                                         </div>
                                         <div class="checkbox">
                                             <label>
                                                 <input type="checkbox" value="" />
                                                 Checkbox Label 2
                                             </label>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <label class="col-md-3 control-label">Inline Checkbox</label>
                                     <div class="col-md-9">
                                         <label class="checkbox-inline">
                                             <input type="checkbox" value="" />
                                             Checkbox Label 1
                                         </label>
                                         <label class="checkbox-inline">
                                             <input type="checkbox" value="" />
                                             Checkbox Label 2
                                         </label>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <label class="col-md-3 control-label">Radio Button</label>
                                     <div class="col-md-9">
                                         <div class="radio">
                                             <label>
                                                 <input type="radio" name="optionsRadios" value="option1" checked />
                                                 Radio option 1
                                             </label>
                                         </div>
                                         <div class="radio">
                                             <label>
                                                 <input type="radio" name="optionsRadios" value="option2" />
                                                 Radio option 2
                                             </label>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <label class="col-md-3 control-label">Inline Radio Button</label>
                                     <div class="col-md-9">
                                         <label class="radio-inline">
                                             <input type="radio" name="optionsRadios" value="option1" checked />
                                             Radio option 1
                                         </label>
                                         <label class="radio-inline">
                                             <input type="radio" name="optionsRadios" value="option2" />
                                             Radio option 2
                                         </label>
                                     </div>
                                 </div>
                                 <div class="form-group has-success has-feedback">
                                     <label class="col-md-3 control-label">Input with Success</label>
                                     <div class="col-md-9">
                                         <input type="text" class="form-control" />
                                         <span class="fa fa-check form-control-feedback"></span>
                                     </div>
                                 </div>
                                 <div class="form-group has-warning has-feedback">
                                     <label class="col-md-3 control-label">Input with Warning</label>
                                     <div class="col-md-9">
                                         <input type="text" class="form-control" />
                                         <span class="fa fa-warning form-control-feedback"></span>
                                     </div>
                                 </div>
                                 <div class="form-group has-error has-feedback">
                                     <label class="col-md-3 control-label">Input with Error</label>
                                     <div class="col-md-9">
                                         <input type="text" class="form-control" />
                                         <span class="fa fa-times form-control-feedback"></span>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <label class="col-md-3 control-label">Submit</label>
                                     <div class="col-md-9">
                                         <button type="submit" class="btn btn-sm btn-success">Submit Button</button>
                                     </div>
                                 </div>-->
                             </form>
                         </div>
                     </div>
                     <!-- end panel -->
                 </div>
                 <!-- end col-6 -->
            </div>
            <!-- end row -->

						<script>
						$(document).ready(function(e){
							var base_url = "<?php echo base_url();?>";
							alert(base_url);
							var input = $("#no_po").val();

								$.get(base_url+'rec_goods/get_content_form', function(data){
											input.typeahead({
													source: data,
													minLength: 1,
											});
								}, 'json');

								input.change(function(){
									var current = input.typeahead("getActive");
									$('#id_barang').val(current.id_barang);
								});
						});
						</script>
