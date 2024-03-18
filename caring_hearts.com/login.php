<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset=""UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,intial-scale=1.0">
        <title>Caring_Hearts</title>
        <link rel="stylesheet" href="css/login.css">
    </head>

    <body>


        <header>
            <h2 class="logo">CARING HEARTS </h2>
            <nav class="navigation">
                <a href="home.html">Home</a>
                <a href="about.html">About Us</a>
                <a href="contact.html">Contact</a>
                
            </nav>
        </header>


        <div class="wrapper">
                <div class="form-box login">
                <h2>Login</h2>
                
                <form action="includes/formhandler.inc.php" method="post" >
                
                    <div class="input-box">
                        <span class="icon">
                            <ion-icon name="person-outline"></ion-icon>
                        </span>
                        <input name="firstname" type="text" required>
                        <label>First name</label>    
                    </div>

                    <div class="input-box">
                        <span class="icon">
                            <ion-icon name="person-outline"></ion-icon>
                        </span>
                        <input name="lastname" type="text" required>
                        <label>Last name</label>    
                    </div>


                    <div class="input-box">
                        <span class="icon">
                            <ion-icon name="mail-outline"></ion-icon>
                        </span>
                        <input name="email" type="email" required>
                        <label>Email</label>    
                    </div>
                    <div class="input-box">
                        <span class="icon">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </span>

                        <input type="password" required>
                        <label>Password </label>
                    </div>
                    <div class="remember-forgot">
                        <label><input type="checkbox">Remember me</label>
                    </div>
                    <button type="submit" class="btn">Login</button>
                </form>
                </form>
            </div>
        </div>
   
    <footer>
        <p>Made with care by &copy; 2024 Caring Hearts</p>
    </footer>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
   
    </body>
</html>
