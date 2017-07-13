<div id="infoMessage"><?php echo $message;?></div>

<br/><br/><br/>
<div class="row">
  <div class="col-md-6 offset-md-3">
    <div class="card">
        <div class="card-block">
          <div class="form-header bg-darkgrey-color darken-4">
              <h3><i class="fa fa-lock"></i> Création d'un utilisateur</h3>
          </div>
          <?php echo form_open("auth/create_user");?>

                <div class="md-form">
                      <?php echo lang('create_user_fname_label', 'first_name');?> <br />
                      <?php echo form_input($first_name);?>
                </div>

                <div class="md-form">
                      <?php echo lang('create_user_lname_label', 'last_name');?> <br />
                      <?php echo form_input($last_name);?>
                </div>
                
                <?php
                if($identity_column!=='email') {
                    echo '<p>';
                    echo lang('create_user_identity_label', 'identity');
                    echo '<br />';
                    echo form_error('identity');
                    echo form_input($identity);
                    echo '</p>';
                }
                ?>

                <div class="md-form">
                      <?php echo lang('create_user_email_label', 'email');?> <br />
                      <?php echo form_input($email);?>
                </div>

                <div class="md-form">
                      <?php echo lang('create_user_password_label', 'password');?> <br />
                      <?php echo form_input($password);?>
                </div>

                <div class="md-form">
                      <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
                      <?php echo form_input($password_confirm);?>
                </div>


                <div class="text-center">
                  <?php echo form_submit('submit', lang('create_user_submit_btn'),"class='btn bg-green-hover'");?>
                </div>

          <?php echo form_close();?>

        </div>
    </div>
  </div>
</div>
