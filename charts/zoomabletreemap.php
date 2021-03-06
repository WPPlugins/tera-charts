<?php include_once ("excelMapClass.php");
$file_info = pathinfo($_SERVER['PHP_SELF']);
$charts_dir = str_replace( $file_info['basename'], '', $_SERVER['PHP_SELF'] );

?>

    <script src="<?php echo $charts_dir . "js/d3/d3.v3.min.js" ?>"></script>
    <script type="text/javascript" src="<?php echo $charts_dir . "js/accounting.js" ?>"></script>
    <script src="<?php echo $charts_dir . "js/jquery.1.8.3.min.js" ?>"></script>
    <script src="<?php echo $charts_dir . "js/tt.js" ?>"></script>
    <script src="<?php echo $charts_dir . "js/canvg.js"; ?>"></script>
    <script src="<?php echo $charts_dir . "js/svgenie.js"; ?>"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo $charts_dir . "js/css/tt.css"?>"/>

    <script src="<?php echo $charts_dir . "js/jquery.activity-indicator.js" ?>"></script>
    <script src="<?php echo $charts_dir . "js/bootstrap/js/bootstrap.js"?>"></script>
    <script src="<?php echo $charts_dir . "js/bootstrap/js/bootstrap-transition.js"?>"></script>
    <script src="<?php echo $charts_dir . "js/bootstrap/js/bootstrap-tooltip.js"?>"></script>

    <link rel="stylesheet" href="<?php echo $charts_dir . "js/css/style.css"?>"/>
    <link rel="stylesheet" href="<?php echo $charts_dir . "js/css/style_zoomabletreemap.css"?>"/>
<script type="text/javascript">
    <?php
       
		$filename=explode(".",$_GET['fn']);
        $fname=$filename[0];
	    $fextension=$filename[1];
	  if($fextension=="xlsx" || $fextension=="xls" )
                 {
                   $xlsFilename =$fname.".".$fextension;
                 }
        $userID = (int)$_GET['userid'];
        $headersFilename = str_replace(".xlsx", ".head", $xlsFilename);
        $headersFilename = str_replace(".xls", ".head", $headersFilename);
        $totalFilename = str_replace(".xlsx", ".total", $xlsFilename);
        $totalFilename = str_replace(".xls", ".total", $totalFilename);
        if(isset($_SERVER['PATH_TRANSLATED']))
        {
            $info = pathinfo($_SERVER['PATH_TRANSLATED']);
            $filesdir = substr($info['dirname'], 0, strpos( $info['dirname'], 'plugins'));
            $headers = file_get_contents($filesdir. "\\uploads\\" . "files\\" . "$userID\\" . $headersFilename);
            $total_value = file_get_contents($filesdir. "\\uploads\\" . "files\\" . "$userID\\" . $totalFilename);
        }
        else
        {
            $info = pathinfo($_SERVER['ORIG_PATH_TRANSLATED']);
            $filesdir = substr($info['dirname'], 0, strpos( $info['dirname'], 'plugins'));
            $headers = file_get_contents($filesdir. "/uploads/" . "files/" . "$userID/" . $headersFilename);
            $total_value = file_get_contents($filesdir. "/uploads/" . "files/" . "$userID/" . $totalFilename);
        }
    ?>
    var columns_names = "<?php echo $headers; ?>";
    var total_value = "<?php echo $total_value; ?>";
    var data_filename = "<?php echo $_GET['fn']; ?>";
    var chart_filename = data_filename.replace(".xlsx", ".json");
    chart_filename = chart_filename.replace(".xls", ".json");
    var chart_userid = "<?php echo $_GET['userid']; ?>";
    var camera = "<img id='camera' title='download picture' src='<?php echo $charts_dir . "js/css/camera.png"; ?>' onclick='picture()'/>";
</script>
    <script type="text/javascript" src="<?php echo $charts_dir . "js/zoomabletreemap.js"?>"></script>
<div id = "camera"></div>
<h1><div id="titolo"></div></h1>
<h4 id="subtitolo"></h4>

<div style="float: left; text-align: left;"></div>
<div style="float: right; text-align: right;"></div>
<p id="chart"></p>

<span id="percorso"></span>
<span id="parole"></span>
