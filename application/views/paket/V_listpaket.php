<div class="main-container">
		<div class="xs-pd-20-10 pd-ltr-20">
        <div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h4 class="text-blue h4">Data Paket</h4>
						</div>
						<div class="pull-right">
							<a href="<?= site_url('C_Paket/add') ?>" class="btn btn-info btn-sm scroll-click"><i class="fa fa-plus"></i></a>
						</div>
					</div>
					<table class="table">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Nama Paket</th>
								<th scope="col">Jenis Kendaraan</th>
                                <th scope="col">Harga</th>
                                <th scope="col" colspan="2">Action</th>
							</tr>
						</thead>
						<tbody>
							
                        <?php $i=1; foreach($datapaket as $paket) { ?>
            <tr>
                <td><?=$i++?></td>
                <td><?=$paket->paket_nama?></td>
                <td><?=$paket->paket_jeniskendaraan?></td>
                <td><?=$paket->paket_harga?></td>
                <td><a href="<?=site_url('C_Paket/edit/'.$paket->paket_id)?>" class="btn btn-warning">Edit</a></td>
                <td><a href="<?=site_url('C_Paket/delete/'.$paket->paket_id)?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a></td>
            </tr><?php } ?>
            <tr>
        </tr>	
						</tbody>
					</table>
					<div class="collapse collapse-box" id="basic-table" >
						<div class="code-box">
							<div class="clearfix">
								<a href="javascript:;" class="btn btn-primary btn-sm code-copy pull-left"  data-clipboard-target="#basic-table-code"><i class="fa fa-clipboard"></i> Copy Code</a>
								<a href="#basic-table" class="btn btn-primary btn-sm pull-right" rel="content-y"  data-toggle="collapse" role="button"><i class="fa fa-eye-slash"></i> Hide Code</a>
							</div>
							<pre><code class="xml copy-pre" id="basic-table-code">
							</code></pre>
						</div>
					</div>
				</div>
		</div>
	</div>
   


        <!-- js -->
	<script src="assets/scripts/core.js"></script>
	<script src="assets/scripts/script.min.js"></script>
	<script src="assets/scripts/process.js"></script>
	<script src="assets/scripts/layout-settings.js"></script>
	<script src="src/plugins/jQuery-Knob-master/jquery.knob.min.js"></script>
	<script src="src/plugins/highcharts-6.0.7/code/highcharts.js"></script>
	<script src="src/plugins/highcharts-6.0.7/code/highcharts-more.js"></script>
	<script src="src/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
	<script src="src/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="assets/scripts/dashboard2.js"></script>
    </body>
</html>
