<!DOCTYPE html>
<html lang="en">

<?php include 'pages/head.php'; ?>

<body>



  <div id="auth">
    <div class="bg-img">
      <div class="row h-100 mt-5">
        <div class="card">
          <form method="post">
            <h2 class="title"> Sign In</h2>

            <div class="email-login">
              <label for="email"> <b>Username or Email</b></label>
              <input type="text" placeholder="Enter Email" name="email" id="email" required>
              <label for="psw"><b>Password</b></label>
              <input type="password" name="password" id="password" placeholder="Enter Password" required>
            </div>
            <button type="button" onclick="login(this.form)" class="cta-btn">Sign In</button>
            Don't have an account? <a href="register.php">Sign Up</a>
            or go back to the <a href="../index.php">Home</a>
          </form>
        </div>
      </div>
      <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">

        </div>
      </div>
    </div>
  </div>

</body>
<style>
  .card {
    font-family: sans-serif;
    width: 40%;
    margin-left: auto;
    margin-right: auto;
    margin-top: 3em;
    margin-bottom: 3em;
    border-radius: 10px;
    background-color: #ffff;
    padding: 1.8rem;
    box-shadow: 2px 5px 20px rgba(0, 0, 0, 0.1);
  }

  .title {
    text-align: center;
    font-weight: bold;
    margin: 0;
  }

  .subtitle {
    text-align: center;
    font-weight: bold;
  }

  .btn-text {
    margin: 0;
  }


  .email-login {
    display: flex;
    flex-direction: column;
  }

  .email-login label {
    color: rgb(170 166 166);
  }

  input[type="text"],
  input[type="password"] {
    padding: 15px 20px;
    margin-top: 8px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-sizing: border-box;
  }

  .cta-btn {
    background-color: rgb(69, 69, 185);
    color: white;
    padding: 18px 20px;
    margin-top: 10px;
    margin-bottom: 20px;
    width: 100%;
    border-radius: 10px;
    border: none;
  }

  .forget-pass {
    text-align: center;
    display: block;
  }
</style>

</html>