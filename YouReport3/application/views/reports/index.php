<?php
/**
 * Created by IntelliJ IDEA.
 * User: JacobCollins
 * Date: 3/15/16
 * Time: 8:28 PM
 */
?>

<H2>Reports</H2>

<p class="bg-success">

    <?php if($this->session->flashdata('report_created')): ?>

    <?php echo $this->session->flashdata('report_created'); ?>

    <?php endif; ?>

    <?php if($this->session->flashdata('report_updated')): ?>

    <?php echo $this->session->flashdata('report_updated'); ?>

    <?php endif; ?>

    <?php if($this->session->flashdata('report_deleted')): ?>

    <?php echo $this->session->flashdata('report_deleted'); ?>

    <?php endif; ?>

</p>

<table class="table table-hover">

    <a class="btn btn-primary pull-right create" href="<?php echo base_url();?>reports/create">Create Report</a>

    <thead>
    <tr>
        <th>Report Name</th>
        <th>Report Details</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>

        <?php foreach($reports as $reports): ?> <!--loop through reports in database-->

            <tr>
<!--link to report id-->
                <?php echo "<td><a href='". base_url() . "reports/display/". $reports->id ."'>" . $reports->report_name . "</a></td>"; ?> <!--get report name-->
                <?php echo "<td>" . $reports->report_body . "</td>"; ?> <!--get report body/details-->

                <td><a class="btn btn-danger" href="<?php echo base_url();?>reports/delete/<?php echo $reports->id ?>"><span class="glyphicon glyphicon-remove"></span></a></td>

            </tr>

        <?php endforeach; ?>

    </tbody>
</table>
