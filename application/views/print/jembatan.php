<html>

<head></head>
<style>
  @media print and (width: 8.46in) and (height: 5.5in){
      @page {
       margin:0;  
       } 
  }
  .wrapper {
    border: 0px solid black;
    padding: 25px;
  }

  table {
    width: 100%;
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
    <div class="wrapper">
      <table style="width: 100%;">
        <tbody>
          <tr style="height: 15px;">
            <td style="width: 2100px; text-align: center; vertical-align: top; height: 15px;" colspan="4">
              <strong>PT. INDOFOOD CBP SUKSES MAKMUR Tbk</strong>
            </td>
          </tr>
          <br>
          <tr style="height: 15px;">
            <td style="width: 288.736px; vertical-align: top; height: 15px;">Vehicles</td>
            <td style="width: 22.2639px; vertical-align: top; height: 15px;">:</td>
            <td style="width: 1679px; vertical-align: top; height: 15px;" colspan="2"><?php echo $result[0]['bank_vehiclenumber'];?></td>
          </tr>
          <tr style="height: 15px;">
            <td style="width: 288.736px; vertical-align: top; height: 15px;">Date In</td>
            <td style="width: 22.2639px; vertical-align: top; height: 15px;">:</td>
            <td style="width: 1679px; vertical-align: top; height: 15px;" colspan="2"><?php echo $result[0]['weight_datetime'];?></td>
          </tr>
          <tr style="height: 15px;">
            <td style="width: 288.736px; vertical-align: top; height: 15px;">Ticket Number</td>
            <td style="width: 22.2639px; vertical-align: top; height: 15px;">:</td>
            <td style="width: 1679px; vertical-align: top; height: 15px;" colspan="2"><?php echo $result[0]['bank_routeflag'];?></td>
          </tr>
          <tr style="height: 15px;">
            <td style="width: 288.736px; vertical-align: top; height: 20px;border-top: thin solid">Customers</td>
            <td style="width: 22.2639px; vertical-align: top; height: 20px; border-top: thin solid">:</td>
            <td style="width: 1679px; vertical-align: top; height: 20px;border-top: thin solid" colspan="2"><?php echo $result[0]['bank_vendorname'];?></td>
          </tr>
          <tr style="height: 15px;">
            <td style="width: 288.736px; vertical-align: top; height: 20px;">Transporters</td>
            <td style="width: 22.2639px; vertical-align: top; height: 20px;">:</td>
            <td style="width: 1679px; vertical-align: top; height: 20px;" colspan="2"><?php echo $result[0]['bank_transname'];?></td>
          </tr>
          <tr style="height: 15px;">
            <td style="width: 288.736px; vertical-align: top; height: 20px;">1st Weighing</td>
            <td style="width: 22.2639px; vertical-align: top; height: 20px;">:</td>
            <td style="width: 1679px; vertical-align: top; height: 20px;" colspan="2"><?php echo $result[0]['weight_gross']."&nbsp;Kg &nbsp;&nbsp;&nbsp;".$result[0]['weight_datetime'];?></td>
          </tr>
          <tr style="height: 15px;">
            <td style="width: 288.736px; vertical-align: top; height: 20px;">2nd Weighing</td>
            <td style="width: 22.2639px; vertical-align: top; height: 20px;">:</td>
            <td style="width: 1679px; vertical-align: top; height: 20px;" colspan="2">
              <?php if (!empty($result[1]['weight_gross']) && !empty($result[1]['weight_datetime'])) {
                echo $result[1]['weight_gross']."&nbsp;Kg &nbsp;&nbsp;&nbsp;".$result[1]['weight_datetime'];
            }else{

              echo "_____ Kg";
            }

            ?>
            </td>
          </tr>
          <tr style="height: 15px;">
            <td style="width: 288.736px; vertical-align: top; height: 20px;">Netto</td>
            <td style="width: 22.2639px; vertical-align: top; height: 20px;">:</td>
            <td style="width: 1679px; vertical-align: top; height: 20px;" colspan="2">
              <?php if(!empty($result[1]['weight_gross']) && !empty($result[1]['weight_datetime'])){
                echo ABS($result[0]['weight_gross'] - $result[1]['weight_gross']);
              }else {
                echo $result[0]['weight_gross'];
              }
              ?> Kg
            </td>
          </tr>
          <tr style="height: 15px;">
            <td style="width: 288.736px; vertical-align: top; height: 20px;">Remark</td>
            <td style="width: 22.2639px; vertical-align: top; height: 20px;">:</td>
            <td style="width: 1679px; vertical-align: top; height: 20px;" colspan="2"><?php echo $result[0]['bank_vehiclenote'];?></td>
          </tr>
          <tr style="height: 15px;" class="bb">
            <td style="width: 288.736px; vertical-align: top; height: 20px;">Driver Name</td>
            <td style="width: 22.2639px; vertical-align: top; height: 20px;">:</td>
            <td style="width: 1679px; vertical-align: top; height: 20px;" colspan="2"><?php echo $result[0]['bank_vehicledriver'];?></td>
          </tr>
          <tr style="height: 15px;">
            <td style="width: 288.736px; vertical-align: top; height: 15px;">&nbsp;</td>
            <td style="width: 22.2639px; vertical-align: top; height: 15px;">&nbsp;</td>
            <td style="width: 961px; vertical-align: top; text-align: center; height: 15px;">Driver,</td>
            <td style="width: 718px; vertical-align: top; text-align: right; height: 15px;">Checked By,</td>
          </tr>
          <tr style="height: 25px;">
            <td style="width: 288.736px; vertical-align: top; height: 69px;">&nbsp;</td>
            <td style="width: 22.2639px; vertical-align: top; height: 69px;">&nbsp;</td>
            <td style="width: 961px; vertical-align: top; text-align: center; height: 69px;">&nbsp;</td>
            <td style="width: 718px; vertical-align: top; text-align: right; height: 69px;">&nbsp;</td>
          </tr>
          <tr style="height: 10px;">
            <td style="width: 288.736px; vertical-align: top; height: 15px;">&nbsp;</td>
            <td style="width: 22.2639px; vertical-align: top; height: 15px;">&nbsp;</td>
            <td style="width: 961px; vertical-align: top; text-align: center; height: 15px;">____________</td>
            <td style="width: 718px; vertical-align: top; text-align: right; height: 15px;">___________</td>
          </tr>
          <tr style="height: 10px;">
            <td style="width: 288.736px; vertical-align: top; height: 15px;">&nbsp;</td>
            <td style="width: 22.2639px; vertical-align: top; height: 15px;">&nbsp;</td>
            <td style="width: 961px; vertical-align: top; text-align: center; height: 15px;">&nbsp;</td>
            <td style="width: 718px; vertical-align: top; text-align: right; font-size: 12px; height: 15px;">F01./FAN-FWH-002</td>
          </tr>
        </tbody>
      </table>
    </div>
  </body>

  </html>