
<?php
$news = simplexml_load_file('http://news.google.com/news?pz=1&cf=all&ned=us&hl=en&topic=n&output=rss');

$feeds = array();

$i = 0;

foreach ($news->channel->item as $item) 
{
    preg_match('@src="([^"]+)"@', $item->description, $match);
    $parts = explode('<font size="-1">', $item->description);

    $feeds[$i]['title'] = (string) $item->title;
    $feeds[$i]['link'] = (string) $item->link;
    $feeds[$i]['image'] = $match[1];
    $feeds[$i]['site_title'] = strip_tags($parts[1]);
    $feeds[$i]['story'] = strip_tags($parts[2]);

    $i++;
}

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
            <li role="presentation" class="active"><a href="#">Home</a></li>
            <li role="presentation"><a href="#">About</a></li>
            <li role="presentation"><a href="#">Contact</a></li>
          </ul>
        </nav>
        <h3 class="text-muted" style="color:white;">Stocks and Option Picks</h3>
      </div>



<?php
echo '<pre>';
//print_r($feeds);
echo $item;
echo '</pre>';

?>

</body>
</html>