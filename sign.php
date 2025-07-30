<!DOCTYPE html>
<html>
<head>
    <title>Sign In</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Times New Roman', Times, serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('./tank.jpg') no-repeat;
            background-size: cover;
            background-position: center;
            min-height: 100vh;
        }

        .wrapper {
            width: 420px;
            border: 2px solid rgba(255, 255, 255, .2);
            color: black;
            background-color: rgb(244, 247, 247);
            box-shadow: 0 0 10px rgb(0, 0, 0);
            border-radius: 10px;
            padding: 30px 40px;
        }

        .wrapper h1 {
            font-size: 36px;
            text-align: center;
            margin-bottom: 20px;
            color: black;
        }

        .input-box {
            width: 100%;
            height: 50px;
            position: relative;
            margin: 30px 0;
        }

        .input-box label {
            display: block;
            margin-bottom: 8px;
            font-size: 16px;
            color:black;
        }

        .input-box input {
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            font-size: 16px;
            outline: none;
            border: 2px solid rgba(0, 0, 0, 0.2);
            border-radius: 40px;
            padding: 20px 45px 20px 20px;
            color: black;
        }

        .input-box input::placeholder {
            color: black;
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            font-size: 14.5px;
            margin: 15px 0 15px;
        }

        .remember-forgot label input {
            accent-color: black;
            margin-right: 3px;
        }

        .wrapper .btn {
            width: 100%;
            height: 45px;
            background: black;
            border: none;
            outline: none;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            cursor: pointer;
            font-size: 16px;
            color: white;
            font-weight: 600;
        }

        .wrapper .register-link {
            font-size: 14.5px;
            text-align: center;
            margin: 20px 0 25px;
        }

        .register-link p a {
            color: black;
            text-decoration: none;
            font-weight: 400;
        }

        .register-link p a:hover {
            text-decoration: underline;
        }

        .remember-forgot a {
            color: black;
            text-decoration: none;
        }

        .remember-forgot a:hover {
            text-decoration: underline;
        }

        .input-box i {
            position: absolute;
            right: 20px;
            top: 50%;
            color: black;
            transform: translateY(-50%);
            font-size: 20px;
        }

        /* Additional Style Enhancements */
        .wrapper .input-box input:focus {
            border: 2px solid #51514f; /* Highlight input field on focus */
        }

        .wrapper .btn:hover {
            background-color: #838280; /* Change button color on hover */
            color: #0b0b0b;
        }
    </style>
</head>
<body>
    <div class="wrapper">
    <form action="register.php" method="post">
    <h1>Register</h1>

    <!-- Username input -->
    <div class="input-box">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required placeholder="Enter your username" />
        <i class="fas fa-user-circle"></i>
    </div>

    <!-- Email input -->
    <div class="input-box">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required placeholder="Enter your email" />
        <i class="fas fa-envelope"></i>
    </div>

    <!-- Password input -->
    <div class="input-box">
        <label for="password">Password:</label>
        <input type="password" id="password" name="userpassword" required placeholder="Enter your password" />
        <i class="fas fa-lock"></i>
    </div>

    <!-- Confirm Password input -->
    <div class="input-box">
        <label for="confirm-password">Confirm Password:</label>
        <input type="password" id="confirm-password" name="confirm_password" required placeholder="Confirm your password" />
        <i class="fas fa-lock"></i>
    </div>

    <!-- Terms and conditions checkbox -->
    <div class="remember-forgot">
        <label><input type="checkbox" required> I agree to the <a href="#">terms and conditions</a></label>
    </div>

    <!-- Submit button -->
    <input class="btn" type="submit" name="register" value="Register">

    <!-- Link to login page -->
    <div class="register-link">
        <p>Already have an account? <a href="login.html">Login Now</a></p>
    </div>
    </form>

    </div>
</body>
</html>
