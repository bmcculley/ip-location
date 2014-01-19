<?php
$ip_address = $_SERVER['REMOTE_ADDR'];
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
                <h1 class="site-title">IP Address Location Lookup</h1>
            </header><!-- header -->
            <article class="content">

                <form id="ipForm" action="./location.php" method="post">  
                    <label for="ipaddress">Find the IP location:</label><br/>  
                    <input type="text" name="ip" id="ipaddress" class="ipaddress" placeholder="ex: <?php echo $ip_address; ?>" />
                    <span class="lookup-response"></span>
                    <input type="submit" id="submit" class="btn front btn-primary" value="Get Location" /> 
                    <span id="errorMessage"></span>
                </form>
                <p>Your IP address is: <a href="./location.php?ip=<?php echo $ip_address; ?>"><?php echo $ip_address; ?></a></p>

                <div class="location-data hidden">
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
                            <tr>
                                <td class="country"></td>
                                <td class="region"></td>
                                <td class="city"></td>
                                <td class="postal"></td>
                            </tr>               
                        </tbody>
                    </table>
                </div>
            </article><!-- content -->
            <footer>
                <span class="copy-link"><p>&copy; <a href="http://bmcculley.github.io" title="B McCulley">B McCulley</a> 2014</p></span>
            </footer><!-- footer -->

        <script type="text/javascript">
            function attempt_focus(){
                setTimeout( function(){
                    try{
                        d = document.getElementById('ipaddress');
                        d.focus();
                        d.select();
                    } catch(e){}
                }, 200);
            }

            attempt_focus();
            if(typeof Onload=='function')Onload();
        </script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.0.min.js"><\/script>')</script>
        <script src="js/main.js"></script>

    </body>
</html>