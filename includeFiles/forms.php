
<!--Sign in modal form-->
<div class="modal fade" id="signin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Welcome Back... Login Your Account.  or <a href="#"  data-toggle="modal" data-target="#signup" data-whatever="@mdo">SignUp</a>
</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php $_SERVER["PHP_SELF"];?>" method="post">
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Email:</label>
            <input type="email" name="email" required class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="form-control-label">Password:</label>
            <input type="password" name="password" required class="form-control" id="recipient-name">
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="signinBtn" class="btn btn-primary">Login</button>
           </form>
      </div>
    </div>
  </div>
</div>



<!--Sign in modal form-->
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php $_SERVER["PHP_SELF"];?>" method="post">
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Full Name:</label>
            <input type="text" required name="name" class="form-control" id="recipient-name">
          </div>
            
            <div class="form-group">
            <label for="recipient-name" class="form-control-label">Email:</label>
            <input type="email" required name="email" class="form-control" id="recipient-name">
            </div> 
            
            <div class="form-group">
            <label for="recipient-name" class="form-control-label">Phone Number:</label>
            <input type="text" required name="phone" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="form-control-label">Password:</label>
            <input type="password" required name="password" class="form-control" id="recipient-name">
          </div>
            
             <div class="form-group">
            <label for="recipient-name" class="form-control-label">Address:</label>
            <textarea required class="form-control" name="address"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="signupBtn" class="btn btn-primary">Submit</button>
          </form>
      </div>
    </div>
  </div>
</div>



<!-- about us -->
<div class="modal fade" id="aboutUs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Discover our story... About Us</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-justify">
        
          <p>Food Affairs is a restaurant and bar located in Uyo, Eket, and Oron, all in Akwa Ibom State, Nigeria, with a mission to provide excellent food to the public in the most serene environment possible.
<br>
            Since 2001 when we started out, we’ve continued to delight our customers with the provision of balanced culinary services through our well organized operational structures that enhance excellent service delivery in a serene atmosphere.
            We make sure that amongst other things, our customers who are endeared to us have a total satisfaction and a deliciously different experience. Below is our core services.</p>
      </div>
      <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- contact us -->
<div class="modal fade" id="contactUs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Contact Us</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-justify">
       <p> <i class="fa fa-phone"></i> (234) 8027496500</p>
       <p> <i class="fa fa-phone"></i> (234) 8063444005</p>
       <p> <i class="fa fa-phone"></i> (234) 817433665</p>
       <p> <i class="fa fa-envelope"></i> customercare@foodaffairsng.com</p>
       <p> <i class="fa fa-map-marker"></i> 93 Ikot Ekpene Road, Uyo, Akwa Ibom, Nigeria.</p>
       <p> <i class="fa fa-map-marker"></i> 23 Udotung Ubo Street, Uyo, Akwa Ibom, Nigeria.</p>
       <p> <i class="fa fa-map-marker"></i> 1 Uyo Road, Ikot Ekpene, Akwa Ibom, Nigeria.</p>
       <p> <i class="fa fa-map-marker"></i> 225 Uyo Road, Oron, Akwa Ibom, Nigeria.</p>
       <p> <i class="fa fa-map-marker"></i> 41 Grace Bill Road, Eket, Akwa Ibom, Nigeria.</p>         
            
      </div>
      <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>