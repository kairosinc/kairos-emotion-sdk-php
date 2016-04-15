<?php
    $configs = include('config.php');
?>
<html>
<html lang="en">

<head>
    <title>Kairos Emotion File Upload</title>   

    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">

</head>

<body>
    <div class="container">
        <div class="row">
            <h3 style="text-align: center;">Kairos Emotion File Upload</h3>
            <div class="ui-container center-block">  
                <p>Upload a video from your local system:</p>
                <form action="form-post.php" method="post" enctype="multipart/form-data" id="mediaUploadForm"> 
                    <input type="file" id="upload" name="upload" class="btn btn-info" style="float: left;"/>
                    <input type="submit" value="Submit" class="btn btn-primary" style="float: right;"/> 
                </form>
            </div>
            <div id="processing-spinner"></div>
            <div id="highcharts-containers">
                <button id="retry" class="center-block btn btn-primary">TRY AGAIN</button>
                <p>EMOTION API ANALYSIS:</p>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div id="json-container"></div>
        </div>
    </div>  

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.10.2.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script src="js/jquery.form.min.js"></script>

    <script src="https://code.highcharts.com/highcharts.js"></script>

    <script src="js/highcharts_scripts.js"></script>

    <script>
        var highchartsApp = new HighchartsApp({
            "colors":<?php echo $configs[highchartsColors] ?>, 
            "bkgColor":<?php echo $configs[highchartsBkgColor] ?>
        });
    </script>

	<script src="js/fileupload.js"></script>

</body>

</html>

