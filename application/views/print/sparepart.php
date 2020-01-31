<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Form Sparepart</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" />
  
</head>
<body onload="window.print()">
<style>
@media print {
  @page { 
    size:a4; 
    size:landscape;
  }
}
th,td{
  border:1px solid  black;
  padding:5px;
}

table{
  width:100%;
  border-collapse: collapse;  
}

.cali {
  font-family: "calibri";
  font-size:12px;
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
        <table class="atas">
            <tr>
              <td class="no-border" style="width: 5%; vertical-align: top;"><b>Factory</b></td>
              <td class="no-border" style="width: 1%; vertical-align: top; "><b>:</b></td>
              <td class="no-border" style="width: 1679px; vertical-align: top;"><b>PT. Indofood CBP Sukses Makmur Tbk</b></td>
            </tr>
            <tr>
              <td class="no-border" style="width: 5%; vertical-align: top; ;"><b>Divisi</b></td>
              <td class="no-border" style="width: 22.2639px; vertical-align: top;"><b>:</b></td>
              <td class="no-border" style="width: 1679px; vertical-align: top; "><b>Food Ingredient</b></td>
            </tr>
            <tr>
              <td class="no-border" style="width: 5%; vertical-align: top; height: 15px;"><b>Cabang</b></td>
              <td class="no-border" style="width: 22.2639px; vertical-align: top; height: 15px;"><b>:</b></td>
              <td class="no-border" style="width: 1679px; vertical-align: top; height: 15px;"><b>Purwakarta</b></td>
            </tr>
            <tr>
              <td class="no-border" style="width: 5%; vertical-align: top; height: 15px;"><b>Departemen</b></td>
              <td class="no-border" style="width: 22.2639px; vertical-align: top; height: 15px;"><b>:</b></td>
              <td class="no-border" style="width: 1679px; vertical-align: top; height: 15px;"><b>Teknik</b></td>
            </tr>
        </table>              
    </div>

<div align="center">
  <h2><b>SURAT PENOLAKAN BARANG</b></h2>
</div>
<div>
    <table>
        <tr">
          <td class="no-border" style="width: 225px; vertical-align: top; text-align: left; height: 5px;"><b>Supplier :</b> <?php echo $result['bank_vendorname']?></td>
          <td class="no-border" style="width: 225px; vertical-align: top; height: 5px;"></td>
          <td class="no-border" style="width: 225px; vertical-align: top; height: 5px;"></td>
          <td class="no-border" style="width: 225px; vertical-align: top; text-align: right; height: 5px;"><b>Nomor :</b> <?php echo $result['bank_vehiclenumber']?></td>
        </tr>
        <tr">
          <td class="no-border" style="width: 115px; vertical-align: top; text-align: left; height: 5px;"><b>No. Surat Jalan :</b> <?php echo $result['delivery_number']?></td>
          <td class="no-border" style="width: 15px; vertical-align: top; height: 5px;"></td>
          <td class="no-border" style="width: 25px; vertical-align: top; height: 5px;"></td>
          <td class="no-border" style="width: 112px; vertical-align: top; text-align: right; height: 5px;"><b>Tanggal :</b> <?php echo date("d-F-Y", strtotime($result['quality_checkstamp']));?></td>
        </tr>
    </table>
</div>
<table style="width: 100%">
    <thead>
      <tr>
        <th width="2%">No</th>
        <th width="7%%">Nama Barang</th>
        <th width="5%">Jumlah Yang Datang</th>
        <th width="7%%">Tanggal Kirim</th>
        <th width="7%%">Nomor PO</th>
        <th width="10%">Hasil Analisa</th>
        <th width="5%">Jumlah Yang Diterima</th>
        <th width="10%">Keterangan</th>
      </tr>
    </thead>
    <tbody>

      <?php   
      $no=1;
      
      foreach ($result as $rs)  ?>
        <tr>
          <td class="text-center"><?php echo $no++;?></td>
          <td><?php echo $result['detail_matname'];?></td>
          <td><?php echo $result['delivery_target'];?></td>
          <td><?php echo $result['quality_checkstamp'];?></td>
          <td><?php echo $result['data_po']?></td>
          <td><?php echo $result['quality_conclusion']?></td>
          <td><?php echo $result['delivery_number']?></td>
          <td><?php echo $result['quality_remark']?></td>
        </tr>
     <?php  ?>   
    </tbody>
</table>
<br>
<div>
    <table cellspacing="0" cellpadding="0">
        <tr style="height: 10px;">
          <td class="no-border cali" class="cali" style="width: 5%; vertical-align: top; text-align: left; height: 15px;">Distribusi, </td>
          <td class="no-border" style="width: 18%; vertical-align: top; height: 15px;"><b>Disaksikan Oleh,</b></td>
          <td class="no-border" style="width: 20%; vertical-align: top; height: 15px;"><b>Diperiksa Oleh,</b></td>
          <td class="no-border" style="width: 25%; vertical-align: top; text-align: right; height: 15px;"><b>Disetujui Oleh,</b></td>
        </tr>
        <tr style="height: 5px;">
          <td class="no-border cali" style="width: 50%; vertical-align: top; height: 5px;">1. Putih : Supplier</td>
        </tr>
        <tr style="height: 5px;">
          <td class="no-border cali" style="width: 50%; vertical-align: top; height: 5px;">2. Merah : Purchasing</td>
        </tr>
        <tr style="height: 5px;">
          <td class="no-border cali" style="width: 50%; vertical-align: top; height: 5px;">3. Biru  : QC Teknik / Pemesan</td>
        </tr>
        <tr style="height: 5px;">
          <td class="no-border cali" style="width: 50%; vertical-align: top; height: 5px;">4. Hijau : Accounting</td>
        </tr>
        <tr style="height: 5px;">
          <td class="no-border cali" style="width: 15%; vertical-align: top; height: 15px;">5. Kuning : Gudang Sparepart</td>
          <td class="no-border" style="width: 10%; vertical-align: top; height: 15px;"><b>( Admin Gudang SP )</b></td>
          <td class="no-border" style="width: 10%; vertical-align: top; height: 15px;"><b>( QC Teknik / Pemesan)</b></td>
          <td class="no-border" style="width: 25%; vertical-align: top; text-align: center; height: 15px;"><b>( SPV Teknik)</b></td>
        </tr>
    </table>
    <table cellspacing="0" cellpadding="0">
        <tr style="height: 10px;">
          <td class="border cali" style="width: 10%; vertical-align: middle; text-align: left; height: 15px;"><b>Copy No. </b></td>
          <td class="no-border" style="width: 52%; vertical-align: top; height: 15px;"></td>
          <td class="no-border" style="width: 27%; vertical-align: top; height: 15px;"></td>
          <td class="no-border cali" style="width: 15%; vertical-align: top; height: 15px;"><b>F04.01/FAT-FTK-006</b></td>
        </tr>
    </table>
</div>
  
</body>
</html>