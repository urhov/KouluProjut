<?php session_start(); ?>
<?php include_once 'layout/top.inc.php'; ?>
<?php include_once 'layout/nav.inc.php'; ?>

<div class="container">

    <h1>kuka on nopein?</h1>

    <ul class="list-group">
        <li class="list-group-item">Auto <button class="btn btn-lg btn-info">Vote</button></li>
        <li class="list-group-item">Lentokone <button class="btn btn-lg btn-info">Vote</button></li>
        <li class="list-group-item">Usain Bolt <button class="btn btn-lg btn-info">Vote</button></li>
      
    </ul>
</div>
<script src="js/vote.js"></script>
<script src="js/common.js"></script>

<?php include_once 'layout/bottom.inc.php';?>