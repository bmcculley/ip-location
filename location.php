<?php
/**
 * Find the location of an ip address
 */

include("geoipcity.inc");
include("geoipregionvars.php");
$gi = geoip_open("../GeoLiteCity.dat",GEOIP_STANDARD);

$ip = $_GET['ip'];

// An array of ip's
$ipArray = array();
array_push($ipArray, $ip);

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>IP Address Location Lookup</title>
        <meta name="description" content="Find the location of an ip address. What's my ip address?">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <header>
            <h1 class="site-title">Location of <?php echo $ip; ?></h1>
        </header><!-- header -->
        <article class="content">
        	<table class="table centered">
				<thead>
					<tr>
						<th scope="col">Country</th>
						<th scope="col">Region</th>
						<th scope="col">City</th>
						<th scope="col">Postal Code</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($ipArray as &$ip) {
							print '<tr>';
							$record = geoip_record_by_addr($gi,$ip);
							print "<td>" . $record->country_name . "</td>";
							print "<td>" . $GEOIP_REGION_NAME[$record->country_code][$record->region] . "</td>";
							print "<td>" . $record->city . "</td>";
							print "<td>" . $record->postal_code . "</td>";
							print '</tr>';
						}
						geoip_close($gi);
					?>
				</tbody>
			</table>
		</article><!-- content -->
        <footer>
            <span class="copy-link"><p>&copy; <a href="http://bmcculley.github.io" title="B McCulley">B McCulley</a> 2014</p></span>
        </footer><!-- footer -->

    </body>
</html>