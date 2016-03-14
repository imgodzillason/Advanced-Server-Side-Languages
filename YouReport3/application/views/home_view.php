<p class = "bg-success">

    <?php if($this->session->flashdata('login_success')): ?>

    <?php echo $this->session->flashdata('login_success'); ?>

    <?php endif; ?>


    <?php if($this->session->flashdata('user_registered')): ?>

        <?php echo $this->session->flashdata('user_registered'); ?>

    <?php endif; ?>


</p>

<p class = "bg-danger">


    <?php if($this->session->flashdata('login_failed')): ?>

        <?php echo $this->session->flashdata('login_failed'); ?>

    <?php endif; ?>

</p>

<h1>Welcome to YouReport</h1>
<p>If you haven't done so, please register by clicking the link above. Enter in your personal information and get started with filing your report. </p>
<p>Some things to remember when filing:</p>
<ul>
    <li>This</li>
    <li>That</li>
    <li>The Other</li>
</ul>