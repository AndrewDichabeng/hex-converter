<?php include "functions.php"; ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

<h1 class="text-center">HEX32 to INT32 Conversion</h1>
<div class="jumbotron">
    <div class="container">
        <h3>Table</h3>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th class="col-xs-1 text-center">Run #</th>
                <th class="col-xs-1 text-center">Device Data (Raw) (HEX24)</th>
                <th class="col-xs-1 text-center">x (HEX32)</th>
                <th class="col-xs-1 text-center">y (HEX32)</th>
                <th class="col-xs-1 text-center">z (HEX32)</th>
                <th class="col-xs-1 text-center">x (INT32)</th>
                <th class="col-xs-1 text-center">y (INT32)</th>
                <th class="col-xs-1 text-center">z (INT32)</th>
            </tr>
            </thead>
            <tbody>
            <?php
            for ($index = 0; $index < sizeof($deviceData); $index++) {
                $rawDeviceData = $deviceData[$index];
                addRow($rawDeviceData, $index);
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
</body>
</html>
