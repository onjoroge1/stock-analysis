 <?php
$title = "stock picks buy sell signals";
$discription = "option trading, stock picks , options picks";



function getQuote($symbol) 
{
 
 $symbol  = urlencode( trim( substr(strip_tags($symbol),0,7) ) ); 
 $yahooCSV = "http://finance.yahoo.com/d/quotes.csv?s=$symbol&f=sl1d1t1c1ohgvpnbaejkr&o=t";
 
 $csv = fopen($yahooCSV,"r");

 if($csv) 
 {
  list($quote['symbol'], $quote['last'], $quote['date'], $quote['timestamp'], $quote['change'], $quote['open'],
    $quote['high'], $quote['low'], $quote['volume'], $quote['previousClose'], $quote['name'], $quote['bid'],
    $quote['ask'], $quote['eps'], $quote['YearLow'], $quote['YearHigh'], $quote['PE']) = fgetcsv($csv, ','); 
  
  fclose($csv);
  
  return $quote; 
 } 
 else 
 {
  return false;
 }
}

//$stocks = array("aapl","aa","fb","ge","s");
//foreach ($stocks as $stock) {
//    getQuote($stock);
//}
//$RBSQuote = getQuote($stock);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $title; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="<?php echo $discription;?>">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>

  <style>
  body{
    background-color: #47639e;
    color:white;
  }
  .buy{
    background-color: green;
  }
  .sell{
    background-color: red;
  }
  .btn{
    height: 100px;
    font-size: 35px;
  }
  .btn-group{
    padding-bottom: 20px;
  }
  .nav{
    padding-bottom: 40px;
  }
  </style>
</head>
<body>

    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="subscribe.php">Get Quotes Before Anyone</a></li>
            <li role="presentation"><a href="#">About</a></li>
            <li role="presentation"><a href="#">Contact</a></li>
          </ul>
        </nav>
        <h3 class="text-muted" style="color:white;">My Stocks and Option list</h3>
      </div>



<div class="btn-group btn-group-justified" role="group" aria-label="...">
  <div class="btn-group" role="group">
    <a href="index.php"><button type="button" class="btn btn-default">Bullish Stocks</button></a>
  </div>
  <div class="btn-group" role="group">
     <a href="bearish.php"><button type="button" class="btn btn-default">Bearish Stocks</button></a>
  </div>
  <div class="btn-group" role="group">
     <a href="options.php"><button type="button" class="btn btn-default">Options</button></a>
  </div>
</div>

  <table class="table table">
    <thead>
      <tr>
        <th>Date</th>
        <th>Stocks</th>
        <th>Buy/Sell price</th>
        <th>Current Price</th>
        <th>% Return</th>
        <!--th>Buy or Sell</th-->
        <th>Position</th>
      </tr>
    </thead>

    <tbody>