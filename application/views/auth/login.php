<div id="infoMessage"><?php echo $message;?></div>
<br/><br/><br/>
<div class="row">
  <div class="col-md-6 offset-md-3">
    <div class="card">
        <div class="card-block">
          <div class="form-header bg-darkgrey-color darken-4">
              <h3><i class="fa fa-lock"></i> Login:</h3>
          </div>

          <?php echo form_open("auth/login");?>

            <div class="md-form">
              <?php echo lang('login_identity_label', 'identity');?>
              <?php echo form_input($identity);?>
            </div>

            <div class="md-form">
              <?php echo lang('login_password_label', 'password');?>
              <?php echo form_input($password);?>
            </div>

            <div class="text-center">
              <?php echo form_submit('submit', lang('login_submit_btn'),"class='btn bg-green-hover'");?>
            </div>

          <?php echo form_close();?>
          <div class="modal-footer">
              <div class="options">
                  <p>Pas encore inscrit ? <a href="#">Inscrivez-vous</a></p>
                  <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>
