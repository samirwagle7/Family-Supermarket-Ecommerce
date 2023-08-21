<?php include "header.php"; ?>

<!-- Login Section -->
<div class="login-portal">
    <div class="login-container">
        <div class="login-heading">Welcome to Grocery Store</div>
        <form class="login-form" action="customer.html" method="post" name="login">
            <div class="login-form-group">
                <label class="login-form-label">Username</label>
                <input type="text" class="login-form-input" name="username" required>
            </div>
            
            <div class="login-form-group">
                <label class="login-form-label">Password</label>
                <input type="password" class="login-form-input" name="password" required>
            </div>
            <button type="submit" class="login-form-button">Login</button>
        </form>
        <div class="login-as">
            Don't have an account? <a href="register.html">Register here</a>
        </div>
    </div>
</div>
    

    <script src="script.js"></script>

    <?php include "footer.php" ?>