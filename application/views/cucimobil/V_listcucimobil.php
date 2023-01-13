<div class="main-container">
	<div class="xs-pd-20-10 pd-ltr-20">
		<div class="pd-20 card-box mb-30">
			<div class="clearfix mb-20">
				<div class="pull-left">
					<h4 class="text-blue h4">Data Transaksi</h4>
				</div>
				<div class="pull-right">
					<a href="<?= site_url('C_Cucimobil/add') ?>" class="btn btn-info btn-sm scroll-click"><i class="fa fa-plus"></i></a>
				</div>
				<div class="pull-right">
					<a href="<?= site_url('C_Cucimobil/do_export') ?>" class="btn btn-light btn-sm scroll-click"><i class="fa fa-file"></i> Cetak Transaksi</a>
				</div>

			</div>
			<table class="table">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">ID Transaksi</th>
						<th scope="col">Tanggal</th>
						<th scope="col">Nama Pelanggan</th>
						<th scope="col">Jenis Kendaraan</th>
						<th scope="col">Nomor Plat</th>
						<th scope="col">Jenis Paket</th>
						<th scope="col">Harga</th>
						<th scope="col" colspan="2">Action</th>
					</tr>
				</thead>
				<tbody>

					<?php $i = 1;
					foreach ($cucimobil as $cuci) { ?>
						<tr>
							<td><?= $i++ ?></td>
							<td><?= $cuci->cucimobil_idtransaksi ?></td>
							<td><?= $cuci->cucimobil_tanggal ?></td>
							<td><?= $cuci->cucimobil_nama ?></td>
							<td><?= $cuci->cucimobil_tipe ?></td>
							<td><?= $cuci->cucimobil_plat ?></td>
							<td><?= $cuci->paket_nama ?></td>
							<td>Rp. <?= $cuci->paket_harga++ ?></td>
							<td><a href="<?= site_url('C_Cucimobil/edit/' . $cuci->cucimobil_id) ?>" class="btn btn-warning">Edit</a></td>
							<td><a href="<?= site_url('C_Cucimobil/delete/' . $cuci->cucimobil_id) ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a></td>
						</tr><?php } ?>
					<tr>
						<td colspan="6">Total</td>
						<?php foreach ($total as $total) { ?>
							<td colspan="3" style="text-align: center;">Rp. <?= $total->paket_harga ?></td>
						<?php } ?>
					</tr>


				</tbody>
			</table>
			<div class="collapse collapse-box" id="basic-table">
				<div class="code-box">
					<div class="clearfix">
						<a href="javascript:;" class="btn btn-primary btn-sm code-copy pull-left" data-clipboard-target="#basic-table-code"><i class="fa fa-clipboard"></i> Copy Code</a>
						<a href="#basic-table" class="btn btn-primary btn-sm pull-right" rel="content-y" data-toggle="collapse" role="button"><i class="fa fa-eye-slash"></i> Hide Code</a>
					</div>
					<pre><code class="xml copy-pre" id="basic-table-code">
							</code></pre>
				</div>
			</div>
		</div>
	</div>
</div>