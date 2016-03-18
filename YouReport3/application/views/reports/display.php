<div class="col-xs-9">

<h1>Report Name: <?php echo $report_data->report_name; ?></h1> <!--Pull in report name from database-->
<p>Date Created: <?php echo $report_data->date_created; ?></p> <!--Pull in date created from database-->

<h3>Description</h3>

<p><?php echo $report_data->report_body ?></p><!--Pull in text body created from database-->


</div>

<div class="col-xs-3 pull-right">
<ul class="list-group">

    <h4>Report Actions</h4>

    <li class="list-group-item"><a href="">Create Report</a></li>

    <li class="list-group-item"><a href="<?php echo base_url();?>reports/edit/<?php echo $report_data->id; ?>">Edit Report</a></li>

    <li class="list-group-item"><a href="">Delete Report</a></li>

</ul>
</div>