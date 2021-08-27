<?php include_once 'layout/top.inc.php'; ?>
<?php include_once 'layout/nav.inc.php'; ?>
    <form>
        <fieldset>
          <legend>Register</legend>
          <div class="form-group row">
            <label for="username" class="col-sm-2 col-form-label">user name</label>
            <div class="col-sm-10">
              <input  name="username"  type="text"  class="form-control-plaintext" id="username" placeholder="user name">
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1" class="form-label mt-4">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1" class="form-label mt-4">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="exampleTextarea" class="form-label mt-4">Example textarea</label>
            <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
          </div>
          <div class="form-group">
            <label for="formFile" class="form-label mt-4">Default file input example</label>
            <input class="form-control" type="file" id="formFile">
          </div>
          <fieldset class="form-group">
            <legend class="mt-4">Radio buttons</legend>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                Option one is this and that—be sure to include why it's great
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">
                Option two can be something else and selecting it will deselect option one
              </label>
            </div>
            <div class="form-check disabled">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios3" value="option3" disabled="">
                Option three is disabled
              </label>
            </div>
          </fieldset>
          <fieldset class="form-group">
            <legend class="mt-4">Checkboxes</legend>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                Default checkbox
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked="">
              <label class="form-check-label" for="flexCheckChecked">
                Checked checkbox
              </label>
            </div>
      <?php include_once 'layout/bottom.inc.php'; ?>
</body>
</html>