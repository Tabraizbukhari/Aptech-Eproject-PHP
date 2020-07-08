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
                  <?php if($name == 'index.php'){ echo"
                    <li>
                        <a href='#faqs' class='btn-sm nav-item'>FAQ's</a>
                    </li>";}
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
                                            <i class="icon-feedback"></i>
                                        </span>
                                        <a href="#" title="">Send feedback</a>
                                    </li>
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
                    '; }?>
                    </ul>
                    

                </nav><!--navigation end-->
              <div class="clearfix"></div>
            </div><!--btm_bar_content end-->
        </div>
    </div><!--btm_bar end-->
</header><!--header end-->
