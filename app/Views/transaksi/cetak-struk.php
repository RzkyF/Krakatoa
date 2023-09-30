<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Struk</title>
    <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/css/app.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/css/components.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/css/custom.css">
</head>
<body onload="window.print()">
    <div class="container">
            <div class="text-center">
                <h1>KRAKATOA</h1>
                <div class="text-muted"><h5>Jl Bukit Gading Raya Bl E/8, Dki Jakarta 14241</h5></div>
                <div class="text-muted"><h6>Dki Jakarta</h6></div>
                <div class="text-muted"><p>No Telp. 021-65301713</p></div>
                <hr style="border-bottom:3px dashed;">
                    <div class="row">
                        <div class="col-md-6 text-left">
                            <p>Tanggal : <?= $tanggal; ?></p>
                            <p>Cashier : <?= $kasir; ?></p>
                        </div>
                        <div class="col-md-6 text-right">
                            <h5>No Meja : <?= $no_meja; ?></h5>
                        </div>
                    </div>
                <hr style="border-bottom:3px dashed;">
                <center>
                    <table class="table table-bordered" cellpadding="5">
                        <thead>
                            <th>No</th>
                            <th>Nama Menu</th>
                            <th class="text-center">Jumlah</th>
                            <th>Harga</th>
                        </thead>
                        <tbody>
                    
                        <?php 
                   
                        foreach ($detail as $key => $value) :
                           
                            ?>
                            <tr>
                                <td><?= $key +1; ?></td>
                                <td><?= $value->nama_menu; ?></td>
                                <td class="text-center"><?= $value->qty; ?></td>
                                <td><?= $value->harga; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" >Sub Total</td>
                                <td><?= $total - $kembalian; ?></td>
                                
                            </tr>
                            <tr>
                                <td colspan="3">Total Bayar</td>
                                <td><b><?= $total; ?></b>
                            </td>
                            </tr>
                            <tr>
                                <td colspan="3">Kembalian</td>
                                <td><b><?= $kembalian; ?></b></td>
                            </tr>
                        </tfoot>
                    </table>

                    <h2 class="m-5">Terimakasih Atas Kunjungan Anda :)</h2>
                </center>
                
            </div>
    </div>
</body>
</html>