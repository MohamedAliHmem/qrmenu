<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accueil</title>
  <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh;
  margin: 0;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  background-color: #e9ecef;
}

.container {
  text-align: center;
  color: #556ee6;
}

.button-container {
  margin-top: 20px;
}

.login-button,
.registration-button {
  display: inline-block;
  padding: 12px 20px;
  margin: 0 10px;
  text-decoration: none;
  color: #fff;
  background-color: #2ecc71;
  border-radius: 4px;
  font-size: 16px;
  transition: background-color 0.3s ease;
}

.login-button:hover,
.registration-button:hover {
  background-color: #27ae60;
}

</style>
<body>

  <div class="container">
    <h1>Welcome</h1>
    <div class="button-container">
      <a href="/login" class="login-button">Login</a>
      <a href="/register" class="registration-button">Registration</a>
    </div>
  </div>

</body>
</html>
