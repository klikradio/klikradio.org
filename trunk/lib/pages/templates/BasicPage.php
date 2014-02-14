<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?= $page_vars["meta_description"]; ?>">
  <meta name="keywords" content="<?= $page_vars["meta_keywords"]; ?>">
  <meta name="author" content="">

  <title><?= $page_vars["meta_title"]; ?></title>

  <!-- Bootstrap core CSS -->
  <link href="/css/bootstrap.css" rel="stylesheet">

  <!-- Add custom CSS here -->
  <link href="/css/modern-business.css" rel="stylesheet">
  <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>

  <?php include PAGE_ROOT . 'elements/navbar_top.php' ?>

    <div class="container">

        <div class="row">

            <div class="col-lg-12">
                <h1 class="page-header"><?= $page_vars["h1_title"]; ?></h1>
                <ol class="breadcrumb">
                    <li><a href="/">Home</a>
                    </li>
                    <li class="active">Full Width Page</li>
                </ol>
            </div>

        </div>

        <div class="row">

            <div class="col-lg-12">
                <?= $page_vars["h1_content"]; ?>
            </div>

        </div>

    </div>
    <!-- /.container -->
    
    <?php include PAGE_ROOT . 'elements/footer.php'; ?>

    <!-- JavaScript -->
    <script src="/js/jquery-1.10.2.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script src="/js/modern-business.js"></script>

</body>

</html>
