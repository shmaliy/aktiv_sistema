<!-- /tpl/add.tpl -->

<table width="500" cellspacing="0">';
<tr style="padding-bottom: 5px;">
        <td style="border-bottom: 1px solid black;"><strong>Item Name</strong></td>
        <td style="border-bottom: 1px solid black;"><strong>Qty</strong></td>
        <td style="border-bottom: 1px solid black;"><strong>Price/Item</strong></td>
        <td style="border-bottom: 1px solid black;"><strong>Total</strong></td>
        <td style="border-bottom: 1px solid black;">&nbsp;</td>
    </tr>';  
    
<tr style="background-color: '.$color.';"><td>'.$row['P_name'].'</td><td>'.$cart[$i]['qty'];

<a href="javascript: minusQty(0);">-</a>
<a href="javascript: addQty(0);">+</a>
</td>
<td><input type="button" value="Remove" onClick="removeFromCart(0); "></td></tr>
    </table>
        <p>
        <table width="500">
            <tr><td style="padding-left: 200px;"><strong>Tax: </strong>$0.00</td></tr>
            <tr><td style="padding-left: 200px;"><span style="border-top: 1px solid black;"><strong>Total: </strong>$'.$total.'</span>
            </td></tr>
            
        </table>
    </div>