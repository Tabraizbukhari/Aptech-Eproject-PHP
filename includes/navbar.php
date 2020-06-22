<div class="wrapper hp_1">

<header>
    <div class="top_bar p-2">
        <div class="container">
            <div class="top_header_content">
                <div class="menu_logo">
                    <a href="#" title="" class="menu">
                        <i class="icon-menu"></i>
                    </a>
                    <a href="index-2.html" title="" class="logo">
                        <img src="images/logo.png" alt="">
                    </a>
                </div><!--menu_logo end-->
                <div class="search_form">
                    <form>
                        <input type="text" name="search" placeholder="Search Videos">
                        <button type="submit">
                            <i class="icon-search"></i>
                        </button>
                    </form>
                </div><!--search_form end-->
                <ul class="controls-lv  py-3">
                    <li>
                        <a href="<?php if(isset($_SESSION['auth'])){echo"log"; }else{echo"signin";} ?>" title="" class="btn-sm btn-rounded btn btn-outline-dark">Upload</a>
                    </li>
                    <?php if(isset($_SESSION['auth'])){ ?> 
                    <li class="user-log ">
                        <div class="user-ac-img">
                            <img src="images/resources/user-img.png" class="img-fluid " alt="">
                        </div>
                        <div class="account-menu p-0 ">
                            <div class="sd_menu">
                                <ul class="mm_menu">
                                    <li>
                                        <span>
                                            <i class="icon-user"></i>
                                        </span>
                                        <a href="#" title="">My Profile</a>
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
                                        <a href="#" title="">Sign out</a>
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
    <div class="btm_bar">
        <div class="container">
            <div class="btm_bar_content">
                <nav>
                    <ul>
                        <li><a href="#" title="">Pages</a>
                            <div class="mega-menu">
                                <ul>
                                    <li><a href="index-2.html" title="">Homepage</a></li>
                                    <li><a href="single_video_page.html" title="">Single Video Page</a></li>
                                    <li><a href="Single_Video_Simplified_Page.html" title="">Single Video Simplified Page</a></li>
                                    <li><a href="single_video_fullwidth_page.html" title="">Singel Video Full Width Page</a></li>
                                    <li><a href="single_video_playlist.html" title="">Single Video Playlist Page</a></li>
                                    <li><a href="Upload_Video.html" title="">Upload Video Page</a></li>
                                    <li><a href="Upload_Edit.html" title="">Upload Video Edit Page</a></li>
                                    <li><a href="Browse_Channels.html" title="">Browse channels page</a></li>
                                    <li><a href="Searched_Videos_Page.html" title="">Searched videos page</a></li>
                                </ul>
                                <ul>
                                    <li><a href="#" title="">Single channel <span class="icon-arrow_below"></span></a>
                                        <ul>
                                            <li><a href="Single_Channel_Home.html" title="">Single Channel Home page</a></li>
                                            <li><a href="Single_Channel_Videos.html" title="">Single Channel videos page</a></li>
                                            <li><a href="Single_Channel_Playlist.html" title="">single channel playlist page</a></li>
                                            <li><a href="Single_Channel_Channels.html" title="">single channel channels page</a></li>
                                            <li><a href="Single_Channel_About.html" title="">single channel about page</a></li>
                                            <li><a href="Single_Channel_Products.html" title="">single channel products page</a></li>	
                                        </ul>
                                    </li>
                                    <li><a href="History_Page.html" title="">History page</a></li>
                                    <li><a href="Browse_Categories.html" title="">Browse Categories Page</a></li>
                                    <li><a href="Updates_From_Subs.html" title="">Updates from subscription page</a></li>
                                    <li><a href="login.html" title="">login page</a></li>
                                    <li><a href="signup.html" title="">signup page</a></li>
                                    <li><a href="User_Account_Page.html" title="">User account page</a></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </li>
                        <li><a href="Browse_Categories.html" title="">Categories</a></li>
                    </ul>
                </nav><!--navigation end-->
              <div class="clearfix"></div>
            </div><!--btm_bar_content end-->
        </div>
    </div><!--btm_bar end-->
</header><!--header end-->

<div class="side_menu">
    <div class="form_dvv">
        <a href="#" title="" class="login_form_show">Sign in</a>
    </div>
    <div class="sd_menu">
        <ul class="mm_menu">
            <li>
                <span>
                    <i class="icon-home"></i>
                </span>
                <a href="#" title="">Home</a>
            </li>
            <li>
                <span>
                    <i class="icon-fire"></i>
                </span>
                <a href="#" title="">Trending</a>
            </li>
            <li>
                <span>
                    <i class="icon-subscriptions"></i>
                </span>
                <a href="#" title="">Subscriptions</a>
            </li>
        </ul>
    </div><!--sd_menu end-->
    <div class="sd_menu">
        <h3>Library</h3>
        <ul class="mm_menu">
            <li>
                <span>
                    <i class="icon-history"></i>
                </span>
                <a href="#" title="">History</a>
            </li>
            <li>
                <span>
                    <i class="icon-watch_later"></i>
                </span>
                <a href="#" title="">Watch Later</a>
            </li>
            <li>
                <span>
                    <i class="icon-purchased"></i>
                </span>
                <a href="#" title="">Purchases</a>
            </li>
            <li>
                <span>
                    <i class="icon-like"></i>
                </span>
                <a href="#" title="">Liked Videos</a>
            </li>
            <li>
                <span>
                    <i class="icon-play_list"></i>
                </span>
                <a href="#" title="">Playlist</a>
            </li>
        </ul>
    </div><!--sd_menu end-->
    <div class="sd_menu subs_lst">
        <h3>Subscriptions</h3>
        <ul class="mm_menu">
            <li>
                <span class="usr_name">
                    <img src="images/resources/th1.png" alt="">
                </span>
                <a href="#" title="">Dr Disrespect</a>
                <small>3</small>
            </li>
            <li>
                <span class="usr_name">
                    <img src="images/resources/th2.png" alt="">
                </span>
                <a href="#" title="">ASMR</a>
                <small>6</small>
            </li>
            <li>
                <span class="usr_name">
                    <img src="images/resources/th3.png" alt="">
                </span>
                <a href="#" title="">Rivvrs</a>
                <small>2</small>
            </li>
            <li>
                <span class="usr_name">
                    <img src="images/resources/th4.png" alt="">
                </span>
                <a href="#" title="">The Verge</a>
                <small>11</small>
            </li>
            <li>
                <span class="usr_name">
                    <img src="images/resources/th5.png" alt="">
                </span>
                <a href="#" title="">Seeker</a>
                <small>3</small>
            </li>
            <li>
                <span class="usr_name">
                    <img src="images/resources/sn.png" alt="">
                </span>
                <a href="#" title="">Music</a>
                <small>20</small>
            </li>
        </ul>
        <a href="#" title="" class="more-ch"><i class="icon-arrow_below"></i> Show 14 more</a>
    </div><!--sd_menu end-->
    <div class="sd_menu">
        <ul class="mm_menu">
            <li>
                <span>
                    <i class="icon-settings"></i>
                </span>
                <a href="#" title="">Settings</a>
            </li>
            <li>
                <span>
                    <i class="icon-flag"></i>
                </span>
                <a href="#" title="">Report history</a>
            </li>
            <li>
                <span>
                    <i class="icon-logout"></i>
                </span>
                <a href="#" title="">Sign out</a>
            </li>
        </ul>
    </div><!--sd_menu end-->
    <div class="sd_menu m_linkz">
        <ul class="mm_menu">
            <li><a href="#">About</a></li>
            <li><a href="#">Community Rules </a></li>
            <li><a href="#">Privacy</a></li>
            <li><a href="#">Terms</a></li>
            <li><a href="#">Blogs</a></li>
            <li><a href="#">Contracts </a></li>
            <li><a href="#">Donate</a></li>
            <li><a href="#">FAQ</a></li>
        </ul>
        <span>azyrusthemes</span>
    </div><!--sd_menu end-->
    <div class="sd_menu bb-0">
        <ul class="social_links">
            <li>
                <a href="#" title="">
                    <i class="icon-facebook-official"></i>
                </a>
            </li>
            <li>
                <a href="#" title="">
                    <i class="icon-twitter"></i>
                </a>
            </li>
            <li>
                <a href="#" title="">
                    <i class="icon-instagram"></i>
                </a>
            </li>
        </ul><!--social_links end-->
    </div><!--sd_menu end-->
    <div class="dd_menu"></div>
</div><!--side_menu end-->