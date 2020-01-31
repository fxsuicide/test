<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Form Timbangan Halus</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" />
  <link rel="stylesheet" href="<?php echo base_url('asset/asset410/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('asset/asset410/css/navbar-top-fixed.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('asset/asset410/css/indofood.css'); ?>">
  <script src="<?php echo base_url('asset/asset410/js/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('asset/asset410/js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('asset/asset410/js/angular.min.js'); ?>"></script>
  
</head>
<body onload="window.print()">
<style>
@media print{@page {size: a4 landscape;}}
th,td{
  border:1px solid  black;
  padding:5px;
}

table{
  width:100%;
  border-collapse: collapse; 
}

body {
   margin: 0;
   padding: 0;
}

.no-border{
  border:1px solid  white;
}
.text-center{
  text-align:center;
}

.no-padding-top{
  padding-top:0px !important;
}

.no-padding-bottom{
  padding-bottom:0px !important;
}

.pull-right{
  float:right;
}
</style>
<div class="container">
    <div class="row">
        <table>
            <tr style="height: 10px;">
              <td class="no-border" style="width: 10%; vertical-align: top; height: 15px;">Factory</td>
              <td class="no-border" style="width: 1%; vertical-align: top; height: 15px;">:</td>
              <td class="no-border" style="width: 1679px; vertical-align: top; height: 15px;">PT. INDOFOOD CBP SUKSES MAKMUR Tbk</td>
            </tr>
            <tr style="height: 10px;">
              <td class="no-border" style="width: 15%; vertical-align: top; height: 15px;">Divisi / Unit</td>
              <td class="no-border" style="width: 22.2639px; vertical-align: top; height: 15px;">:</td>
              <td class="no-border" style="width: 1679px; vertical-align: top; height: 15px;">Food Ingredient / Blending & Packing</td>
            </tr>
            <tr style="height: 10px;">
              <td class="no-border" style="width: 15%; vertical-align: top; height: 15px;">Cabang / Dept</td>
              <td class="no-border" style="width: 22.2639px; vertical-align: top; height: 15px;">:</td>
              <td class="no-border" style="width: 1679px; vertical-align: top; height: 15px;">Pasuruan / Gudang</td>
            </tr>
        </table>              
    </div>
<div align="center">
  <h5><b>FORM SERAH TERIMA BAHAN BAKU & LAPORAN HASIL METAL DETECTOR</b></h4>
</div>
<div>
  <h7><b>KONDISI METAL DETECTOR</b></h4>
</div>
<div class="row">
  <div class="col-9">
      <table style="width: 40%;">
          <tr class="text-center">
            <th colspan="3">Jenis Test Piece</th>
            <th rowspan="2">Sensitifitas</th>
            <th rowspan="2">Phase</th>
            <th rowspan="2">Kemampuan Deteksi</th>
            <th rowspan="2">Kondisi Alat</th>
          </tr>
          <tr class="text-center">
            <th>FE (4,5mm)</th>
            <th>BS (4,5mm)</th>
            <th>SS (4,5mm)</th>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td class="text-right">101</td>
            <td class="text-right">132,59</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
      </table>
  </div>
  <div class="col-3">
      <?php foreach ($result as $res => $dt) ?>
          <div>Nama Supplier : <?php echo $dt['bank_vendorname'] ?></div><br>
          <div>No. Mobil : <?php echo $dt['bank_vehiclenumber'] ?></div><br>
          <div>Jam Kedatangan : <?php echo date('H:i:s',strtotime($dt['jam']));?></div><br>
        <?php  ?>

  </div>
</div>
<table>
  <thead>
    <tr class="text-center">
      <th style="width:7%" rowspan="2">Material Number</th>
      <th style="width:15.7%" rowspan="2">Nama Barang</th>
      <th style="width:6%" rowspan="2">Surat Jalan</th>
      <th colspan="10">Hasil Timbangan</th>
      <th style="width:5%" rowspan="2">Total</th>
      <th style="width:5%" rowspan="2">Selisih</th>
      <th colspan="2">Hasil Metal Detector</th>
      <th rowspan="2">Jenis Temuan</th>
    </tr>
    <tr class="text-center">
      <th style="width:3%">1</th>
      <th style="width:3%">2</th>
      <th style="width:3%">3</th>
      <th style="width:3%">4</th>
      <th style="width:3%">5</th>
      <th style="width:3%">6</th>
      <th style="width:3%">7</th>
      <th style="width:3%">8</th>
      <th style="width:3%">9</th>
      <th style="width:3%">10</th>
      <th style="width:5%">Ya</th>
      <th style="width:5%">Tidak</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    foreach($result as $key => $rs){
      $rowspan = count($rs['sj_list']); 
      foreach($rs['sj_list'] as $k => $sj_list){
        $hasilTimbangan = '';
        for($i = 0;$i < 10;$i++){
          $hasilTimbangan .= isset($sj_list[$i]) ? '<td>'.$sj_list[$i].'</td>' : '<td>&nbsp;</td>';
        }
    ?>
      <?php if($k == 0){ ?>
      <tr>
        <td align="center" rowspan="<?php echo $rowspan?>"><?php echo $rs['detail_matnumber']?></td>
        <td rowspan="<?php echo $rowspan?>"><?php echo $rs['detail_matname']?></td>
        <td rowspan="<?php echo $rowspan?>"><?php echo $rs['detail_target']?></td>
        <?php echo $hasilTimbangan ?>        
        <td rowspan="<?php echo $rowspan?>"><?php echo $rs['total']?></td>
        <td rowspan="<?php echo $rowspan?>"><?php echo $rs['selisih']?></td>
        <td rowspan="<?php echo $rowspan?>"></td>
        <td rowspan="<?php echo $rowspan?>"></td>
        <td rowspan="<?php echo $rowspan?>"></td>
      </tr>
      <?php }else{ 
        echo '<tr>'.$hasilTimbangan.'</tr>'; 
      } ?>
    <?php } 
    } ?>
</table>
<div>
    <table>
        <tr style="height: 10px;">
          <td class="no-border" style="width: 40%; vertical-align: top; height: 15px;">Catatan : Beri tanda ( V ) bila sesuai persyaratan dan beri tanda ( X ) bila tidak sesuai persyaratan</td>
          <td class="no-border" style="width: 15%; vertical-align: top; height: 15px;">Terima Keranjang :</td>
          <td class="no-border" style="width: 20%; vertical-align: top; text-align: right; height: 15px;">F06.01/FAN-FWH-002</td>
        </tr>
        <tr style="height: 10px;">
          <td class="no-border" style="width: 50%; vertical-align: top; height: 15px;">Serah terima I</td>
          <td class="no-border" style="width: 10%; vertical-align: top; height: 15px;"></td>
          <td class="no-border" style="width: 5%; vertical-align: top; text-align: center; height: 15px;"></td>
          <td class="no-border" style="width: 20%; vertical-align: top; text-align: right; height: 15px;">Diketahui Oleh :</td>
        </tr>
        <tr style="height: 10px;">
            <td class="no-border" style="width: 288.736px; vertical-align: top; height: 15px;">Ditimbang & Diserahkan oleh,</td>
            <td class="no-border" style="width: 22.2639px; vertical-align: top; height: 15px;">Diterima oleh,</td>
            <td class="no-border" style="width: 961px; vertical-align: top; text-align: center; height: 15px;">Diverifikasi oleh,</td>
            <td class="no-border" style="width: 718px; vertical-align: top; text-align: right; height: 15px;"></td>
          </tr>
          <tr style="height: 10px;">
            <td class="no-border" style="width: 288.736px; vertical-align: top;">&nbsp;</td>
            <td class="no-border" style="width: 22.2639px; vertical-align: top;">&nbsp;</td>
            <td class="no-border" style="width: 961px; vertical-align: top; text-align: center; ">&nbsp;</td>
            <td class="no-border" style="width: 718px; vertical-align: top; text-align: right; ">&nbsp;</td>
          </tr>
          <tr style="height: 10px;">
            <td class="no-border" style="width: 288.736px; vertical-align: top; height: 15px;">_________________________</td>
            <td class="no-border" style="width: 22.2639px; vertical-align: top; height: 15px;">___________________________</td>
            <td class="no-border" style="width: 961px; vertical-align: top; text-align: center; height: 15px;">QC</td>
            <td class="no-border" style="width: 10%; vertical-align: top; text-align: right; height: 15px;">WH. Spv</td>
          </tr>
    </table>
</div>
</div>
</body>
</html>