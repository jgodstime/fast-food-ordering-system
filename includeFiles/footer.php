 <footer class="footer bg-info text-center" style="padding-top: 40px;margin-top:20px;color:white;">
      <div class="container">
        <span class="">All Right Reserved John Godstime</span>
      </div>
</footer>
<script type="text/javascript" src="js/itemInCat.js"></script>
</body>
</html>

<?php
if(isMobile()){  
?>
 <nav class="bg-light pan border border-info">  
   <ul class="navbar-nav">
      <li class="nav-item text-center">
          <a href="#" class="nav-link"  data-toggle="modal" data-target="#cart" data-whatever="@mdo"><i style="font-size:25px;" class="fa fa-shopping-cart"></i> <span class="badge badge-danger itemInCat"></span></a>
      </li>
      </ul>
 </nav>


<style>
.pan{
	width: 100%;
	position: fixed;
	bottom: 0;
}


</style>
<?php
}
?>