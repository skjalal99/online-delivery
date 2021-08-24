<?php include('includes/header.php');?>

<?php include('includes/nav-menu.php');?>


 <!-- breadcrumb ends -->
 <div class='container'>
                    <div aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Admin</li>
                        <li class="breadcrumb-item active" aria-current="page">Add Admin</li>
                    </ol>
            </div>
    <!-- breadcrumb ends -->



<div class="container">
            <h3 class="text-center">
                Add Admin
                <small class="text-muted">- Add Admin users to access Dashboard</small>
            </h3></br>
<form method="post">
  <div class="form-group row">
    <label for="inputfull_name" class="col-sm-2 offset-sm-2 col-form-label">Full Name</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="inputf_name" placeholder="Full Name">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputuser_name" class="col-sm-2 offset-sm-2 col-form-label">User Name</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="inputuser_name" placeholder="User Name">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 offset-sm-2 col-form-label">Password</label>
    <div class="col-sm-4">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
    </div>
  </div>
    
  <div class="form-group row ">
    <div class="col-sm-10 text-center">
      <input type="submit" class="btn btn-primary " name="input_submit" value="Submit">
    </div>
  </div>
</form>

</div>
</div>






<?php include('includes/footer.php');?>


<?php 

if(isset($_POST['input_submit'])){

    echo "button clicked";
}

?>