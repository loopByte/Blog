<?php
    session_start();
    require_once 'include/autoload.class.php';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="style/default/main.css" />
    </head>
<body>
    <?php if(!isset($_SESSION['logged'])){ ?>
    <div class="login-box">
        <form action="index.php?action=login" method="POST" >
            <input id="input-login" type="text" name="username" placeholder="Username" required /><br />
            <input id="input-login" type="password" name="password" placeholder="Password" required /><br />
            <input type="submit" value="Log In" /><br />
        </form>
    </div>
    <?php }else{ ?>
    
    <div class="page">
    
    <!-- Articles -->
        <div class="section">
            <section>
                <h1>Articles</h1>
            </section>
            <a href="new-article.php" class="menu">
                <div>
                    <h2>New</h2>
                </div>
            </a>
            <a href="manage-article.php" class="menu">
                <div>
                    <h2>Manage</h2>
                </div>
            </a>
        </div>
    <!-- End Articles -->
    
    <!-- Users -->
        <div class="section">
            <section>
                <h1>Users</h1>
            </section>
            <a href="new-user.php" class="menu">
                <div>
                    <h2>New</h2>
                </div>
            </a>
            <a href="manage-user.php" class="menu">
                <div>
                    <h2>Manage</h2>
                </div>
            </a>
            <a href="index.php?action=logout" class="menu">
                <div>
                    <h2>Log out</h2>
                </div>
            </a>
        </div>
    <!-- End Users -->
    </div>
    
    <?php } ?>
</body>
</html>