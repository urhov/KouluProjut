<?php session_start(); ?>
<?php 
if (!isset($_SESSION['logged_in'])){
  header('Location: index.php');
  die();
}
?>

<?php include_once 'layout/top.inc.php'; ?>
<?php include_once 'layout/nav.inc.php'; ?>

<div class="container">

  <div id="msg" class="alert alert-dismissible alert-warning d-none">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <h4 class="alert-heading">Warning!</h4>
    <p class="mb-0"></a>.</p>
  </div>


  <form name="editPoll">
      <fieldset>
        <legend>Edit poll</legend>
        <div class="form-group">
          <input type="hidden" name="id">
          <label for="topic" >Topic</label>
          <input name="topic" type="username" class="form-control" placeholder="topic">
        </div>
        <div class="form-group">
          <label for="start">Start</label>
          <input name="start" type="datetime-local" class="form-control">
        </div>
        <div class="form-group">
          <label for="end">End</label>
          <input name="end" type="datetime-local" class="form-control">
        </div>

      <!-- Additional options go here -->

        <!-- <div class="form-group">
          <label for="formFile" class="form-label mt-4">Default file input example</label>
          <input class="form-control" type="file" id="formFile">
        </div> -->
        
        <h4>Poll options</h4> <button class="btn btn-primary" id="addOption">Add option</button>
        <div class="form-group">
          <label for="option1" class="form-label mt-4">Option 1</label>
          <input name="option1" type="username" class="form-control" placeholder="Option 1">
        </div>

        <div class="form-group">
          <label for="option1" class="form-label mt-4">Option 2</label>
          <input name="option2" type="username" class="form-control" placeholder="Option 2">
        </div>
      </fieldset>
      <button type="submit" class="btn btn-primary">Save poll</button>
      <button id="deleteLastOption" class="btn btn-danger">Delete last option</button>
    </form>

</div>

  <script src="js/editPoll.js"></script>
  <script src="js/common.js"></script>

        <?php include_once 'layout/bottom.inc.php'; ?>