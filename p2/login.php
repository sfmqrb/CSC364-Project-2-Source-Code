<?php require 'utils.php'; require 'db.php'; $error=null; if($_SERVER['REQUEST_METHOD']==='POST'){ $db=get_db(); $sql="SELECT * FROM users WHERE username = '{$_POST['username']}' AND password = '{$_POST['password']}' LIMIT 1;"; $row=$db->query($sql)->fetch(PDO::FETCH_ASSOC); if($row){ $_SESSION['user']=$row; header('Location:index.php'); exit; } else { $error='Invalid credentials'; }} site_header('Login'); ?>

<section class="page-header">
  <h1 class="page-title">Welcome back</h1>
  <p class="page-subtitle">Authenticate to continue exploring the console’s intentionally vulnerable surfaces.</p>
</section>

<section class="card form-card">
  <div class="inline-actions" style="justify-content: space-between; align-items: center;">
    <h2>Login</h2>
    <span class="pill">Module 05</span>
  </div>
  <?php if($error) echo "<div class='alert'>$error</div>"; ?>
  <form method="POST" class="form-stack">
    <label class="input-group">
      <span>Username</span>
      <input name="username" autocomplete="username">
    </label>
    <label class="input-group">
      <span>Password</span>
      <input name="password" type="password" autocomplete="current-password">
    </label>
    <div class="form-actions">
      <button type="submit" class="primary">Login</button>
      <a class="btn link" href="register.php">Need an account?</a>
    </div>
  </form>
</section>

<?php site_footer(); ?>
