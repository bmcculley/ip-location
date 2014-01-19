<?php
/**
 * Return IP address location data with ajax
 */

include("geoipcity.inc");
include("geoipregionvars.php");
$gi = geoip_open("../GeoLiteCity.dat",GEOIP_STANDARD);

//requested with Javascript
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

	$ip = $_REQUEST['ip'];

	$record = geoip_record_by_addr($gi,$ip);

	$country = $record->country_name;
	if (empty($country) || $country == '')
		$country = 'N/A';
	$return['country'] = $country;

	$region = $GEOIP_REGION_NAME[$record->country_code][$record->region];
	if (empty($region) || $region == '')
		$region = 'N/A';
	$return['region'] = $region;

	$city = $record->city;
	if (empty($city) || $city == 'null')
		$city = 'N/A';
	$return['city'] = $city;

	$postal = $record->postal_code;
	if (empty($postal) || $postal == '')
		$postal = 'N/A';
	$return['postal'] = $postal;

	echo json_encode($return);
}
else {
	header("Location:  ./");
 	die('direct access is forbidden');
}
?>