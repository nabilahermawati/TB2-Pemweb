<?= $this->extend('layout/header') ?>

<?= $this->section('content') ?>
<div class="row mt-2">
  <div class="row no-print">
    <div class="col-md-12">
      <div class="d-flex justify-content-end">
        <button class="btn text-white bg-purple mt-2 mb-2" onclick="window.print()">Download CV</button>
        <a class="btn text-white bg-purple mt-2 mb-2" style="margin-left: 20px;" href="/update/<?= $user['id'] ?>">Update User</a>
      </div>
    </div>
  </div>

  <div class="row mb-5 print-container" id="bodyPrint">

    <div class="card">
      <div class="card-body">

        <div class="row">
          <div class="col-md-2">
            <img src="<?php echo base_url('/images/' . $user['photo']); ?>" class="avatar">
          </div>

          <div class="col-md-10 print-mt-2">
            <h3><?= $user['name'] ?></h3>
            <h6 class="fw-light"><?= $user['profession'] ?></h6>
            <p><?= $user['about'] ?></p>
          </div>
        </div>

        <div class="row bg-light mt-2">

          <div class="col-md-12 mt-3">
            <table class="table table-borderless">
              <tr>
                <td>
                  <p><i class="bi bi-envelope-fill"></i> <?= $contact == null ? '-' : $contact['email'] ?></p>
                </td>
                <td>
                  <p><i class="bi bi-phone-fill"></i> <?= $contact == null ? '-' : $contact['phone'] ?></p>
                </td>
              </tr>
              <tr>
                <td>
                  <p><i class="bi bi-map-fill"></i> <?= $contact == null ? '-' : $contact['address'] ?>, <?= $contact == null ? '-' : $contact['city'] ?>, <?= $contact == null ? '-' : $contact['country'] ?></p>
                </td>
                <td>
                  <p><i class="bi bi-linkedin"></i> <?= $contact == null ? '-' : $contact['linkedin'] ?></p>
                </td>
              </tr>
            </table>
          </div>
        </div>

        <div class="row mt-4">
          <div class="col-md-6">
            <h3 class="text-uppercase">Work Experience</h3>
            <hr>
            <?php foreach ($works as $work) : ?>
              <div class="mb-5">
                <h5><?= $work['job'] ?></h5>
                <h6 class="fw-light"><?= $work['company'] ?></h6>

                <div class="row">
                  <div class="col-md-6">
                    <i><?= $work['start_date'] ?> - <?= $work['end_date'] ?></i>
                  </div>
                  <div class="col-md-6">
                    <div class="d-flex justify-content-end">
                      <i><?= $work['location'] ?></i>
                    </div>
                  </div>
                </div>

                <p class="mt-2"><?= $work['description'] ?></p>
              </div>
            <?php endforeach; ?>
          </div>

          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-lg-12">
                <h3 class="text-uppercase">Skills and Competencies</h3>
                <hr>
                <?php foreach (explode(',', $user['skills']) as $skill) : ?>
                  <button class="btn text-white bg-purple mb-2"><?= $skill ?></button>
                <?php endforeach; ?>
              </div>
            </div>

            <div class="row mb-5">
              <div class="col-lg-12">
                <h3 class="text-uppercase">Training and certifications</h3>
                <hr>
                <?php foreach ($certificates as $certificate) : ?>
                  <p><?= $certificate['name'] ?> <i>(<?= $certificate['institution'] ?> - <?= $certificate['year'] ?>)</i></p>
                <?php endforeach; ?>
              </div>
            </div>

            <div class="row mb-5">
              <div class="col-lg-12">
                <h3 class="text-uppercase">Achievements</h3>
                <hr>
                <?php foreach ($achievements as $achievement) : ?>
                  <p><?= $achievement['name'] ?></p>
                <?php endforeach; ?>
              </div>
            </div>

            <div class="row mb-5">
              <div class="col-lg-12">
                <h3 class="text-uppercase">Languages</h3>
                <hr>
                <?php if ($contact != null) : ?>
                  <?php foreach (explode(',', $contact['languages']) as $language) : ?>
                    <button class="btn text-white bg-purple mb-2"><?= $language ?></button>
                  <?php endforeach; ?>
                <?php endif; ?>
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>

  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script type="text/javascript">
  function PrintElem(elem) {
    Popup($('<div/>').append($(elem).clone()).html());
  }

  function Popup(data) {
    var mywindow = window.open('', 'my div', 'height=400,width=600');
    mywindow.document.write('<html><head><title>my div</title>');
    mywindow.document.write('<link rel="stylesheet" href="<?php echo base_url('/css/bootstrap.min.css'); ?>" type="text/css" />');
    mywindow.document.write('</head><body >');
    mywindow.document.write(data);
    mywindow.document.write('</body></html>');

    mywindow.print();
    //  mywindow.close();

    return true;
  }
</script>
<?= $this->endSection() ?>