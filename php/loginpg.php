<?php
/**
 * Created by PhpStorm.
 * User: offormachukwunonso
 * Date: 3/9/17
 * Time: 3:54 PM
 */

include('header.php'); ?>

    <div class=" container">
        <div class="row">
            <div class=" col-lg-6 col-lg-offset-3 loginform">
                <?php $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
                if($pageWasRefreshed){
                    unset($_SESSION['loginmessage']);
                    unset($_SESSION['emailmessage']);
                    unset($_SESSION['passwordmessage']);
                    unset($_SESSION['passmsg']);
                    unset($_SESSION['usernamemsg']);
                    unset($_SESSION['emailmsg']);
                    unset($_SESSION['sqlmsg']);
                    unset($_SESSION['errormsg']);
                }?>
                <?php
                if (isset($_SESSION['loginmessage'])){
                    echo $_SESSION['loginmessage'];
                    unset($_SESSION['loginmessage']);
                } ?>
                <?php if (isset($_SESSION['feedmsg'])){
                    echo $_SESSION['feedmsg'];
                    unset($_SESSION['feedmsg']);
                } ?>
                <?php if (isset($_SESSION['mailmsg'])){
                    echo $_SESSION['mailmsg'];
                    unset($_SESSION['mailmsg']);
                } ?>
                <?php if (isset($_SESSION['emailmessage'])){
                    echo $_SESSION['emailmessage'];
                    unset($_SESSION['emailmessage']);
                } ?>
                <?php if (isset($_SESSION['passwordmessage'])){
                    echo $_SESSION['passwordmessage'];
                    unset($_SESSION['passwordmessage']);
                } ?>
                <?php if (isset($_SESSION['passmsg'])){
                    echo $_SESSION['passmsg'];
                    unset($_SESSION['passmsg']);
                }
                ?>
                <?php if (isset($_SESSION['usernamemsg'])){
                    echo $_SESSION['usernamemsg'];
                    unset($_SESSION['usernamemsg']);
                }
                ?>
                <?php if (isset($_SESSION['emailmsg'])){
                    echo $_SESSION['emailmsg'];
                    unset($_SESSION['emailmsg']);
                };
                ?>
                <?php if (isset($_SESSION['sqlmsg'])){
                    echo $_SESSION['sqlmsg'];
                    unset($_SESSION['sqlmsg']);
                }
                ?>
                <?php if (isset($_SESSION['errormsg'])){
                    echo $_SESSION['errormsg'];
                    unset($_SESSION['errormsg']);
                }
                ?>
                <ul class="nav nav-tabs">
                    <li class="active col-lg-3"><a href="#login" data-toggle="pill">Login</a></li>
                    <li class=" col-lg-3"><a href="#signup"  data-toggle="pill" >Sign up</a></li>
                </ul>
                <div class="tab-content">
                    <div id="login" class="tab-pane fade in active">
                        <form id="login" action ="login.php" method="post">
                            <div class="form-group">
                                <label for="email1">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="password1">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>

                            <button type="submit" name="login-btn" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                    <div id="signup" class="tab-pane fade">
                        <form id="signup" action ="signup.php" method="post">
                            <div class="form-group">
                                <label for="email1">Email address</label>
                                <input type="email" class="form-control" id="email1" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="password1">Password</label>
                                <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="password2">Confirm Password</label>
                                <input type="password" class="form-control" id="password2" name="password2" placeholder="Password">
                            </div>

                            <button type="submit" name ="signup-btn" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>