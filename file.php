
	<?php
header('Content-Type: text/plain; charset=utf-8;'); 
$url = file_get_contents("https://api.coingecko.com/api/v3/coins/the-sandbox");

//$object_encoded = json_encode( $url );
//$object_decoded = json_decode( $object_encoded, true );

//echo $object_decoded['id'];
$hello = json_decode($url);
//echo $print[id];


///Logo

$logo_image= $hello->image->small;

$logos = "<img src='".$logo_image."'/>\n";

echo $logos;

echo "\n";

///Get token ID

echo "Token ID: ".$hello->id. "\n";

$platform = $hello->platforms;

//print_r(array_keys($hello->platforms));



//Print list of Contracts

//foreach($platform as $item){
//    echo $item . "\n";
//} 
foreach($platform as $key => $value)
{
	$contract_address = "".$key." Contract Address --> ".$value."\n";
   echo $contract_address;
}


//Value of SAND Right now

//echo json_encode($hello->links->homepage);

$homepage[] = json_encode($hello->links->homepage);


foreach ($homepage as $key => $item) {
	
$arr = ['\\',',',']','[','"'];
$arr2 = ['','
','','',''];
 $website = str_replace($arr, $arr2, $item);
  echo " website --> ".$website."\n";
  //$array[] = $item;
}


$blockchain_site[] = json_encode($hello->links->blockchain_site);
foreach ($blockchain_site as $key => $item) {
$arr = ['\\',',',']','[','"'];
$arr2 = ['','
','','',''];
 $explorer = str_replace($arr, $arr2, $item);
  
  echo " Explorer --> ".$explorer."\n";
  
}
  

$chat_url[] = json_encode($hello->links->chat_url);
foreach ($chat_url as $key => $item) {
$arr = ['\\',',',']','[','"'];
$arr2 = ['','
','','',''];
 $chat = str_replace($arr, $arr2, $item);
  
  echo " Chat --> ".$chat."\n";
  
}

$announcement_url[] = json_encode($hello->links->announcement_url);
foreach ($announcement_url as $key => $item) {
$arr = ['\\',',',']','[','"'];
$arr2 = ['','
','','',''];
 $announcement = str_replace($arr, $arr2, $item);
  
  echo " announcement --> ".$announcement."\n";
  
}

$twitter_username = json_encode($hello->links->twitter_screen_name);

$twitter_name =str_replace('"','',$twitter_username);

$twitter = "https://twitter.com/".$twitter_name."\n";

echo  $twitter;

echo "\n";

$telegram_channel_identifier = json_encode($hello->links->telegram_channel_identifier);

$telegram_channel =str_replace('"','',$telegram_channel_identifier);

$twitter = "https://t.me/".$telegram_channel."\n";

echo  $twitter;


$market_cap_rank = json_encode($hello->market_cap_rank);

echo  " Marketcap rank --> ".$market_cap_rank ."\n";

$market_data = json_encode($hello->market_data->current_price->usd);

echo  "  Current_Price --> ".$market_data  ."\n";

$ath =  json_encode($hello->market_data->ath->usd);
$ath_date =  json_encode($hello->market_data->ath_date->usd);
echo  "  All Time High --> ".$ath  ." Touched on " .$ath_date;
echo "\n";
$atl =  json_encode($hello->market_data->atl->usd);
$atl_date =  json_encode($hello->market_data->atl_date->usd);
echo  "  All Time Low --> ".$atl  ." Touched on " .$atl_date;
echo "\n";
$marketcap =  json_encode($hello->market_data->market_cap->usd);
$number = $marketcap;

if ($number < 1000000) {
    // Anything less than a million
    $format = number_format($number);
} else if ($number < 1000000000) {
    // Anything less than a billion
    $format = number_format($number / 1000000, 2) . ' Million Dollars Invested by people totally';
} else {
    // At least a billion
    $format = number_format($number / 1000000000, 2) . ' Billion Dollars Invested by people totally';
}

echo  "  Marketcap --> $".$marketcap ."(".$format.")" ."\n";





?> 