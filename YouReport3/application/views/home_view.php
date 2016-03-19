<p class = "bg-success"> <!--Success messages-->

    <?php if($this->session->flashdata('login_success')): ?>

    <?php echo $this->session->flashdata('login_success'); ?>

    <?php endif; ?>


    <?php if($this->session->flashdata('user_registered')): ?>

        <?php echo $this->session->flashdata('user_registered'); ?>

    <?php endif; ?>


</p>

<p class = "bg-danger"> <!--Fail messages-->

    <?php if($this->session->flashdata('no_access')): ?>

        <?php echo $this->session->flashdata('no_access'); ?>

    <?php endif; ?>


    <?php if($this->session->flashdata('login_failed')): ?>

        <?php echo $this->session->flashdata('login_failed'); ?>

    <?php endif; ?>

</p>

<h1>Welcome to YouReport</h1>
<p class=".col-sm-4">
    Capture ethics and compliance concerns across your organization in a centralized database. The YouReport software creates an easy-to-use workflow that will allow you to create a report, edit the report, or delete it (should you need to do so). YouReport will help you document all of the information you need to ensure your concerns are addressed quickly and effectively.
</p>

<p>Before you report, make sure you have taken the steps to address your issues with the appropriate members of management and that you have followed your chain of command as laid out by your organization's employee handbook.</p>

<p>When creating your report, make sure to include all relevant details. This is including, but not limited to:</p>

    <ul>
        <li><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>Names</li>
        <li><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>Dates</li>
        <li><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>Witnesses</li>
        <li><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>Locations</li>
        <li><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>Who your concern has been reported to already</li>
    </ul>
