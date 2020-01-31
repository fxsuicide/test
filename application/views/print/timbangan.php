<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Form Timbangan Halus</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" />
  
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

<div align="center">
  <h4><b>FORM TIMBANGAN BAHAN BAKU</b></h4>
</div>
<?php foreach ($result as $res => $dt) ?>
    <div>Nama Supplier : <?php echo $dt['bank_vendorname'] ?></div><br>
    <div>No. Mobil : <?php echo $dt['bank_vehiclenumber'] ?></div><br>
    <div>Waktu Kedatangan : <?php echo $dt['jam'] ?></div><br>
    
    <?php  ?>

<table>
  <thead>
    
    <!--
    <tr>
      <td class="no-border no-padding-top no-padding-bottom" colspan="5"></td>
      <td class="no-border no-padding-top no-padding-bottom" colspan="3">   
      Tanggal 
      <p class="pull-right">:</p>
      </td>
      <td class="no-border no-padding-top" colspan="9"></td>
    </tr>
    <tr>
      <td class="no-border no-padding-top" colspan="5"></td>
      <td class="no-border no-padding-top" colspan="3">   
      Jam Kedatangan
      <p class="pull-right">:</p>
      </td>
      <td class="no-border no-padding-top" colspan="9"></td>
    </tr>-->
  </thead>
  <thead>
    <tr>
      <th rowspan="2">NO</th>
      <th rowspan="2">Nama Barang</th>
      <th colspan="2">TERIMA</th>
      <th colspan="10">Hasil Timbangan</th>
      <th rowspan="2">TOTAL</th>
      <th rowspan="2">Selisih</th>
      <th rowspan="2">Unit</th>
      <th rowspan="2">Jam Mulai</th>
      <th rowspan="2">Jam Selesai</th>
    </tr>
    <tr>
      <th>Surat Jln</th>
      <th>Unit</th>
      <th>1</th>
      <th>2</th>
      <th>3</th>
      <th>4</th>
      <th>5</th>
      <th>6</th>
      <th>7</th>
      <th>8</th>
      <th>9</th>
      <th>10</th>
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
        <td class="text-center" rowspan="<?php echo $rowspan?>"><?php echo $key+1 ?></td>
        <td rowspan="<?php echo $rowspan?>"><?php echo $rs['detail_matname']?></td>
        <td rowspan="<?php echo $rowspan?>"><?php echo $rs['detail_target']?></td>
        <td rowspan="<?php echo $rowspan?>">KG</td>
        <?php echo $hasilTimbangan ?>        
        <td rowspan="<?php echo $rowspan?>"><?php echo $rs['total']?></td>
        <td rowspan="<?php echo $rowspan?>"><?php echo $rs['selisih']?></td>
        <td rowspan="<?php echo $rowspan?>">KG</td>
        <td rowspan="<?php echo $rowspan?>"><?php echo $rs['mulai']?></td>
        <td rowspan="<?php echo $rowspan?>"><?php echo $rs['selesai']?></td>
      </tr>
      <?php }else{ 
        echo '<tr>'.$hasilTimbangan.'</tr>'; 
      } ?>
    <?php } 
    } ?>
</table>
  
</body>
</html>