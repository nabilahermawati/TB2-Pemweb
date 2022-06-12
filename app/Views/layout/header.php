<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="<?php echo base_url('/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

  <link href="<?php echo base_url('/css/custom.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('/css/b5vtabs.min.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('/css/bootstrap-tagsinput.css'); ?>" rel="stylesheet" />

  <title>CV Nabila</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-purple no-print">
    <div class="container">
      <a class="navbar-brand" href="/">Nabila Hermawati</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <!-- <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link <?= uri_string() == '/' ? 'active' : '' ?>" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= uri_string() == 'update' ? 'active' : '' ?>" href="/update">Update</a>
          </li>
        </ul> -->
      </div>
    </div>
  </nav>

  <div class="container mt-3">
    <?= $this->renderSection('content') ?>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="<?php echo base_url('/js/bootstrap.bundle.min.js'); ?>"></script>
  <script src="<?php echo base_url('/js/bootstrap-tagsinput.min.js'); ?>"></script>

  <?= $this->renderSection('js') ?>
</body>

</html>