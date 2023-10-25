<!DOCTYPE html>
<html lang="fr">


<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Visitor</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">

      <!-- Main Content -->

        <?php
                include_once 'implements/GlobalFunction.php';


        ?>
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-lg-2"></div>
              <div class="col-4 col-md-6 col-lg-8">
                <div class="card">

                  <form action="controllers/_visitor.php" method="post">
                    <div class="card-header">
                      <h4>Informations sur l'administrateur</h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if(isset($_SESSION['err']))
                        {
                            echo $_SESSION['err'];
                            unset($_SESSION['err']);
                        }
                        ?>
                          <div class="row">
                            <div class="form-group col-6">
                              <label for="frist_name">Name</label>
                              <input id="frist_name" type="text" class="form-control" name="name" autofocus>
                            </div>

                              <div class="form-group col-6">
                                  <label for="last_name">Surname</label>
                                  <input id="last_name" type="text" class="form-control" name="surname">
                              </div>
                        </div>

                        <div class="row">

                            <div class="form-group col-6">
                                <label for="frist_name">Phone Number</label>
                                <input id="frist_name" type="text" class="form-control" name="phone_number" autofocus>
                            </div>
                            <div class="form-group col-6">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Reason</label>
                                <div class="">
                                    <select name="reason" class="form-control selectric">

                                             <option value="visit">Visit</option>
                                             <option value="appointement">appointement</option>


                                    </select>
                                </div>
                            </div>


                        </div>

                        <div class="row">

                            <div class="form-group col-6">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gender</label>
                                <div class="">
                                    <select name="gender" class="form-control selectric">
                                        <option value="male">Male</option>
                                        <option value="Femmale">Femmale</option>

                                    </select>
                                </div>
                            </div>




                        </div>




                        
                    </div>
                    <div class="card-footer text-right">
                      <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                  </form>
                </div>
            
              </div>
              <div class="col-lg-3"></div>
            </div>
          </div>
        </section>
    <?php include_once 'commons/footer.php';?>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->

  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>


<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->
</html>