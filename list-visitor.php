<!DOCTYPE html>
<html lang="fr">


<!-- export-table.html  21 Nov 2019 03:55:25 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Liste marche || TAXES</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
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
      ;?>
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Liste des visites</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name </th>
                            <th>Surname</th>
                            <th>Phone number</th>
                            <th>Reason</th>
                            <th>Gender</th>
                            <th>Date</th>



                          </tr>
                        </thead>
                        <tbody>

                        <?php foreach (GlobalFunction::selectAll('SELECT * FROM visitor ORDER BY date_visite ASC',[]) as $key=>$values):?>

                            <tr>
                                <td><?=$key+1;?></td>
                                <td><?=$values['name_user'];?></td>
                                <td><?=$values['surname'];?></td>
                                <td><?=$values['phone_number'];?></td>
                                <td><?=$values['reason'];?></td>
                                <td><?=$values['gender'];?></td>
                                <td><?=$values['date_visite'];?></td>

                            </tr>

                        <?php endforeach;?>

                        </tbody>
                      </table>
                        <div class="row">
                            <div class="col-5"></div>
                            <div class="col-2">
                                <a href="visitor.php" class="btn btn-primary">Retour</a>
                            </div>
                            <div class="col-5"></div>
                            <div
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
       <?php include_once 'commons/footer.php';?>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <script src="assets/bundles/datatables/datatables.min.js"></script>
  <script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/bundles/datatables/export-tables/dataTables.buttons.min.js"></script>
  <script src="assets/bundles/datatables/export-tables/buttons.flash.min.js"></script>
  <script src="assets/bundles/datatables/export-tables/jszip.min.js"></script>
  <script src="assets/bundles/datatables/export-tables/pdfmake.min.js"></script>
  <script src="assets/bundles/datatables/export-tables/vfs_fonts.js"></script>
  <script src="assets/bundles/datatables/export-tables/buttons.print.min.js"></script>
  <script src="assets/js/page/datatables.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>


<!-- export-table.html  21 Nov 2019 03:56:01 GMT -->
</html>