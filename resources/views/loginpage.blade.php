<html>
  <head>
      <meta charset="utf-8" />
      <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
      <link rel="icon" type="image/png" href="../assets/img/favicon.png">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <title>iCOMMP Login Page</title>
      <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
      <!--     Fonts and icons     -->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
      <style>
    body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
    }

    main {
      flex: 1 0 auto;
    }

    body {
      background: #fff;
    }

    .input-field input[type="date"]:focus + label,
    .input-field input[type="text"]:focus + label,
    .input-field input[type="email"]:focus + label,
    .input-field input[type="password"]:focus + label {
      color: #e91e63;
    }

    .input-field input[type="date"]:focus,
    .input-field input[type="text"]:focus,
    .input-field input[type="email"]:focus,
    .input-field input[type="password"]:focus {
      border-bottom: 2px solid #e91e63;
      box-shadow: none;
    }
  </style>
  </head>
  <body>

    <!-- Login -->
                    <div class="section"></div>
                  <main>
                    <center>
                      <img class="responsive-img" style="width: 250px;" src="https://i.imgur.com/ax0NCsK.gif" />
                      <div class="section"></div>

                      <h5 class="indigo-text">Please, login into your account</h5>
                      <div class="section"></div>

                      <div class="container">
                        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

                          <form class="col s12" method="post">
                            <div class='row'>
                              <div class='col s12'>
                              </div>
                            </div>

                            <div class='row'>
                              <div class='input-field col s12'>
                                <input class='validate' type='text' name='user'/>
                                <label for='email'>Enter your username</label>
                              </div>
                            </div>

                            <div class='row'>
                              <div class='input-field col s12'>
                                <input class='validate' type='password' name='pass'/>
                                <label for='password'>Enter your password</label>
                              </div>
                              <label style='float: right;'>
                								<a class='pink-text' href='#!'><b>Forgot Password?</b></a>
                							</label>
                            </div>

                            <br />
                            <center>
                              <div class='row'>
                                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Login</button>
                              </div>
                            </center>
                          </form>
                        </div>
                      </div>
                      <a href="#!">Create account</a>
                    </center>

                    <div class="section"></div>
                    <div class="section"></div>
                  </main>
     <!-- Login Close-->
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>

  </body>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
  <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
</html>
