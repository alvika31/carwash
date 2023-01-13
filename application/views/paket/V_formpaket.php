<div class="main-container">
		<div class="xs-pd-20-10 pd-ltr-20">
        <div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h4 class="text-blue h4">Data Paket</h4>
						</div>
        <?php
        $paket_id='';
        $paket_nama='';
        $paket_jeniskendaraan='';
        $paket_harga='';

        if(isset($paket)){
            $paket_nama=$paket->paket_nama;
            $paket_jeniskendaraan=$paket->paket_jeniskendaraan;
            $paket_harga=$paket->paket_harga;
        }
        ?>
        <form action="" method="post">
            <table class="table">
                <tr>
                    <td> Nama Paket </td>
                    <td> <input type="text" class="form-control" name="paket_nama" value="<?=$paket_nama?>" required></td>
                </tr>
                <tr>
                    <td> Jenis Kendaraan </td>
                    <td><input type="text" class="form-control" name="paket_jeniskendaraan" value="<?=$paket_jeniskendaraan?>" required></td>
                </tr>
                <tr>
                    <td> Harga </td>
                    <td><input type="text" class="form-control" name="paket_harga" value="<?=$paket_harga?>" required></td>
                </tr>
                <tr>
                    <td><input type="submit" value="SAVE" name="submit" class="btn btn-success btn-sm scroll-click">
                    <a href="<?=site_url('C_Paket')?>"><input type="button" value="CANCEL" class="btn btn-danger btn-sm scroll-click"></td>
                </tr>
            </table>
        </form>
    </body>
</html>