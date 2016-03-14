 <h2>Register</h2>

    <?php $attributes = array('id'=>'register_form', 'class'=>'form_horizontal'); ?>

    <?php echo validation_errors("<p class='bg-danger'>" . "<span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>"); ?>

    <?php echo form_open('users/register', $attributes); ?> <!--Open form-->

    <div class = "form-group">

        <?php echo form_label('First Name'); ?> <!--Form Label-->


        <?php //set array for first name info

        $data = array(
            'class'=> 'form-control',
            'name'=> 'first_name',
            'placeholder'=> 'Enter First Name'
        );

        ?>

        <?php echo form_input($data); ?>

    </div>

    <div class = "form-group">

        <?php echo form_label('Last Name'); ?><!--Form Label-->


        <?php //set array for last name info

        $data = array(
            'class'=> 'form-control',
            'name'=> 'last_name',
            'placeholder'=> 'Enter Last Name'
        );

        ?>

        <?php echo form_input($data); ?>

    </div>

    <div class = "form-group">

        <?php echo form_label('Email'); ?> <!--Form Label-->


        <?php //set array for email info

        $data = array(
            'class'=> 'form-control',
            'name'=> 'email',
            'placeholder'=> 'Enter Email'
        );

        ?>

        <?php echo form_input($data); ?>

    </div>

    <div class = "form-group">

        <?php echo form_label('Phone Number'); ?><!--Form Label-->


        <?php

        $data = array( //set array for phone number info
            'class'=> 'form-control',
            'name'=> 'phone_number',
            'placeholder'=> 'Enter Phone Number'
        );

        ?>

        <?php echo form_input($data); ?>

    </div>


    <div class = "form-group">

        <?php echo form_label('Username'); ?> <!--Form Label-->


        <?php

        $data = array( //set array for username
            'class'=> 'form-control',
            'name'=> 'username',
            'placeholder'=> 'Enter Username'
        );

        ?>

        <?php echo form_input($data); ?>

    </div>

    <div class = "form-group">

        <?php echo form_label('Password'); ?><!--Form Label-->


        <?php

        $data = array( //set array for password
            'class'=> 'form-control',
            'name'=> 'password',
            'placeholder'=> 'Enter Password'
        );

        ?>

        <?php echo form_password($data); ?>

    </div>

    <div class = "form-group">

        <?php echo form_label('Confirm Password'); ?><!--Form Label-->


        <?php

        $data = array( //set array for confirmation of password
            'class'=> 'form-control',
            'name'=> 'confirm_password',
            'placeholder'=> 'Confirm Password'
        );

        ?>

        <?php echo form_password($data); ?>

    </div>


    <div class = "form-group">

        <?php

        $data = array( //set array for register button
            'class'=> 'btn btn-primary',
            'name'=> 'submit',
            'value'=> 'Register'
        );

        ?>

        <?php echo form_submit($data); ?>

    </div>


    <?php echo form_close(); ?> <!--Close out form-->