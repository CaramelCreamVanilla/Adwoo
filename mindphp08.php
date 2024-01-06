<?php  
 function fetch_data()  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "tbl_employee");  
      $sql = "SELECT * FROM tbl_employee ORDER BY id ASC";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                          <td>'.$row["id"].'</td>  
                          <td>'.$row["name"].'</td>  
                          <td>'.$row["gender"].'</td>  
                          <td>'.$row["designation"].'</td>  
                          <td>'.$row["age"].'</td>  
                          <td>'.$row["img"].'</td>  
                     </tr>  
                          ';  
      }
        
      return $output;
 }
 if(isset($_POST["create_pdf"]))
 {
      require_once('TCPDF-main/tcpdf.php');
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
      $obj_pdf->SetCreator(PDF_CREATOR);
      $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
      $obj_pdf->SetDefaultMonospacedFont('helvetica');
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
      $obj_pdf->setPrintHeader(false);
      $obj_pdf->setPrintFooter(false);
      $obj_pdf->SetAutoPageBreak(TRUE, 10);
      $obj_pdf->SetFont('helvetica', '', 12);
      $obj_pdf->AddPage();
      $content = '';
      $content .= '
      <h3 align="center">Export HTML Table data to PDF using TCPDF in PHP</h3><br /><br />  
      <table border="1" cellspacing="0" cellpadding="5">  
           <tr>  
           <th width="5%">ID</th>  
           <th width="25%" style="background-color:green" >Name</th>  
           <th width="5%">Gender</th>  
           <th width="30%">Designation</th>  
           <th width="10%">Age</th>  
           <th width="25%">Img</th>  
           </tr>   
      ';  
      $content .= fetch_data();  
      $content .= '</table>';
     $content .= '<img style="width: 500rem" src="upload-product/CPU INTEL CORE I7-12700K LGA 1700.png"> ';
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('sample.pdf');  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Export HTML Table data to PDF using TCPDF in PHP</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />            
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:700px;">  
                <h3 align="center">Export HTML Table data to PDF using TCPDF in PHP</h3><br />  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="5%">ID</th>  
                               <th width="25%">Name</th>  
                               <th width="5%">Gender</th>  
                               <th width="30%">Designation</th>  
                               <th width="10%">Age</th>  
                               <th width="25%">Img</th>  
                          </tr>  
                     <?php  
                     echo fetch_data();  
                     ?>  
                     </table>
                     <img src="upload-product/CPU INTEL CORE I7-12700K LGA 1700.png">  
                     <br />  
                     <a type="submit" name="create_pdf" >Download</a>
                     <form method="post">  
                          <input type="submit" name="create_pdf" class="btn btn-danger" value="Create PDF" />  
                     </form>  
                </div>  
           </div>  
      </body>  
 </html>  