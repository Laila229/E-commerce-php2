<?php
require_once "Database.php";
session_start();

if (!isset($_SESSION["user"]["id"])) {
    header("Location: login.php");
    exit;
}

$conn = Database::getInstance();
$userId = (int)$_SESSION["user"]["id"];

$stmt = $conn->prepare("SELECT id, name, email, role, phone FROM users WHERE id = ? LIMIT 1");
$stmt->bind_param("i", $userId);
$stmt->execute();
$res = $stmt->get_result();
$user = $res->fetch_assoc();
$stmt->close();

if (!$user) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}

$profileErrors = $_SESSION["profile_errors"] ?? [];
$profileSuccess = $_SESSION["profile_success"] ?? "";
unset($_SESSION["profile_errors"], $_SESSION["profile_success"]);

$passErrors = $_SESSION["pass_errors"] ?? [];
$passSuccess = $_SESSION["pass_success"] ?? "";
unset($_SESSION["pass_errors"], $_SESSION["pass_success"]);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>My Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <style>
      * { box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; }
      body { margin: 0; background: #f4f6f8; color: #333; }
      .container {
        max-width: 900px;
        margin: 40px auto;
        background: #fff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
      }
      h1 { margin-bottom: 10px; }
      p { color: #666; font-size: 14px; }
      hr { border: none; border-top: 1px solid #ddd; margin: 25px 0; }
      .row { display: flex; gap: 20px; margin-bottom: 20px; }
      .row .field-group { flex: 1; }
      label { display: block; font-size: 13px; margin-bottom: 6px; color: #555; }
      input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
      }
      input:focus { outline: none; border-color: #007bff; }
      .actions { display: flex; gap: 12px; margin-top: 20px; }
      button {
        padding: 10px 18px;
        border: none;
        border-radius: 4px;
        font-size: 14px;
        cursor: pointer;
      }
      .btn-save { background: #007bff; color: #fff; }
      .btn-cancel { background: #6c757d; color: #fff; }
      .btn-logout { background: #dc3545; color: #fff; margin-left: auto; }
      .msg { padding: 10px 12px; border-radius: 6px; font-size: 14px; margin: 12px 0; }
      .msg.err { background: #ffe3e5; color: #b02a37; border: 1px solid #f5c2c7; }
      .msg.ok { background: #d1e7dd; color: #0f5132; border: 1px solid #badbcc; }
      .small { font-size: 13px; color: #666; }
      @media (max-width: 700px) { .row { flex-direction: column; } }
    </style>
  </head>

  <body>
    <div class="container">
      
    <div class="mt-4">
      <a href="index.php" class="btn btn-primary">Back to Shop</a>
    </div>
      <h1>My Account</h1>
      <p>Manage your personal information and update your password.</p>
      <div class="small">
        Logged in as: <?= htmlspecialchars($user["email"]) ?> (<?= htmlspecialchars($user["role"]) ?>)
      </div>

      <?php if ($profileSuccess): ?>
        <div class="msg ok"><?= htmlspecialchars($profileSuccess) ?></div>
      <?php endif; ?>

      <?php if ($profileErrors): ?>
        <div class="msg err"><?= htmlspecialchars(implode(" | ", $profileErrors)) ?></div>
      <?php endif; ?>

      <form action="update_profile_action.php" method="post">
        <h3>Personal Information</h3>

        <div class="row">
          <div class="field-group">
            <label>Full Name</label>
            <input type="text" name="name" value="<?= htmlspecialchars($user["name"] ?? "") ?>" />
          </div>

          <div class="field-group">
            <label>Phone Number</label>
            <input type="text" name="phone" value="<?= htmlspecialchars($user["phone"] ?? "") ?>" />
          </div>
        </div>

        <div class="row">
          <div class="field-group">
            <label>Email Address</label>
            <input type="email" name="email" value="<?= htmlspecialchars($user["email"] ?? "") ?>" />
          </div>
        </div>

        <div class="actions">
          <button type="submit" class="btn-save">Save Profile</button>
          <button type="reset" class="btn-cancel">Cancel</button>
          <button type="button" class="btn-logout" onclick="window.location.href='logout_action.php'">Logout</button>
        </div>
      </form>

      <hr />

      <?php if ($passSuccess): ?>
        <div class="msg ok"><?= htmlspecialchars($passSuccess) ?></div>
      <?php endif; ?>

      <?php if ($passErrors): ?>
        <div class="msg err"><?= htmlspecialchars(implode(" | ", $passErrors)) ?></div>
      <?php endif; ?>

      <form action="change_password_action.php" method="post">
        <h3>Change Password</h3>

        <div class="row">
          <div class="field-group">
            <label>Current Password</label>
            <input type="password" name="old_password" />
          </div>

          <div class="field-group">
            <label>New Password</label>
            <input type="password" name="new_password" />
          </div>
        </div>

        <div class="row">
          <div class="field-group">
            <label>Confirm New Password</label>
            <input type="password" name="confirm_password" />
          </div>
        </div>

        <div class="actions">
          <button type="submit" class="btn-save">Change Password</button>
          <button type="reset" class="btn-cancel">Cancel</button>
        </div>
      </form>
    </div>
      <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>


    <!-- Template Javascript -->
    <script src="js/main.js"></script>
  </body>
</html>
