<?
    #Error_Reporting(E_ALL & ~E_NOTICE);
    require_once 'lib/class.Mysql.php';
    include("lib/config.php");

    
    
    
    function sendmail($tomail, $e_mail, $_name, $_phone, $_message, $_referer) {
            @session_start();

            $db = new DB(dbhost, dbase, dbuser, dbpass);

        $subject = "��������� � �����: formbeton.com.ua";
        $message = '
          <html>
          <head>
            <title></title>
          </head>
          <body bgcolor=white style="font-family: tahoma, MS Sans Serif, Sans-serif, Tahoma; font-size:10pt; color:#405868; padding:7px;">
            <p>������������, </p><br>
            <div><b>� ������ ����� ���� ���������� ��������� ��:</b> '.$_name.'</div>
            <div><b>E-Mail �����������:</b> '.$e_mail.'</div>
            <div><b>���������� ������� �����������:</b> '.$_phone.'</div>
            <div><b>����� ���������:</b> ' . $_message . '</div>
            <br><br><hr>
            <div><b>[���������� � ������]</b></div>
        ';
        
            $cart = null;
            $total1 = null;
            $count1 = null;
            $cart = @$_SESSION['cart'];
            $color = '';
            $message .= '<link rel="stylesheet" type="text/css" href="/styles/style_css.css">
            <table width="100%" cellspacing="1" cellpadding="3" bgcolor="#ffffff">';
            $message .= '<tr align="center">
                <td class="basket_table_green" bgcolor="#ececec" width="50"><strong>�</strong></td>
                <td class="basket_table_green" bgcolor="#ececec"><strong>������������ ������</strong></td>
                <td class="basket_table_green" bgcolor="#ececec" width="100"><strong>���� ���.</strong></td>
                <td class="basket_table_green" bgcolor="#ececec" width="100"><strong>����������</strong></td>
                <td class="basket_table_green" bgcolor="#ececec" width="100">����� ���.</td>
            </tr>';  
            $num = 0;
            for($i=0; $i<count($cart); $i++){
                $num++;
                    // get cart item from db
                    
                    $SQL = $db->queryAllRecords("select * from products where P_ID = '".$cart[$i]['id']."'");
                    foreach($SQL AS $row) {
                        $message .= '<tr  bgcolor="#ececec" class="order"><td align="right" style="padding-right:15px">'.$num.'</td>';
                        $message .= '<td>'.$row['P_name'].'</td>';
                        // calculate the price 
                        if($cart[$i]['price'] > 0){
                            $message .= '<td align="right" style="padding-right:20px">'.$cart[$i]['price'].'</td>';
                            $price = $cart[$i]['price'];
                        }
                        else{
                            $message .= '<td align="right" style="padding-right:20px">'.$row['P_price'].'</td>';
                            $price = $row['P_price'];
                        }
                        $message .= '<td align="center">';
                        
                        $message .=  $cart[$i]['qty'];

                        $message .= '</td>';

                    }
                    $price = $cart[$i]['qty'] * $price;
                    $total1 = $total1 + $price;
                    $message .= '<td align="right" style="padding-right:20px">'.$price.'</td>';
                    

                    $message .= '</tr>';
        }
                    // add the remove button 
            $message .= '</table>';
            if($total1)
            $message .= '
                
                <table width="100%">
                    <tr class="basket_table_green"><td align="right">����� � ������:</td><td width="150" align="left"><span>'.$total1.' ���.</span></td></tr>
                </table>
            ';
        
            $message .= '
            <div><b>[���������� � ������������]</b></div>
            <div><b>IP ����� ������������:</b> ' . $_SERVER["REMOTE_ADDR"] . '</div>
            <div><b>������� ������������:</b> ' . $_SERVER["HTTP_USER_AGENT"] . '</div>
            <hr><br><br><hr>
            <div>�������� � ������� ���� ���������� ���������: <a href="'.$_referer.'">' .$_referer . '</a></div>
          </body>
          </html>';

        $headers  = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=windows-1251\r\n";
        $headers .= "From: ".$_name."<".$e_mail.">\r\n";

        @mail($tomail, $subject, $message, $headers);
    }
    
    sendmail('formbeton@pochta.ru ', $_POST['email'], $_POST['name'], $_POST['phone'], $_POST['message'], $_SERVER['HTTP_REFERER']);
    session_destroy();
    header("Location: /sended");
//    print '<meta http-equiv="Refresh" content="0; URL='.$_SERVER['HTTP_REFERER'].'">';
    
?>