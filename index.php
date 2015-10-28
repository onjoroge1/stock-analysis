<?php include("inc/header.php");?>

      
       <?php
$stocks = array
   (
    array("twc",189.01,"buy","open","7/19/15"),
    array("payc",35.38,"buy","open","5/29/15"),
    array("PRTA",47.35,"buy","open","6/15/15")
   );


for ($row = 0; $row <  3; $row++) {
   echo "<tr>";
   for ($col = 0; $col <  1; $col++) {
            $stock = $stocks[$row][0];
             getQuote($stock);
             $one = "default";
             $BuySell = $stocks[$row][2];
             $tradePrice = $stocks[$row][1];
             $Position_Closed_or_Open = $stocks[$row][3];
             $date = $stocks[$row][4];
             $RBSQuote = getQuote($stock); 
             $currentPrice = $RBSQuote["last"];
             $quote = $RBSQuote["symbol"];
             if($BuySell == "sell"){
                $percentChange = ($tradePrice - $currentPrice);
                if($percentChange < 0){
                  $one = "sell";
                }
                else{
                  $one = "buy";
                }
              }else{
                $percentChange = ($currentPrice - $tradePrice);
                if($percentChange < 0){
                  $one = "sell";
                }
                else{
                  $one = "buy";
                }
              }
             echo "<tr>";
             echo "<td>".$date."</td>";
             echo "<td>".strtoupper($quote)."</td>";
              echo "<td>".$BuySell." "."@"." ".$tradePrice."</td>";
             echo "<td>".$currentPrice."</td>";
             //echo "<td>".$BuySell." "."@"." ".$tradePrice."</td>";
             echo "<td class='$one'>".$percentChange."%"."</td>";
             //echo "<td class='$BuySell'>".$BuySell."</td>";
             echo "<td>".$Position_Closed_or_Open."</td>";
             echo "<tr>";

  
   }
}
?>  
      </tr>  
      
    </tbody>

  </table>
</div>
   
<div>

</div>

</body>
</html>
