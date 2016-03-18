<h2>Edit Report</h2> <!--Create report form-->

<?php $attributes = array('id'=>'create_form', 'class'=>'form_horizontal'); ?>

<?php echo validation_errors("<p class='bg-danger'>" . "<span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>"); ?>

<?php echo form_open('reports/edit/'. $report_data->id. '', $attributes); ?> <!--Open form and pull id-->

<div class = "form-group">

    <?php echo form_label('Report Name'); ?> <!--Form Label-->


    <?php //set array for first name info

    $data = array(
        'class'=> 'form-control',
        'name'=> 'report_name',
        'value'=> $report_data->report_name //get information for name
    );

    ?>

    <?php echo form_input($data); ?>

</div>

<div class = "form-group">

    <?php echo form_label('Report Description'); ?><!--Form Label-->


    <?php //set array for last name info

    $data = array(
        'class'=> 'form-control',
        'name'=> 'report_body',
        'value' => $report_data->report_body //get information for body

    );

    ?>

    <?php echo form_textarea($data); ?>

</div>

<div class = "form-group">

    <?php

    $data = array( //set array for register button
        'class'=> 'btn btn-primary',
        'name'=> 'submit',
        'value'=> 'Update'
    );

    ?>

    <?php echo form_submit($data); ?>

</div>


<?php echo form_close(); ?> <!--Close out form-->