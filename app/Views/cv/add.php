<?= $this->extend('layout/header') ?>

<?= $this->section('content') ?>
<div class="row mt-2">
  <div class="col-md-12">
    <form action="/create/user" method="post" enctype="multipart/form-data" autocomplete="off">
      <?= csrf_field(); ?>

      <div class="row">
        <div class="col-md-6">
          <h1>User Information</h1>
        </div>
        <div class="col-md-6">
          <div class="d-flex justify-content-end">
            <input type="submit" class="btn text-white bg-purple mt-2 mb-2" value="Save">
          </div>
        </div>
      </div>

      <div class="row mt-3">
        <div class="col-md-6">
          <div class="mb-3">
            <label class="form-label">Name</label>
            <input name="name" type="text" placeholder="ex: Nabila Hermawati" value="<?= old('name') ?>" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>">

            <div class="invalid-feedback">
              <?= $validation->getError('name'); ?>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="mb-3">
            <label class="form-label">Profession</label>
            <input name="profession" type="text" class="form-control <?= ($validation->hasError('profession')) ? 'is-invalid' : ''; ?>" placeholder="ex: Business Analyst" value="<?= old('profession') ?>">

            <div class="invalid-feedback">
              <?= $validation->getError('profession'); ?>
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <div class="mb-3">
            <label class="form-label">About me</label>
            <textarea name="about" class="form-control <?= ($validation->hasError('about')) ? 'is-invalid' : ''; ?>" rows="3" placeholder="Write your summary here"><?= old('about') ?></textarea>

            <div class="invalid-feedback">
              <?= $validation->getError('about'); ?>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="mb-3">
            <label class="form-label">Education</label>
            <input name="education" type="text" class="form-control <?= ($validation->hasError('education')) ? 'is-invalid' : ''; ?>" placeholder="ex: Mercu Buana University" value="<?= old('education') ?>">

            <div class="invalid-feedback">
              <?= $validation->getError('education'); ?>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="mb-3">
            <label class="form-label">Photo Profile</label>
            <input name="photo" type="file" class="form-control <?= ($validation->hasError('photo')) ? 'is-invalid' : ''; ?>">
            <div class="invalid-feedback">
              <?= $validation->getError('photo'); ?>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="mb-3">
            <label class="form-label">Skills</label><br>
            <input id="skills" name="skills" type="text" class="form-control <?= ($validation->hasError('skills')) ? 'is-invalid' : ''; ?>" placeholder="ex: Microsoft Word" data-role="tagsinput" value="<?= old('skills') ?>">

            <div class="invalid-feedback">
              <?= $validation->getError('skills'); ?>
            </div>
          </div>
        </div>

      </div>

    </form>
  </div>
</div>
<?= $this->endSection() ?>