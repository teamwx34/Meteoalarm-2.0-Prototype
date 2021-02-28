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

.alert-row-narrow {
  display: flex;
  flex-direction: row;
  height: 60px;
  padding: 10px 0;
  background-color: white;
  font-size: 12px;
}

.alert-row-info {
  display: flex;
  flex-direction: row;
  height: 120px;
  padding: 10px 0;
  background-color: white;
}

.alert-text-container {
  font-family: Arial, Helvetica, sans-serif;
  font-size: 11px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  margin-right: 10px;
  color: black;
}

.alert-text-container-narrow {
  font-family: Arial, Helvetica, sans-serif;
  font-size: 14px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  margin-right:10px;
}
/* unvisited link */
body {
	background-image: url();
	margin-left: 8px;
	margin-top: 8px;
	margin-right: 8px;
	margin-bottom: 8px;
	background-color: #343D46;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #FFFFFF;
	font-weight: normal;
}
html{
	margin:0;
	padding:0;
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
.LegendText2 {

	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: silver;
	font-weight: normal;
}

 
 
 .Ebene3Header {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
}

table{
	font-size:11px;
	vertical-align:bottom;
    width:auto;
}
</style>
<body>
<?php
//$geocode = "UK127";
$locationname = "London & South East";
//$locationname = "Stadt Dresden";
$urlgeocode = "https://meteoalarm.org?geocode=EMMA_ID:$geocode";

function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}



      $json = 'jsondata/al.txt'; 
$json = file_get_contents($json); 
$parsed_json = json_decode($json, true);
$count = 0;


    for ($i = 0; $i <20; $i++)
{$title[$i]=$parsed_json['rss']['channel']['item'][$i]['title'];
 $description[$i]=$parsed_json['rss']['channel']['item'][$i]['description'];
 $pubDate[$i]=$parsed_json['rss']['channel']['item'][$i]['pubDate'];
 $link[$i]=$parsed_json['rss']['channel']['item'][$i]['link'];
 
//if($link[$i] === $urlgeocode)
if($title[$i] === $locationname)
{$count=$count+1;
       
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
    }}if($count===0){?><div class="alert-row-narrow" style="color:black;font-size:16px;">
  <img src="css/wrnImages/No Warnings_LightGreen.svg">
    <div class="alert-text-container-narrow">
    <div><b>There are currently no Severe Weather Warnings in force at <?php echo $stationName;?> Weather Station</b></div></div></div>
    <div class="alert-row-info" style="background-color:transparent;color:silver;">
    
<table cellspacing="5" cellpadding="0">
	
	
	<tr>
        <td style="padding-left:15px;">
        <b>GLOSSARY</b>
		</td>
    </tr>
	<tr>
		<td style="padding-left:15px; color:yellow">
        <b>Description Severity Level 2 Yellow</b>
		</td>
	</tr>
	<tr>
		<td colspan="2" style="padding-left:15px; color:yellow;">
			The weather is potentially dangerous. The weather phenomena that have been forecast are not unusual, but be attentive if you intend to practice activities exposed to meteorological risks. Keep informed about the expected meteorological conditions and do not take any avoidable risk.<br><br>
		</td>
	</tr>
	<tr>
		<td style="padding-left:15px; color:orange">
        <b>Description Severity Level 3 Amber</b>
		</td>
	</tr>
	<tr>
		<td colspan="2" style="padding-left:15px; color:orange;">
			The weather is dangerous. Unusual meteorological phenomena have been forecast. Damage and casualties are likely to happen. Be very vigilant and keep regularly informed about the detailed expected meteorological conditions. Be aware of the risks that might be unavoidable. Follow any advice given by your authorities.<br><br>
		</td>
	</tr>
	<tr>
		<td style="padding-left:15px; color:red">
        <b>Description Severity Level 4 Red</b>
		</td>
	<tr>
	<tr>
		<td colspan="2" style="padding-left:15px;color:red;">
			The weather is very dangerous. Exceptionally intense meteorological phenomena have been forecast. Major damage and accidents are likely, in many cases with threat to life and limb, over a wide area. Keep frequently informed about detailed expected meteorological conditions and risks. Follow orders and any advice given by your authorities under all circumstances, be prepared for extraordinary measures.
		</td>
	</tr>
	
</table>
    </div>

 <?php  }
?>

<div style="position:absolute; bottom:3px; ">
   &nbsp;&nbsp;METEOALARM EUMETNET Weather Warnings <a href="https://www.meteoalarm.org/en" title="Meteoalarm Weather Warnings" target="_blank">https://www.meteoalarm.org/en</a>  
</div>
</body>
</html>
