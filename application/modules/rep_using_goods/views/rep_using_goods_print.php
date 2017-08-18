<h3 align="center">REPORT PENGGUNAAN BAHAN BAKU  <br>
	PERIODE PRODUKSI <?php echo tanggalan($start); ?> TO <?php echo tanggalan($end); ?></h3>
<br>
<hr>
<br>
<br>
<br>
&nbsp;
<br>
<br>
<table id="data-table" class="table table-striped table-bordered">
	 <thead>
			 <tr>
					 <th>No</th>
					 <th>Kode Produksi</th>
					 <th>Barang</th>
					 <th>Qty</th>
					 <th>Satuan</th>
					 <th>Tanggal Produksi</th>

			 </tr>
	 </thead>
	 <tbody>
		 <?php
		 $no = 1;
		 foreach ($listing as $row) {
		 ?>

			 <tr>
				 <td><?php echo $no; ?></td>
				 <td><?php echo $row->kode_produksi; ?></td>
				 <td><?php echo $row->nama_barang; ?></td>
				 <td><?php echo $row->qty; ?></td>
				 <td><?php echo $row->satuan; ?></td>
				 <td><?php echo $row->tgl_produksi; ?></td>
 
		 </tr>

		 <?php
		 $no++;
		 }
		 ?>

	 </tbody>
</table>
