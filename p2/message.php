<?php require 'utils.php'; require_login(); require 'db.php'; if($_SERVER['REQUEST_METHOD']==='POST'){ $db=get_db(); $uid=current_user()['id']; $stmt=$db->prepare('INSERT INTO messages(user_id, content) VALUES (?, ?)'); $stmt->execute([$uid, $_POST['content']]); header('Location:index.php'); exit; } site_header('Post Message'); ?>

<section class="page-header">
  <h1 class="page-title">Compose Transmission</h1>
  <p class="page-subtitle">Broadcast a new update to every operator console. Remember: nothing you post is sanitized.</p>
</section>

<section class="card form-card">
  <div class="inline-actions" style="justify-content: space-between; align-items: center;">
    <h2>Post a Message</h2>
    <span class="pill">Module 02</span>
  </div>
  <form method="POST" class="form-stack">
    <label class="input-group">
      <span>Message body</span>
      <textarea name="content" rows="4" placeholder="Mission update, HTML, or payloads welcome."></textarea>
    </label>
    <div class="form-actions">
      <button type="submit" class="primary">Publish</button>
      <a class="btn link" href="index.php">Cancel</a>
    </div>
  </form>
</section>

<?php site_footer(); ?>
