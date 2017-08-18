<h3 align="center">REPORT HASIL PRODUKSI  <br>
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
				 <th>Nama Barang</th>
				 <th>Qty Produksi</th>
				 <th>Satuan Produksi</th>
				 <th>Barang Hasil Produksi</th>
				 <th>Qty Hasil</th>
				 <th>Satuan Hasil</th>
				 <th>Tanggal Produksi</th>
				 <th>Tanggal Expired</th>
				 <th>Status Barang</th>

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
				 <td><?php echo $row->barang_production; ?></td>
				 <td><?php echo $row->qty_res_production; ?></td>
				 <td><?php echo $row->satuan_res_production; ?></td>
				 <td><?php echo $row->tgl_produksi; ?></td>
				 <td><?php echo $row->tgl_expired; ?></td>
				 <td><?php echo $row->status; ?></td>

		 </tr>

		 <?php
		 $no++;
		 }
		 ?>

	 </tbody>
</table>
