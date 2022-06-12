<?= $this->extend('layout/header') ?>

<?= $this->section('content') ?>
<div class="row mt-2">

  <?php if ($user != null) :  ?>
    <?php if (session()->getFlashdata('message')) :  ?>
      <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('message'); ?>
      </div>
    <?php endif; ?>

    <div class="container vtabs">
      <div class="row">
        <!-- Tabs -->
        <div class="col-md-3">
          <ul class="nav nav-tabs left-tabs" role="tablist">
            <li class="nav-item" role="presentation">
              <div id="user-information-tab" class="nav-link tab-clickable text-purple active" role="tab" data-bs-toggle="tab" data-bs-target="#user-information" aria-controls="user-information" aria-selected="true">
                User Information
              </div>
            </li>
            <li class="nav-item" role="presentation">
              <div id="contact-information-tab" class="nav-link tab-clickable text-purple" role="tab" data-bs-toggle="tab" data-bs-target="#contact-information" aria-controls="contact-information" aria-selected="false">
                Contact Information
              </div>
            </li>
            <li class="nav-item" role="presentation">
              <div id="work-experience-tab" class="nav-link tab-clickable text-purple" role="tab" data-bs-toggle="tab" data-bs-target="#work-experience" aria-controls="work-experience" aria-selected="false">
                Work Experience
              </div>
            </li>
            <li class="nav-item" role="presentation">
              <div id="certificates-tab" class="nav-link tab-clickable text-purple" role="tab" data-bs-toggle="tab" data-bs-target="#certificates" aria-controls="certificates" aria-selected="false">
                Certificates
              </div>
            </li>
            <li class="nav-item" role="presentation">
              <div id="achievements-tab" class="nav-link tab-clickable text-purple" role="tab" data-bs-toggle="tab" data-bs-target="#achievements" aria-controls="achievements" aria-selected="false">
                Achievements
              </div>
            </li>
          </ul>
        </div>

        <!-- Tab contents -->
        <div class="col-md-9">
          <div class="container">
            <div id="accordion-left-tabs" class="tab-content accordion">
              <div id="user-information" class="tab-pane fade show active accordion-item" role="tabpanel">
                <?= $this->include('cv/form/user-information') ?>
              </div>

              <div id="contact-information" class="tab-pane fade accordion-item" role="tabpanel">
                <?= $contact == null ? $this->include('cv/form/contact-information-add') : $this->include('cv/form/contact-information-update') ?>
              </div>

              <div id="work-experience" class="tab-pane fade accordion-item" role="tabpanel">
                <?= $this->include('cv/form/work-experience') ?>
              </div>

              <div id="certificates" class="tab-pane fade accordion-item" role="tabpanel">
                <?= $this->include('cv/form/form-certificates') ?>
              </div>

              <div id="achievements" class="tab-pane fade accordion-item" role="tabpanel">
                <?= $this->include('cv/form/form-achievements') ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>

</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script type="text/javascript">
  $(document).ready(function() {

    if (window.location.hash != "") {
      if (document.querySelector('div[data-bs-target="' + window.location.hash + '"]')) {
        document.querySelector('div[data-bs-target="' + window.location.hash + '"]').click()
      }
    }

  });
</script>
<?= $this->endSection() ?>