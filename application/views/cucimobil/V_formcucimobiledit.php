<div class="main-container">
		<div class="xs-pd-20-10 pd-ltr-20">
        <div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h4 class="text-blue h4">Data Paket</h4>
						</div>
    <?php
    $cucimobil_id = '';
    $cucimobil_idtransaksi = '';
    $cucimobil_tanggal = '';
    $cucimobil_nama = '';
    $cucimobil_tipe = '';
    $cucimobil_plat = '';
    $paket_id = '';


    if (isset($cuci)) {
        $cucimobil_idtransaksi = $cuci->cucimobil_idtransaksi;
        $cucimobil_tanggal = $cuci->cucimobil_tanggal;
        $cucimobil_nama = $cuci->cucimobil_nama;
        $cucimobil_tipe = $cuci->cucimobil_tipe;
        $cucimobil_plat = $cuci->cucimobil_plat;
        $cucimobil_id = $cuci->cucimobil_id;
        $paket_id = $cuci->paket_id;
    }
    ?>
    <form action="<?= site_url('C_Cucimobil/update') ?>" method="post">
    <table class="table">
            <tr>
                <td> ID Transaksi </td>
                <td>
                    <input type="hidden" value="<?= $cucimobil_id ?>" name="cucimobil_id">
                    <input type="text" class="form-control" name="cucimobil_idtransaksi" value="<?= $cucimobil_idtransaksi ?>" required>
                </td>
            </tr>
            <tr>
                <td> Tanggal </td>
                <td> <input type="date" class="form-control" name="cucimobil_tanggal" value="<?= $cucimobil_tanggal ?>" required></td>
            </tr>
            <tr>
                <td> Nama Pelanggan </td>
                <td> <input type="text" class="form-control" name="cucimobil_nama" value="<?= $cucimobil_nama ?>" required></td>
            </tr>
            <tr>
                <td> Tipe Mobil </td>
                <td> <input type="text" class="form-control" name="cucimobil_tipe" value="<?= $cucimobil_tipe ?>" required></td>
            </tr>
            <tr>
                <td> Nomor Plat </td>
                <td><input type="text" class="form-control" name="cucimobil_plat" value="<?= $cucimobil_plat ?>" required></td>
            </tr>
            <tr>
                <td> Paket </td>
                <td>
                    <select name="paket_id" class="form-control" required>
                        <option value="">Pilih Paket</option>
                        <?php foreach ($paket as $paket) { ?>
                            <option value="<?= $paket->paket_id ?>" <?= ($paket->paket_id == $paket_id) ? 'selected' : '' ?>><?= $paket->paket_nama ?></option>
                        <?php } ?>
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="SAVE" name="submit" class="btn btn-success btn-sm scroll-click">
                    <a href="<?= site_url('C_Cucimobil') ?>"><input type="button" value="CANCEL" class="btn btn-danger btn-sm scroll-click">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>