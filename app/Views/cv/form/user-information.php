<div id="user-information-form" class="accordion-body accordion-collapse collapse" data-bs-parent="#accordion-left-tabs" aria-labelledby="user-information-tab">
  <form action="/save/user/<?= $user['id'] ?>" method="post" enctype="multipart/form-data" autocomplete="off">
    <?= csrf_field(); ?>
    <input name="oldPhoto" type="hidden" value="<?= $user['photo'] ?>">

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
          <input name="name" type="text" placeholder="ex: Nabila Hermawati" value="<?= (old('name')) ? old('name') : $user['name'] ?>" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>">

          <div class="invalid-feedback">
            <?= $validation->getError('name'); ?>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="mb-3">
          <label class="form-label">Profession</label>
          <input name="profession" type="text" class="form-control <?= ($validation->hasError('profession')) ? 'is-invalid' : ''; ?>" placeholder="ex: Business Analyst" value="<?= (old('profession')) ? old('profession') : $user['profession'] ?>">

          <div class="invalid-feedback">
            <?= $validation->getError('profession'); ?>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="mb-3">
          <label class="form-label">About me</label>
          <textarea name="about" class="form-control <?= ($validation->hasError('about')) ? 'is-invalid' : ''; ?>" rows="3" placeholder="Write your summary here"><?= (old('about')) ? old('about') : $user['about'] ?></textarea>

          <div class="invalid-feedback">
            <?= $validation->getError('about'); ?>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="mb-3">
          <label class="form-label">Education</label>
          <input name="education" type="text" class="form-control <?= ($validation->hasError('education')) ? 'is-invalid' : ''; ?>" placeholder="ex: Mercu Buana University" value="<?= (old('education')) ? old('education') : $user['education'] ?>">

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
          <input id="skills" name="skills" type="text" class="form-control <?= ($validation->hasError('skills')) ? 'is-invalid' : ''; ?>" placeholder="ex: Microsoft Word" data-role="tagsinput" value="<?= (old('skills')) ? old('skills') : $user['skills'] ?>">

          <div class="invalid-feedback">
            <?= $validation->getError('skills'); ?>
          </div>
        </div>
      </div>

    </div>

  </form>
</div>

<?= $this->section('js') ?>
<script>
  $(function() {
    $('#skills')
      .on('change', function(event) {
        var $element = $(event.target);
        var $container = $element.closest('.example');

        if (!$element.data('tagsinput')) return;

        var val = $element.val();
        if (val === null) val = 'null';
        var items = $element.tagsinput('items');

        $('code', $('pre.val', $container)).html(
          $.isArray(val) ?
          JSON.stringify(val) :
          '"' + val.replace('"', '\\"') + '"'
        );
        $('code', $('pre.items', $container)).html(
          JSON.stringify($element.tagsinput('items'))
        );
      })
      .trigger('change');

    $('#skills').attr('class', 'form-control')
  });
</script>
<?= $this->endSection() ?>