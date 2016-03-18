<?php
/**
 * Created by IntelliJ IDEA.
 * User: JacobCollins
 * Date: 3/15/16
 * Time: 8:28 PM
 */
?>

<H2>Reports</H2>

<table class="table table-hover">

    <a class="btn btn-primary pull-right" href="<?php echo base_url();?>reports/create">Create Report</a>

    <thead>
    <tr>
        <th>Report Name</th>
        <th>Report Details</th>
    </tr>
    </thead>
    <tbody>

        <?php foreach($reports as $reports): ?> <!--loop through reports in database-->

            <tr>
<!--link to report id-->
                <?php echo "<td><a href='". base_url() . "reports/display/". $reports->id ."'>" . $reports->report_name . "</a></td>"; ?> <!--get report name-->
                <?php echo "<td>" . $reports->report_body . "</td>"; ?> <!--get report body/details-->

            </tr>

        <?php endforeach; ?>

    </tbody>
</table>
