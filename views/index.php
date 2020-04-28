<?php require 'header.php'; ?>

<main class="py-4">
<div class="container">
  <div class="row">
    <div class="container">
      <?php if(isset( $params['class'] ) ){ ?>
        <div class="<?php echo $params['class']; ?>" role="alert">
         <?php echo $params['message']; ?>
       </div>
      <?php }?>
    </div>

  </div>
<div class="row">
  <div class="col-md-12">
  <form class="" action="/" method="get">
    <label for="">Sort by: </label>
    <select class="customsort" name="sortby">
      <option value="email"  <?php if ($_GET['sortby'] == 'email') echo ' selected="selected"'; ?> >email</option>
      <option value="status" <?php if ($_GET['sortby'] == 'status') echo ' selected="selected"'; ?>>status</option>
      <option value="user"  <?php if ($_GET['sortby'] == 'user') echo ' selected="selected"'; ?> >name</option>
    </select>
    <select class="customsort" name="sortorder">
      <option value="ASC" <?php if ($_GET['sortorder'] == 'ASC') echo ' selected="selected"'; ?>>asc</option>
      <option value="DESC" <?php if ($_GET['sortorder'] == 'DESC') echo ' selected="selected"'; ?>>desc</option>
    </select>
    <input class="btn btn-sm btn-primary" type="submit" name="sort" value="sort">
  </form>
</div>
</div>
<div class="row">
<?php for ($i=0; $i< sizeof($data); $i++) { ?>

  <div class="col-md-12">
     <div class="card flex-md-row mb-4 box-shadow h-md-250">
         <div class="card-body d-flex flex-column align-items-start">
           <strong class="d-inline-block mb-2 text-primary"><?php echo $data[$i]['email']; ?></strong>
           <h3 class="mb-0"><a href="/edit/task/<?php echo $data[$i]['id']; ?>" class="text-dark"><?php echo $data[$i]['user']; ?></a></h3>
           <div class="mb-1 text-muted"><?php echo $data[$i]['text']; ?></div>
           <p class="card-text mb-auto">in " <?php echo $data[$i]['status']; ?>"</p>
           <?php if(isset($_SESSION['admin'])){
             if( $data[$i]['edited']){
               echo '<div class="alert alert-info">Edited by admin</div>';
             }
           } ?>
        </div>
     </div>
  </div>
<?php } ?>

    <div class="col-md-12">
      <form class="" action="/" method="get">
        <input type="hidden" name="sortby" value="<?php echo $params['sortby']; ?>"/>
        <input type="hidden" name="sortorder" value="<?php echo $params['order']; ?>"/>
        <?php for($i=0; $i< $params['pages']; $i++){?>
          <input class="btn btn-sm
          <?php if(($i+1)==$params['page']){
            echo ' btn-primary ';
          }?>
           "  type="submit" name="page" value="<?php echo $i+1; ?>">
        <?php }?>
      </form>
    </div>
  </div>
</div>

<?php require 'footer.php'; ?>
