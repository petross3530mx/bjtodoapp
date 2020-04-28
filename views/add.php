<?php require 'header.php'; ?>

<main class="py-4">
  <div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
           <div class="<?php echo $data['class']; ?>" role="alert">
            <?php echo $data['message']; ?>
          </div>
            <div class="card-header">Adding Task</div>
            <div class="card-body">
               <form method="POST" action="/add">
                  <div class="form-group row">
                     <label for="login" class="col-md-3 col-form-label text-md-right">Name</label>
                     <div class="col-md-8"><input id="name" type="name" name="name" value=""   autocomplete="nname" autofocus="autofocus" class="form-control "></div>
                  </div>
                  <div class="form-group row">
                     <label for="password" class="col-md-3 col-form-label text-md-right">Email</label>
                     <div class="col-md-8"><input id="email" type="text" name="email"   autocomplete="email" class="form-control "></div>
                  </div>
                  <div class="form-group row">
                     <label for="password" class="col-md-3 col-form-label text-md-right">Text</label>
                     <div class="col-md-8"><textarea  class="form-control " name="text" rows="5" cols="80"></textarea> </div>
                  </div>
                  <div class="form-group row mb-0">
                     <div class="col-md-8 offset-md-3"><button type="submit" name="btn" class="btn btn-primary">
                        Add Task
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
