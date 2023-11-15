<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SiAku</title>
    <link rel="stylesheet" href="style.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://unpkg.com/boxicons@latest/css/boxicons.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
      integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>
    <section>
        <div class="background-log"></div>
        <div class="content-log">
            <div class="form-login">
                <div class="logo">
                    <img src="img/logo-unila.png" alt="">
                    <p class="mb-0">KLINIK <br>UNIVERSITAS <br>LAMPUNG</p>
                </div>
                <div class="formbox-login">
                    <form action="proses_login.php" method="post">
                        <h1>SiAku</h1>
                        <div class="input-box">
                            <label>Username</label>
                            <div class="input-container">
                                <i class="fa-regular fa-user"></i>
                                <input type="text" name="username" placeholder="Tuliskan username" required>
                            </div>
                        </div>
                        <div class="input-box">
                            <label>Password</label>
                            <div class="input-container">
                                <i class='bx bx-lock'></i>
                                <input type="password" name="pass" placeholder="Tuliskan password" required>
                            </div>
                        </div>
                        <div class="remember-forgot">
                            <p>Lupa Password?</p>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    </div>
  </body>
</html>
