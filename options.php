<?php include("inc/header.php");?>

      
       <?php
$stocks = array
   (
   array("aapl",22,"buy","open","5/19/15"),
   array("aa",15,"sell","closed","5/12/15"),
   array("fb",5,"sell","open","5/11/15"),
   array("gm",17,"buy","closed","4/11/15"),
   array("gm",17,"buy","closed","4/11/15")
   );


for ($row = 0; $row <  5; $row++) {
   echo "<tr>";
   for ($col = 0; $col <  1; $col++) {
            $stock = $stocks[$row][0];
             getQuote($stock);
             //$one = "white";
             $BuySell = $stocks[$row][2];
             $one = "default";
             $tradePrice = $stocks[$row][1];
             $Position_Closed_or_Open = $stocks[$row][3];
             $date = $stocks[$row][4];
             $RBSQuote = getQuote($stock); 
             $currentPrice = $RBSQuote["last"];
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
             echo "<td>".$RBSQuote["symbol"]."</td>";
             echo "<td>".$currentPrice."</td>";
             echo "<td>".$tradePrice."</td>";
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