<?php require 'header.php'; ?>

<main class="py-4">
  <div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
           <div class="<?php echo $data['class']; ?>" role="alert">
            <?php echo $data['message']; ?>
          </div>
            <div class="card-header">Login</div>
            <div class="card-body">
               <form method="POST" action="/login">
                  <div class="form-group row">
                     <label for="login" class="col-md-4 col-form-label text-md-right">Login</label>
                     <div class="col-md-6"><input id="login" type="login" name="login" value=""   autocomplete="login" autofocus="autofocus" class="form-control "></div>
                  </div>
                  <div class="form-group row">
                     <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                     <div class="col-md-6"><input id="password" type="password" name="password"   autocomplete="current-password" class="form-control "></div>
                  </div>

                  <div class="form-group row mb-0">
                     <div class="col-md-8 offset-md-4"><button type="submit"  name=btn class="btn btn-primary">
                        Login
                        </button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>



</div>
</div>

<?php require 'footer.php'; ?>
