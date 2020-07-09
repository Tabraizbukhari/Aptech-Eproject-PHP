<?php
    $categorie = getallCategory();
	$name = basename($_SERVER['PHP_SELF']);

?>
<div class="wrapper hp_1">

<header>
    <div class="top_bar p-2">
        <div class="container">
            <div class="top_header_content">
                <div class="menu_logo p-2">
             


                    <a href="home" title="" class="logo">
                        <img src="images/logo.png" alt="">
                    </a>
                </div><!--menu_logo end-->
                <div class="search_form p-2">
                    <form method="GET" action="searching" >
                        <input type="text" name="search" placeholder="Search Videos">
                        <button type="submit">
                            <i class="icon-search"></i>
                        </button>
                    </form>
                </div><!--search_form end-->
                <ul class="controls-lv  py-3">
                  <?php if(!isset($_SESSION['authid'])){ echo"
                    <li>
                        <a href='#faqs' class='btn-sm nav-item'>FAQ's</a>
                    </li>";}else if(isset($_SESSION['authid'])){
                        echo '<li>
                            <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModalCenter">
                                <span>
                                <i class="icon-feedback"> Feedback</i>
                                </span>
                            </button>
                        </li>';
                    }
                    ?>
                   
                    <li>
                        <a href="<?php if(isset($_SESSION['auth'])){echo"upload"; }else{echo"signin";} ?>" title="" class="btn-sm btn-rounded btn btn-outline-dark">Upload</a>
                    </li>
                    <?php if(isset($_SESSION['auth'])){ ?> 
                    <li class="user-log ">
                        <div class="user-ac-img">
						<?php if(isset($user['image'] )){?>
                            <img src="<?php echo $user['image']; ?>" width='40' height='30' class="img-fluid " alt="">
                        <?php }else{?>
                            <img src="images/man.jpg" width='40' height='30' class="img-fluid " alt="">
                        <?php }?>

                        </div>
                        <div class="account-menu p-0 ">
                            <div class="sd_menu">
                                <ul class="mm_menu">
                                    <li>
                                        <span>
                                            <i class="icon-user"></i>
                                        </span>
                                        <a href="profile" title="">My Profile</a>
                                    </li>
                                </ul>
                            </div><!--sd_menu end-->
                            <div class="sd_menu scnd">
                                <ul class="mm_menu">
                                    
                                    <li>
                                        <span>
                                            <i class="icon-logout"></i>
                                        </span>
                                        <a href="logout" title="">Sign out</a>
                                    </li>
                                </ul>
                            </div><!--sd_menu end-->
                        </div>
                    </li>
                    <?php }else{ ?>
                    <li>
                        <a href="signin" title="" class="btn-sm btn-rounded text-white btn btn-dark">Login</a>
                    </li>
                   <?php } ?>
                </ul><!--controls-lv end-->
                <div class="clearfix"></div>
            </div><!--top_header_content end-->
        </div>
    </div><!--header_content end-->
    <div class="btm_bar border border-top-0 border-left-0 border-right-0 ">
        <div class="container ">
            <div class="btm_bar_content">
                <nav >
                    <ul>
                    <li><a  class="text-dark"  title="categories">Categories: </a></li>
                    <?php foreach ($categorie as $cate) { echo'
                        <li><a href="categories?search='.$cate['category'].'" title="">'.$cate['category'].'</a></li>
                    '; }?></li>
                     
                    </ul>
                </nav><!--navigation end-->
              <div class="clearfix"></div>
            </div><!--btm_bar_content end-->
        </div>
    </div><!--btm_bar end-->
</header><!--header end-->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">FeedBack FORM</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/" id="searchForm">
      <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="foot-subscribe form-group position-relative">
                                <label>Write your Feedback about our service? <span class="text-danger">*</span></label>
                                <i data-feather="mail" class="fea icon-sm icons"></i>
                                    <textarea class="form-control" required id="feedbackinput" rows="4"></textarea>
                            </div>
                        </div>
                    
                    </div>
      </div>
      <div class="modal-footer">
        <input type="submit"  class="btn btn-soft-primary" value="Feedback">
      </div>
      </form>
    </div>
  </div>
</div>