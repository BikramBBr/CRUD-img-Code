 <!DOCTYPE html>
 <html>
 <head>
   <title></title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 </head>
 <body>
  <a href="<?php echo base_url("welcome/view")?>">View</a>
  <div class="container mt-5 p-5">
    
  
  <form method="post" enctype="multipart/form-data">
    <div class="container form-header">
      <div class="form-container">
        <h1 class="text-center">Fill all information</h1>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-row">
            <input type="text"  placeholder="First name" name="f_name" class="form-control">
            <input type="text" placeholder="Last name" name="l_name" class="form-control mt-3">
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-row">
            <input type="text" placeholder="Email Address" name="email" class="form-control mt-3">
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-row">
            <select class="form-control mt-3" name="courses">
              <option value="no"> Select Learning Program</option>
              <option value="1st"> 1st</option>
              <option value="2st"> 2nd </option>
              <option value="3st"> 3rd </option>
            </select>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-row">
            <input type="file" name="image" class="form-control mt-3">
          </div>
          
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-row">
            <textarea placeholder="Detail information" name="information" class="form-control mt-3" ></textarea>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <input type="submit" class="button" >
          </div>
        </div>
      </div>
    </div>
    </form>
 </div>
 <a href="<?php echo base_url("welcome/logout")?>">Log out</a>




 
   </body>
 </html>