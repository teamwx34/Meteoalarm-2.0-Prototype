<?php include('w34CombinedData.php');error_reporting(0); 
?>
<style>

  img {
  margin-left:10px;
  margin-right:10px;
   
  width: 60px;
}

.alert-row {
  display: flex;
  flex-direction: row;
  height: 120px;
  padding: 10px 0;
  background-color: lightgreen;
}

.alert-text-container {
  font-family: Arial, Helvetica, sans-serif;
  font-size: 11px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  margin-right:10px;
}
/* unvisited link */
a:link {
  color: silver;
}

/* visited link */
a:visited {
  color: silver;
}

/* mouse over link */
a:hover {
  color: white;
}

/* selected link */
a:active {
  color: white;
}
  div.c {
  text-transform: capitalize;
}
</style>
<body>
<?php
$geocode = "UK117";
//$locationname = "London & South East";
$urlgeocode = "https://meteoalarm.org?geocode=EMMA_ID:$geocode";

function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}


  //echo '<div class="weather34darkbrowser" url="MetOffice Severe Weather Warnings for '.$stationlocation.'"></div><p style="color:orange">';
      $json = 'jsondata/test.txt'; 
$json = file_get_contents($json); 
$parsed_json = json_decode($json, true);

    for ($i = 0; $i <20; $i++)
{$title[$i]=$parsed_json['rss']['channel']['item'][$i]['title'];
 $description[$i]=$parsed_json['rss']['channel']['item'][$i]['description'];
 $pubDate[$i]=$parsed_json['rss']['channel']['item'][$i]['pubDate'];
 $link[$i]=$parsed_json['rss']['channel']['item'][$i]['link'];
 
if($link[$i] === $urlgeocode)
//if($title[$i] === $locationname)
{
       
       if ((strpos($description[$i], "awt:1 level:2") !== false)){$warnimage[$i] = "css/wrnImages/Wind_Yellow.svg"; $alertlevel[$i]="yellow";$alerttype[$i]='Wind';$blocka[$i] = get_string_between($description[$i], 'English: ', 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ');
$blockb[$i] = get_string_between($description[$i], 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ', 'Tomorrow');
$text[$i] = $blocka[$i].'. '.$blockb[$i];$timespan[$i] = get_string_between($description[$i], 'From:', 'English');}
       else if ((strpos($description[$i], "awt:1 level:3") !== false)){$warnimage[$i] = "css/wrnImages/Wind_Orange.svg"; $alertlevel[$i]="orange";$alerttype[$i]='Wind';$blocka[$i] = get_string_between($description[$i], 'English: ', 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ');
$blockb[$i] = get_string_between($description[$i], 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ', 'Tomorrow');
$text[$i] = $blocka[$i].'. '.$blockb[$i];$timespan[$i] = get_string_between($description[$i], 'From:', 'English');}
       else if ((strpos($description[$i], "awt:1 level:4") !== false)){$warnimage[$i] = "css/wrnImages/Wind_Red.svg"; $alertlevel[$i]="red";$alerttype[$i]='Wind';$blocka[$i] = get_string_between($description[$i], 'English: ', 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ');
$blockb[$i] = get_string_between($description[$i], 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ', 'Tomorrow');
$text[$i] = $blocka[$i].'. '.$blockb[$i];$timespan[$i] = get_string_between($description[$i], 'From:', 'English');}
       else if ((strpos($description[$i], "awt:2 level:2") !== false)){$warnimage[$i] = "css/wrnImages/Snow_Yellow.svg"; $alertlevel[$i]="yellow";$alerttype[$i]='Snow or Ice';$blocka[$i] = get_string_between($description[$i], 'English: ', 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ');
$blockb[$i] = get_string_between($description[$i], 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ', 'Tomorrow');
$text[$i] = $blocka[$i].'. '.$blockb[$i];$timespan[$i] = get_string_between($description[$i], 'From:', 'English');}
       else if ((strpos($description[$i], "awt:2 level:3") !== false)){$warnimage[$i] = "css/wrnImages/Snow_Orange.svg"; $alertlevel[$i]="orange";$alerttype[$i]='Snow or Ice';$blocka[$i] = get_string_between($description[$i], 'English: ', 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ');
$blockb[$i] = get_string_between($description[$i], 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ', 'Tomorrow');
$text[$i] = $blocka[$i].'. '.$blockb[$i];$timespan[$i] = get_string_between($description[$i], 'From:', 'English');}
       else if ((strpos($description[$i], "awt:2 level:4") !== false)){$warnimage[$i] = "css/wrnImages/Snow_Red.svg"; $alertlevel[$i]="red";$alerttype[$i]='Snow or Ice';$blocka[$i] = get_string_between($description[$i], 'English: ', 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ');
$blockb[$i] = get_string_between($description[$i], 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ', 'Tomorrow');
$text[$i] = $blocka[$i].'. '.$blockb[$i];$timespan[$i] = get_string_between($description[$i], 'From:', 'English');}
       else if ((strpos($description[$i], "awt:3 level:2") !== false)){$warnimage[$i] = "css/wrnImages/Thunderstorms_Yellow.svg"; $alertlevel[$i]="yellow";$alerttype[$i]='Thunderstorms';$blocka[$i] = get_string_between($description[$i], 'English: ', 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ');
$blockb[$i] = get_string_between($description[$i], 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ', 'Tomorrow');
$text[$i] = $blocka[$i].'. '.$blockb[$i];$timespan[$i] = get_string_between($description[$i], 'From:', 'English');}
       else if ((strpos($description[$i], "awt:3 level:3") !== false)){$warnimage[$i] = "css/wrnImages/Thunderstorms_Orange.svg"; $alertlevel[$i]="orange";$alerttype[$i]='Thunderstorms';$blocka[$i] = get_string_between($description[$i], 'English: ', 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ');
$blockb[$i] = get_string_between($description[$i], 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ', 'Tomorrow');
$text[$i] = $blocka[$i].'. '.$blockb[$i];$timespan[$i] = get_string_between($description[$i], 'From:', 'English');}
       else if ((strpos($description[$i], "awt:3 level:4") !== false)){$warnimage[$i] = "css/wrnImages/Thunderstorms_Red.svg"; $alertlevel[$i]="red";$alerttype[$i]='Thunderstorms';$blocka[$i] = get_string_between($description[$i], 'English: ', 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ');
$blockb[$i] = get_string_between($description[$i], 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ', 'Tomorrow');
$text[$i] = $blocka[$i].'. '.$blockb[$i];$timespan[$i] = get_string_between($description[$i], 'From:', 'English');}
       else if ((strpos($description[$i], "awt:4 level:2") !== false)){$warnimage[$i] = "css/wrnImages/Fog_Yellow.svg"; $alertlevel[$i]="yellow";$alerttype[$i]='Fog';$blocka[$i] = get_string_between($description[$i], 'English: ', 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ');
$blockb[$i] = get_string_between($description[$i], 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ', 'Tomorrow');
$text[$i] = $blocka[$i].'. '.$blockb[$i];$timespan[$i] = get_string_between($description[$i], 'From:', 'English');}
       else if ((strpos($description[$i], "awt:4 level:3") !== false)){$warnimage[$i] = "css/wrnImages/Fog_Orange.svg"; $alertlevel[$i]="orange";$alerttype[$i]='Fog';$blocka[$i] = get_string_between($description[$i], 'English: ', 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ');
$blockb[$i] = get_string_between($description[$i], 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ', 'Tomorrow');
$text[$i] = $blocka[$i].'. '.$blockb[$i];$timespan[$i] = get_string_between($description[$i], 'From:', 'English');}
       else if ((strpos($description[$i], "awt:4 level:4") !== false)){$warnimage[$i] = "css/wrnImages/Fog_Red.svg"; $alertlevel[$i]="red";$alerttype[$i]='Fog';$blocka[$i] = get_string_between($description[$i], 'English: ', 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ');
$blockb[$i] = get_string_between($description[$i], 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ', 'Tomorrow');
$text[$i] = $blocka[$i].'. '.$blockb[$i];$timespan[$i] = get_string_between($description[$i], 'From:', 'English');}
       else if ((strpos($description[$i], "awt:5 level:2") !== false)){$warnimage[$i] = "css/wrnImages/Extreme high temperature_Yellow.svg"; $alertlevel[$i]="yellow";$alerttype[$i]='High Temperature';$blocka[$i] = get_string_between($description[$i], 'English: ', 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ');
$blockb[$i] = get_string_between($description[$i], 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ', 'Tomorrow');
$text[$i] = $blocka[$i].'. '.$blockb[$i];$timespan[$i] = get_string_between($description[$i], 'From:', 'English');}
       else if ((strpos($description[$i], "awt:5 level:3") !== false)){$warnimage[$i] = "css/wrnImages/Extreme high temperature_Orange.svg"; $alertlevel[$i]="orange";$alerttype[$i]='High Temperature';$blocka[$i] = get_string_between($description[$i], 'English: ', 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ');
$blockb[$i] = get_string_between($description[$i], 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ', 'Tomorrow');
$text[$i] = $blocka[$i].'. '.$blockb[$i];$timespan[$i] = get_string_between($description[$i], 'From:', 'English');}
       else if ((strpos($description[$i], "awt:5 level:4") !== false)){$warnimage[$i] = "css/wrnImages/Extreme high temperature_Red.svg"; $alertlevel[$i]="red";$alerttype[$i]='High Temperature';$blocka[$i] = get_string_between($description[$i], 'English: ', 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ');
$blockb[$i] = get_string_between($description[$i], 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ', 'Tomorrow');
$text[$i] = $blocka[$i].'. '.$blockb[$i];}
       else if ((strpos($description[$i], "awt:6 level:2") !== false)){$warnimage[$i] = "css/wrnImages/Extreme low temperature_Yellow.svg"; $alertlevel[$i]="yellow";$alerttype[$i]='Low Temperature';$blocka[$i] = get_string_between($description[$i], 'English: ', 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ');
$blockb[$i] = get_string_between($description[$i], 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ', 'Tomorrow');
$text[$i] = $blocka[$i].'. '.$blockb[$i];$timespan[$i] = get_string_between($description[$i], 'From:', 'English');}
       else if ((strpos($description[$i], "awt:6 level:3") !== false)){$warnimage[$i] = "css/wrnImages/Extreme low temperature_Orange.svg"; $alertlevel[$i]="orange";$alerttype[$i]='Low Temperature';$blocka[$i] = get_string_between($description[$i], 'English: ', 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ');
$blockb[$i] = get_string_between($description[$i], 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ', 'Tomorrow');
$text[$i] = $blocka[$i].'. '.$blockb[$i];$timespan[$i] = get_string_between($description[$i], 'From:', 'English');}
       else if ((strpos($description[$i], "awt:6 level:4") !== false)){$warnimage[$i] = "css/wrnImages/Extreme low temperature_Red.svg"; $alertlevel[$i]="red";$alerttype[$i]='Low Temperature';$blocka[$i] = get_string_between($description[$i], 'English: ', 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ');
$blockb[$i] = get_string_between($description[$i], 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ', 'Tomorrow');
$text[$i] = $blocka[$i].'. '.$blockb[$i];$timespan[$i] = get_string_between($description[$i], 'From:', 'English');}
       else if ((strpos($description[$i], "awt:7 level:2") !== false)){$warnimage[$i] = "css/wrnImages/Coastal_Event_Yellow.svg"; $alertlevel[$i]="yellow";$alerttype[$i]='Coastal Event';$blocka[$i] = get_string_between($description[$i], 'English: ', 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ');
$blockb[$i] = get_string_between($description[$i], 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ', 'Tomorrow');
$text[$i] = $blocka[$i].'. '.$blockb[$i];$timespan[$i] = get_string_between($description[$i], 'From:', 'English');}
       else if ((strpos($description[$i], "awt:7 level:3") !== false)){$warnimage[$i] = "css/wrnImages/Coastal_Event_Orange.svg"; $alertlevel[$i]="orange";$alerttype[$i]='Coastal Event';$blocka[$i] = get_string_between($description[$i], 'English: ', 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ');
$blockb[$i] = get_string_between($description[$i], 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ', 'Tomorrow');
$text[$i] = $blocka[$i].'. '.$blockb[$i];$timespan[$i] = get_string_between($description[$i], 'From:', 'English');}
       else if ((strpos($description[$i], "awt:7 level:4") !== false)){$warnimage[$i] = "css/wrnImages/Coastal_Event_Red.svg"; $alertlevel[$i]="red";$alerttype[$i]='Coastal Event';$blocka[$i] = get_string_between($description[$i], 'English: ', 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ');
$blockb[$i] = get_string_between($description[$i], 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ', 'Tomorrow');
$text[$i] = $blocka[$i].'. '.$blockb[$i];$timespan[$i] = get_string_between($description[$i], 'From:', 'English');}
       else if ((strpos($description[$i], "awt:8 level:2") !== false)){$warnimage[$i] = "css/wrnImages/Forest_Fire_Yellow.svg"; $alertlevel[$i]="yellow";$alerttype[$i]='Forest Fire';$blocka[$i] = get_string_between($description[$i], 'English: ', 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ');
$blockb[$i] = get_string_between($description[$i], 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ', 'Tomorrow');
$text[$i] = $blocka[$i].'. '.$blockb[$i];$timespan[$i] = get_string_between($description[$i], 'From:', 'English');}
       else if ((strpos($description[$i], "awt:8 level:3") !== false)){$warnimage[$i] = "css/wrnImages/Forest_Fire_Orange.svg"; $alertlevel[$i]="orange";$alerttype[$i]='Forest Fire';$blocka[$i] = get_string_between($description[$i], 'English: ', 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ');
$blockb[$i] = get_string_between($description[$i], 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ', 'Tomorrow');
$text[$i] = $blocka[$i].'. '.$blockb[$i];$timespan[$i] = get_string_between($description[$i], 'From:', 'English');}
       else if ((strpos($description[$i], "awt:8 level:4") !== false)){$warnimage[$i] = "css/wrnImages/Forest_Fire_Red.svg"; $alertlevel[$i]="red";$alerttype[$i]='Forest Fire';$blocka[$i] = get_string_between($description[$i], 'English: ', 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ');
$blockb[$i] = get_string_between($description[$i], 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ', 'Tomorrow');
$text[$i] = $blocka[$i].'. '.$blockb[$i];$timespan[$i] = get_string_between($description[$i], 'From:', 'English');}
       else if ((strpos($description[$i], "awt:9 level:2") !== false)){$warnimage[$i] = "css/wrnImages/Avalanche_Yellow.svg"; $alertlevel[$i]="yellow";$alerttype[$i]='Avalanche';$blocka[$i] = get_string_between($description[$i], 'English: ', 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ');
$blockb[$i] = get_string_between($description[$i], 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ', 'Tomorrow');
$text[$i] = $blocka[$i].'. '.$blockb[$i];$timespan[$i] = get_string_between($description[$i], 'From:', 'English');}
       else if ((strpos($description[$i], "awt:9 level:3") !== false)){$warnimage[$i] = "css/wrnImages/Avalanche_Orange.svg"; $alertlevel[$i]="orange";$alerttype[$i]='Avalanche';$blocka[$i] = get_string_between($description[$i], 'English: ', 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ');
$blockb[$i] = get_string_between($description[$i], 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ', 'Tomorrow');
$text[$i] = $blocka[$i].'. '.$blockb[$i];$timespan[$i] = get_string_between($description[$i], 'From:', 'English');}
       else if ((strpos($description[$i], "awt:9 level:4") !== false)){$warnimage[$i] = "css/wrnImages/Avalanche_Red.svg"; $alertlevel[$i]="red";$alerttype[$i]='Avalanche';$blocka[$i] = get_string_between($description[$i], 'English: ', 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ');
$blockb[$i] = get_string_between($description[$i], 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ', 'Tomorrow');
$text[$i] = $blocka[$i].'. '.$blockb[$i];$timespan[$i] = get_string_between($description[$i], 'From:', 'English');}
       else if ((strpos($description[$i], "awt:10 level:2") !== false)){$warnimage[$i] = "css/wrnImages/Rain_Yellow.svg"; $alertlevel[$i]="yellow";$alerttype[$i]='Rain';$blocka[$i] = get_string_between($description[$i], 'English: ', 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ');
$blockb[$i] = get_string_between($description[$i], 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ', 'Tomorrow');
$text[$i] = $blocka[$i].'. '.$blockb[$i];$timespan[$i] = get_string_between($description[$i], 'From:', 'English');}
       else if ((strpos($description[$i], "awt:10 level:3") !== false)){$warnimage[$i] = "css/wrnImages/Rain_Orange.svg"; $alertlevel[$i]="orange";$alerttype[$i]='Rain';$blocka[$i] = get_string_between($description[$i], 'English: ', 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ');
$blockb[$i] = get_string_between($description[$i], 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ', 'Tomorrow');
$text[$i] = $blocka[$i].'. '.$blockb[$i];$timespan[$i] = get_string_between($description[$i], 'From:', 'English');}
       else if ((strpos($description[$i], "awt:10 level:4") !== false)){$warnimage[$i] = "css/wrnImages/Rain_Red.svg"; $alertlevel[$i]="red";$alerttype[$i]='Rain';$blocka[$i] = get_string_between($description[$i], 'English: ', 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ');
$blockb[$i] = get_string_between($description[$i], 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ', 'Tomorrow');
$text[$i] = $blocka[$i].'. '.$blockb[$i];$timespan[$i] = get_string_between($description[$i], 'From:', 'English');}
       else if ((strpos($description[$i], "awt:11 level:2") !== false)){$warnimage[$i] = "css/wrnImages/Flood_Yellow.svg"; $alertlevel[$i]="yellow";$alerttype[$i]='Flood';$blocka[$i] = get_string_between($description[$i], 'English: ', 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ');
$blockb[$i] = get_string_between($description[$i], 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ', 'Tomorrow');
$text[$i] = $blocka[$i].'. '.$blockb[$i];$timespan[$i] = get_string_between($description[$i], 'From:', 'English');}
       else if ((strpos($description[$i], "awt:11 level:3") !== false)){$warnimage[$i] = "css/wrnImages/Flood_Orange.svg"; $alertlevel[$i]="orange";$alerttype[$i]='Flood';$blocka[$i] = get_string_between($description[$i], 'English: ', 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ');
$blockb[$i] = get_string_between($description[$i], 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ', 'Tomorrow');
$text[$i] = $blocka[$i].'. '.$blockb[$i];$timespan[$i] = get_string_between($description[$i], 'From:', 'English');}
       else if ((strpos($description[$i], "awt:11 level:4") !== false)){$warnimage[$i] = "css/wrnImages/Flood_Red.svg"; $alertlevel[$i]="red";$alerttype[$i]='Flood';$blocka[$i] = get_string_between($description[$i], 'English: ', 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ');
$blockb[$i] = get_string_between($description[$i], 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ', 'Tomorrow');
$text[$i] = $blocka[$i].'. '.$blockb[$i];$timespan[$i] = get_string_between($description[$i], 'From:', 'English');}
       else if ((strpos($description[$i], "awt:12 level:2") !== false)){$warnimage[$i] = "css/wrnImages/Flood_Yellow.svg"; $alertlevel[$i]="yellow";$alerttype[$i]='Flood';$blocka[$i] = get_string_between($description[$i], 'English: ', 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ');
$blockb[$i] = get_string_between($description[$i], 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ', 'Tomorrow');
$text[$i] = $blocka[$i].'. '.$blockb[$i];$timespan[$i] = get_string_between($description[$i], 'From:', 'English');}
       else if ((strpos($description[$i], "awt:12 level:3") !== false)){$warnimage[$i] = "css/wrnImages/Flood_Orange.svg"; $alertlevel[$i]="orange";$alerttype[$i]='Flood';$blocka[$i] = get_string_between($description[$i], 'English: ', 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ');
$blockb[$i] = get_string_between($description[$i], 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ', 'Tomorrow');
$text[$i] = $blocka[$i].'. '.$blockb[$i];$timespan[$i] = get_string_between($description[$i], 'From:', 'English');}
       else if ((strpos($description[$i], "awt:12 level:4") !== false)){$warnimage[$i] = "css/wrnImages/Flood_Red.svg"; $alertlevel[$i]="red";$alerttype[$i]='Flood';$blocka[$i] = get_string_between($description[$i], 'English: ', 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ');
$blockb[$i] = get_string_between($description[$i], 'For further details see https://www.metoffice.gov.uk/weather/warnings-and-advice/uk-warnings ', 'Tomorrow');
$text[$i] = $blocka[$i].'. '.$blockb[$i];$timespan[$i] = get_string_between($description[$i], 'From:', 'English');}

       if ($alertlevel[$i]==="red"){$alertcolor[$i]="Red";$warntext[$i]="The weather is very dangerous. Exceptionally intense meteorological phenomena have been forecast. Major damage and accidents are likely, in many cases with threat to life and limb, over a wide area. Keep frequently informed about detailed expected meteorological conditions and risks. Follow orders and any advice given by your authorities under all circumstances, be prepared for extraordinary measures.";}

       else if ($alertlevel[$i]==="orange"){$alertcolor[$i]="Amber";$warntext[$i]="The weather is dangerous. Unusual meteorological phenomena have been forecast. Damage and casualties are likely to happen. Be very vigilant and keep regularly informed about the detailed expected meteorological conditions. Be aware of the risks that might be unavoidable. Follow any advice given by your authorities.";}

       else if ($alertlevel[$i]==="yellow"){$alertcolor[$i]="Yellow";$warntext[$i]="The weather is potentially dangerous. The weather phenomena that have been forecast are not unusual, but be attentive if you intend to practice activities exposed to meteorological risks. Keep informed about the expected meteorological conditions and do not take any avoidable risk.";}

?>
<div class="alert-row" style="background-color:<?php echo $alertlevel[$i]?>">
  <img src="<?php echo $warnimage[$i]?>">
    <div class="alert-text-container">
      <div><b><?php echo $alertcolor[$i]?> Warning for <?php echo $alerttype[$i]?> From:</b><?php echo $timespan[$i] ?></br></br><?php echo $text[$i] ?></div>
        
    
        
    </div>
</div>                           
<?php 
    }}
?>


<div class="provided">
  <div style="position:absolute;bottom:10px;z-index:9999;font-weight:normal;font-size:14px;color:#aaa;text-decoration:none !important;float:right;font-family:arial;">

   &nbsp;&nbsp;METEOALARM EUMETNET Weather Warnings <a href="https://www.meteoalarm.org/en" title="Meteoalarm Weather Warnings" target="_blank">https://www.meteoalarm.org/en</a>  
</div>
</body>
</html>
