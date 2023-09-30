<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi</title>
    <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/css/app.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/css/components.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/css/custom.css">
</head>
<body onload="window.print()">
<h4>Laporan Transaksi dari Tanggal <?= $awal; ?> s/d <?= $akhir; ?></h4>
<table style="width:100%;" class="table table-bordered">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Kasir</th>
                            <th>Tanggal</th>
                            <th>No Meja</th>
                            <th>Nama Pelanggan</th>
                            <th>Total Bayar</th>
                            <th>Kembalian</th>
                            <th>Pemasukan</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          
                          $sub_total = 0;
                      
                          foreach ($laporan as $key =>$value ) :
                          $total_bayar = $value->total_bayar;
                          $kembalian = $value->kembalian;
                          $sub_total += $total_bayar - $kembalian;
                          $sub = $sub_total;
                          ?>
                            <tr>
                              <td><?= $key + 1 ?></td>
                              <td><?= $value->username; ?></td>
                              <td><?= $value->tanggal; ?></td>
                              <td>No.<?= $value->no_meja ?></td>
                              <td><?= $value->nama_pelanggan ?></td>
                              <td>Rp. <?= number_format($total_bayar,2,',','.') ?></td>
                              <td>Rp. <?= number_format($kembalian,2,',','.')?></td>
                              <td>Rp. <?= number_format($total_bayar - $kembalian,2,',','.') ?></td>
                            </tr>
                          <?php  endforeach; ?>
                        </tbody>
                            <tfoot>
                                <tr>
                                  <td colspan="7"><h5>Sub Total </h5></td>
                                  <td>: Rp. <?= number_format($sub_total,2,',','.') ?></td>
                                </tr>
                            </tfoot>
                      </table>
</body>
</html>