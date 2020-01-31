<html>

<head></head>
<style>
  @media print {
    @page {
      size: A4
    }
  }

  .wrapper {
    border: 1px solid black;
    padding: 20px;
  }

  table {
    width: 100%;

  }

  .break {
    page-break-inside: avoid;
    page-break-after: auto
  }

  .bb td, .bb th {
    border-bottom: 1px solid black !important;
    }

  .cc td, .cc th {
    border-bottom: 1px solid black !important;
    border-top: 1px solid black !important;
    border-left: : 1px solid black !important;
    border-right: : 1px solid black !important;
  }
  .dd td, .dd th {
    border-left: : 1px solid black !important;
    border-right: : 1px solid black !important;
  }

</style>

<body>

  <!DOCTYPE html>
  <html>

  <head>
  </head>

  <body onload="window.print()">
    <tbody>
    <div class="wrapper">
      <table style="width: 100%;">
          <tr style="height: 15px;">
            <td style="width: 288.736px; vertical-align: top; height: 15px;">FACTORY</td>
            <td style="width: 22.2639px; vertical-align: top; height: 15px;">:</td>
            <td style="width: 1679px; vertical-align: top; height: 15px;" colspan="2">PT. INDOFOOD CBP SUKSES MAKMUR Tbk</td>
          </tr>
          <tr style="height: 15px;">
            <td style="width: 288.736px; vertical-align: top; height: 15px;">DIVISI</td>
            <td style="width: 22.2639px; vertical-align: top; height: 15px;">:</td>
            <td style="width: 1679px; vertical-align: top; height: 15px;" colspan="2">FOOD INGREDIENT</td>
          </tr>
          <tr style="height: 15px;">
            <td style="width: 288.736px; vertical-align: top; height: 15px;">UNIT</td>
            <td style="width: 22.2639px; vertical-align: top; height: 15px;">:</td>
            <td style="width: 1679px; vertical-align: top; height: 15px;" colspan="2">BLENDING &amp; PACKING</td>
          </tr>
          <tr style="height: 15px;">
            <td style="width: 288.736px; vertical-align: top; height: 15px;">CABANG</td>
            <td style="width: 22.2639px; vertical-align: top; height: 15px;">:</td>
            <td style="width: 1679px; vertical-align: top; height: 15px;" colspan="2">PURWAKARTA</td>
          </tr>
          <tr style="height: 15px;">
            <td style="width: 288.736px; vertical-align: top; height: 15px;">DEPARTEMEN</td>
            <td style="width: 22.2639px; vertical-align: top; height: 15px;">:</td>
            <td style="width: 1679px; vertical-align: top; height: 15px;" colspan="2">QUALITY CONTROL</td>
          </tr>
          <tr style="height: 15px;">
            <td style="width: 288.736px; vertical-align: top; height: 15px;">&nbsp;</td>
            <td style="width: 22.2639px; vertical-align: top; height: 15px;">&nbsp;</td>
            <td style="width: 961px; vertical-align: top; height: 15px;">&nbsp;</td>
            <td style="width: 718px; vertical-align: top; height: 15px;">&nbsp;</td>
          </tr>
          <tr style="height: 15px;">
            <td style="width: 288.736px; vertical-align: top; height: 15px;">&nbsp;</td>
            <td style="width: 22.2639px; vertical-align: top; height: 15px;">&nbsp;</td>
            <td style="width: 961px; vertical-align: top; height: 15px;">&nbsp;</td>
            <td style="width: 718px; vertical-align: top; height: 15px;">&nbsp;</td>
          </tr>
        </table>
        <div align="center">
          <h4><b>HASIL ANALISA PENOLAKAN BAHAN BAKU</b></h4>
        </div>
        <table>
          <tr style="height: 15px;" class="cc">
            <td style="width: 288.736px; vertical-align: top; height: 15px;">Nama Bahan Baku</td>
            <td style="width: 22.2639px; vertical-align: top; height: 15px; border-top: thin solid">:</td>
            <td style="width: 1679px; vertical-align: top; height: 15px;border-top: thin solid" colspan="2"><?php echo $result['quality_matname'];?></td>
          </tr>
          <tr style="height: 15px;" class="bb">
            <td style="width: 288.736px; vertical-align: top; height: 15px;">No. Kendaraan</td>
            <td style="width: 22.2639px; vertical-align: top; height: 15px;">:</td>
            <td style="width: 1679px; vertical-align: top; height: 15px;" colspan="2"><?php echo $result['bank_vehiclenumber'];?></td>
          </tr>
          <tr style="height: 15px;" class="bb">
            <td style="width: 288.736px; vertical-align: top; height: 15px;">Tanggal Tiba</td>
            <td style="width: 22.2639px; vertical-align: top; height: 15px;">:</td>
            <td style="width: 1679px; vertical-align: top; height: 15px;" colspan="2">test</td>
          </tr>
          <tr style="height: 15px;" class="bb">
            <td style="width: 288.736px; vertical-align: top; height: 15px;">Jumlah</td>
            <td style="width: 22.2639px; vertical-align: top; height: 15px;">:</td>
            <td style="width: 1679px; vertical-align: top; height: 15px;" colspan="2"><?php echo $result['detail_tare1'];?> Kg</td>
          </tr>
          <tr style="height: 15px;">
            <td style="width: 288.736px; vertical-align: top; height: 15px;">&nbsp;</td>
            <td style="width: 22.2639px; vertical-align: top; height: 15px;">&nbsp;</td>
            <td style="width: 1679px; vertical-align: top; height: 15px;" colspan="2">&nbsp;</td>
          </tr>
          <tr style="height: 15px;">
            <td style="width: 288.736px; vertical-align: top; height: 15px;">&nbsp;</td>
            <td style="width: 22.2639px; vertical-align: top; height: 15px;">&nbsp;</td>
            <td style="width: 1679px; vertical-align: top; height: 15px;" colspan="2">&nbsp;</td>
          </tr>
          <tr style="height: 15px;" class="cc">
            <td style="width: 288.736px; vertical-align: top; height: 15px;">Supplier</td>
            <td style="width: 22.2639px; vertical-align: top; height: 15px;">:</td>
            <td style="width: 961px; vertical-align: top; height: 15px;"><?php echo $result['bank_vendorname'];?></td>
            <td style="width: 718px; vertical-align: top; height: 15px;">|&nbsp;SJ. : <?php echo $result['delivery_number'];?></td>
          </tr>
          <tr style="height: 33px;">
            <td style="width: 288.736px; vertical-align: top; height: 33px;">Hasil Pemeriksaan</td>
            <td style="width: 22.2639px; vertical-align: top; height: 33px;">:</td>
            <td style="width: 1679px; vertical-align: top; height: 33px;" colspan="2"><?php echo $result['quality_remark'];?></td>
          </tr>
          <tr style="height: 15px;">
            <td style="width: 288.736px; vertical-align: top; height: 15px;">&nbsp;</td>
            <td style="width: 22.2639px; vertical-align: top; height: 15px;">&nbsp;</td>
            <td style="width: 1679px; vertical-align: top; height: 15px;" colspan="2">&nbsp;</td>
          </tr>
          <tr style="height: 15px;">
            <td style="width: 288.736px; vertical-align: top; height: 15px;">&nbsp;</td>
            <td style="width: 22.2639px; vertical-align: top; height: 15px;"></td>
            <td style="width: 1679px; vertical-align: top; height: 15px;" colspan="2">Standar : <?php echo $result['quality_standard'];?></td>
          </tr>
          <tr style="height: 15px;">
            <td style="width: 288.736px; vertical-align: top; height: 15px;">&nbsp;</td>
            <td style="width: 22.2639px; vertical-align: top; height: 15px;">&nbsp;</td>
            <td style="width: 1679px; vertical-align: top; height: 15px;" colspan="2">&nbsp;</td>
          </tr>
          <tr style="height: 15px;" class="cc">
            <td style="width: 288.736px; vertical-align: top; height: 15px;">Kesimpulan</td>
            <td style="width: 22.2639px; vertical-align: top; height: 15px;">:</td>
            <td style="width: 1679px; vertical-align: top; height: 15px;" colspan="2"><?php echo $result['quality_conclusion'];?></td>
          </tr>
          <tr style="height: 15px;">
            <td style="width: 1990px; vertical-align: top; height: 15px;" colspan="4">&nbsp;</td>
          </tr>
          <tr style="height: 48.2222px;">
            <td style="width: 288.736px; vertical-align: top; height: 48.2222px;">&nbsp;</td>
            <td style="width: 22.2639px; vertical-align: top; height: 48.2222px;">&nbsp;</td>
            <td style="width: 1679px; vertical-align: top; height: 48.2222px;" colspan="2">&nbsp;</td>
          </tr>
          <tr style="height: 15px;">
            <td style="width: 288.736px; vertical-align: top; height: 15px;">&nbsp;</td>
            <td style="width: 22.2639px; vertical-align: top; height: 15px;">&nbsp;</td>
            <td style="width: 961px; vertical-align: top; text-align: center; height: 15px;">&nbsp;</td>
            <td style="width: 718px; vertical-align: top; text-align: right; height: 15px;">Purwakarta, <?php echo $result['quality_checkstamp'];?></td>
          </tr>
          <tr style="height: 15px;"></tr>
          <tr style="height: 15px;">
            <td style="width: 288.736px; vertical-align: top; height: 15px;">Diketahui oleh,</td>
            <td style="width: 22.2639px; vertical-align: top; height: 15px;">&nbsp;</td>
            <td style="width: 961px; vertical-align: top; text-align: center; height: 15px;">Disaksikan oleh,</td>
            <td style="width: 718px; vertical-align: top; text-align: right; height: 15px;">Diperiksa oleh,</td>
          </tr>
          <tr style="height: 69px;">
            <td style="width: 288.736px; vertical-align: top; height: 69px;">&nbsp;</td>
            <td style="width: 22.2639px; vertical-align: top; height: 69px;">&nbsp;</td>
            <td style="width: 961px; vertical-align: top; text-align: center; height: 69px;">&nbsp;</td>
            <td style="width: 718px; vertical-align: top; text-align: right; height: 69px;">&nbsp;</td>
          </tr>
          <tr style="height: 15px;">
            <td style="width: 288.736px; vertical-align: top; height: 15px;">QC. Spv.</td>
            <td style="width: 22.2639px; vertical-align: top; height: 15px;">&nbsp;</td>
            <td style="width: 961px; vertical-align: top; text-align: center; height: 15px;">Gd. RM. Spv.</td>
            <td style="width: 718px; vertical-align: top; text-align: right; height: 15px;">&nbsp; QC. Bahan Baku</td>
          </tr>
          <tr style="height: 15px;">
            <td style="width: 288.736px; vertical-align: top; height: 15px;">&nbsp;</td>
            <td style="width: 22.2639px; vertical-align: top; height: 15px;">&nbsp;</td>
            <td style="width: 961px; vertical-align: top; text-align: center; height: 15px;">&nbsp;</td>
            <td style="width: 718px; vertical-align: top; text-align: right; height: 15px;">&nbsp;</td>
          </tr>
          <tr style="height: 15px;">
            <td style="width: 1272px; vertical-align: top; height: 15px;" colspan="3">cc :&nbsp; - Central Purchasing Mgr.</td>
            <td style="width: 718px; vertical-align: top; text-align: right; height: 15px;">&nbsp;</td>
          </tr>
          <tr style="height: 15px;">
            <td style="width: 1272px; vertical-align: top; height: 15px;" colspan="3">&nbsp; &nbsp; &nbsp; &nbsp;- Fact. Mgr.</td>
            <td style="width: 718px; vertical-align: top; text-align: right; height: 15px;">&nbsp;</td>
          </tr>
          <tr style="height: 15px;">
            <td style="width: 1272px; vertical-align: top; height: 15px;" colspan="3">&nbsp; &nbsp; &nbsp; &nbsp;- FAM.</td>
            <td style="width: 718px; vertical-align: top; text-align: right; height: 15px;">&nbsp;</td>
          </tr>
          <tr style="height: 15px;">
            <td style="width: 1272px; vertical-align: top; height: 15px;" colspan="3">&nbsp; &nbsp; &nbsp; &nbsp;- QC. Mgr.</td>
            <td style="width: 718px; vertical-align: top; text-align: right; height: 15px;">&nbsp;</td>
          </tr>
          <tr style="height: 15px;">
            <td style="width: 1272px; vertical-align: top; height: 15px;" colspan="3">&nbsp; &nbsp; &nbsp; &nbsp;- PPIC. Mgr.</td>
            <td style="width: 718px; vertical-align: top; text-align: right; height: 15px;">&nbsp;</td>
          </tr>
          <tr style="height: 15px;">
            <td style="width: 1272px; vertical-align: top; height: 15px;" colspan="3">&nbsp; &nbsp; &nbsp; &nbsp;- QC. Spv. B &amp; P&nbsp;</td>
            <td style="width: 718px; vertical-align: top; text-align: right; height: 15px;">&nbsp;</td>
          </tr>
          <tr style="height: 15px;">
            <td style="width: 1272px; vertical-align: top; height: 15px;" colspan="3">&nbsp; &nbsp; &nbsp; &nbsp;- File</td>
            <td style="width: 718px; vertical-align: top; text-align: right; height: 15px;">&nbsp;</td>
          </tr>
          <tr style="height: 15px;">
            <td style="width: 1272px; vertical-align: top; height: 15px;" colspan="3">&nbsp;</td>
            <td style="width: 718px; vertical-align: top; text-align: right; height: 15px;">&nbsp;</td>
          </tr>
          <tr style="height: 15px;">
            <td style="width: 1272px; vertical-align: top; height: 15px;" colspan="3">&nbsp;</td>
            <td style="width: 718px; vertical-align: top; text-align: right; height: 15px;">F 01.02/FAT-FQC-005</td>
          </tr>
      </table>
    </div>
    </tbody>
  </body>

  </html>