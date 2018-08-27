<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
/* Include the `../src/fusioncharts.php` file that contains functions to embed the charts.*/
    include("fusioncharts.php");
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="../FusionCharts/themes/fusioncharts.theme.fusion.css"></link>
	<script type="text/javascript" src="//cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
        <script type="text/javascript" src="//cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
	<title>All Students</title>
	<style type="text/css">
		.container {
			margin-top: 20px;
			margin-bottom: 20px;
		}

    .tab {
      margin-bottom: 20px;
      padding: 10px;
    }

	</style>
</head>
<body>

	  <?php
                $arrChartConfig = array(
                  "chart" => array(
                    "caption" => "Attendance Report 2018]",
                    "subCaption" => "Absent days", 
                    "xAxisName" => "Months",
                    "yAxisName" => "Days You were Absent", 
                    // "numberSuffix" => "", 
                    "theme" => "fusion"
                    )
                );

              // An array of hash objects which stores data
              // $arrChartData = array(
              //   ["Venezuela", "2"],
              //   ["Saudi", "1"],
              //   ["Canada", "3"],
              //   ["Iran", "2"],
              //   ["Russia", "1"],
              //   ["UAE", "2"],
              //   ["US", "4"],
              //   ["China", "30"]
              // );

              $arrLabelValueData = array();

            // Pushing labels and values
            for($i = 0; $i < count($arrChartData); $i++) {
                array_push($arrLabelValueData, array(
                    "label" => $arrChartData[$i][0], "value" => $arrChartData[$i][1]
                ));
            }

      $arrChartConfig["data"] = $arrLabelValueData;

      // JSON Encode the data to retrieve the string containing the JSON representation of the data in the array.
      $jsonEncodedData = json_encode($arrChartConfig);

      // chart object
      $Chart = new FusionCharts("column2d", "MyFirstChart" , "600", "350", "chart-container", "json", $jsonEncodedData);

      // Render the chart
      $Chart->render();

?>
<div class="container">
  
        <h3>Bar Chart Representation of your class absense</h3>
        <div id="chart-container">Chart will render here!</div>
        <br/>
        <br/>
<?php foreach ($total_marks as $key => $value) : ?>
<h4> In <?= $value[0] ?> student <?= $student['name'] ?> with student id <?= $student['id'] ?> scored <?= $value[1] ?> Congrats!!
</h4>
<div class="tab col-md-8">
<table class="table">
  <tbody>
    <tr>
      <td scope="row">Class Test 1</td>
      <td><?= $marks[$key]['class_test1'] ?></td>
    </tr>
    <tr>
      <td scope="row">Class Test 2</td>
      <td><?= $marks[$key]['class_test2'] ?></td>
    </tr>
    <tr>
      <td scope="row">Assignment</td>
      <td><?= $marks[$key]['assignment'] ?></td>
    </tr>
    <tr>
      <th scope="row">Total Marks</th>
      <th><?= $value[1] ?></th>
    </tr>
  </tbody>
</table>
</div>
  <?php endforeach; ?>
  <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
</div>
</body>
</html>