<head> <title>home - login</title> </head>

<form method="POST" action="php/login.php">
    <div class="login">
        <div id="name"><h1><a href="index.php?page=home" class="projectc">MyBuddy</a></h1></div>
        <hr>
        <?php include 'php/error.php'; ?>
        <label for="email"><b>Email</b></label>
        <p>
        <input type="text" placeholder="Enter Email" name="email" id="email" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" id="psw" required>

        <button type="submit" class="registerbtn">Login</button>

        <div id="name"><p><a href="index.php?page=aanmelden">Don't have an account? Sign up!</a></p></div>
    </div>
</form>
