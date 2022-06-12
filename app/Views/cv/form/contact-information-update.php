<div id="user-information-form" class="accordion-body accordion-collapse collapse" data-bs-parent="#accordion-left-tabs" aria-labelledby="user-information-tab">
  <form action="/save/contact/<?= $user['id'] ?>" method="post" autocomplete="off">
    <?= csrf_field(); ?>
    <input name="id" type="hidden" value="<?= $contact['id'] ?>">

    <div class="row">
      <div class="col-md-6">
        <h1>Contact Information</h1>
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
          <label class="form-label">Email</label>
          <input name="email" type="email" placeholder="ex: email@nabila.com" autocomplete="off" value="<?= (old('email')) ? old('email') : $contact['email'] ?>" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>">

          <div class="invalid-feedback">
            <?= $validation->getError('email'); ?>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="mb-3">
          <label class="form-label">Linkedin</label>
          <input name="linkedin" type="text" placeholder="ex: Nabila Hermawati" value="<?= (old('linkedin')) ? old('linkedin') : $contact['linkedin'] ?>" class="form-control <?= ($validation->hasError('linkedin')) ? 'is-invalid' : ''; ?>">

          <div class="invalid-feedback">
            <?= $validation->getError('linkedin'); ?>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="mb-3">
          <label class="form-label">Phone Number</label>
          <input name="phone" type="text" placeholder="ex: 08123456789" value="<?= (old('phone')) ? old('phone') : $contact['phone'] ?>" class="form-control <?= ($validation->hasError('phone')) ? 'is-invalid' : ''; ?>">

          <div class="invalid-feedback">
            <?= $validation->getError('phone'); ?>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="mb-3">
          <label class="form-label">Languages</label><br>
          <input id="languages" name="languages" type="text" placeholder="ex: Indonesia" value="<?= (old('languages')) ? old('languages') : $contact['languages'] ?>" data-role="tagsinput" class="form-control <?= ($validation->hasError('languages')) ? 'is-invalid' : ''; ?>">

          <div class="invalid-feedback">
            <?= $validation->getError('languages'); ?>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="mb-3">
          <label class="form-label">Address</label>
          <textarea name="address" rows="3" placeholder="Write your address here" class="form-control <?= ($validation->hasError('address')) ? 'is-invalid' : ''; ?>"><?= (old('address')) ? old('address') : $contact['address'] ?></textarea>

          <div class="invalid-feedback">
            <?= $validation->getError('address'); ?>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="mb-3">
          <label class="form-label">City</label>
          <input name="city" type="text" placeholder="ex: Jakarta" value="<?= (old('city')) ? old('city') : $contact['city'] ?>" class="form-control <?= ($validation->hasError('city')) ? 'is-invalid' : ''; ?>">

          <div class="invalid-feedback">
            <?= $validation->getError('city'); ?>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="mb-3">
          <label class="form-label">Country</label>
          <input name="country" type="text" placeholder="ex: Indonesia" value="<?= (old('country')) ? old('country') : $contact['country'] ?>" class="form-control <?= ($validation->hasError('country')) ? 'is-invalid' : ''; ?>">

          <div class="invalid-feedback">
            <?= $validation->getError('country'); ?>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="mb-3">
          <label class="form-label">Postal Code</label>
          <input name="postal_code" type="number" placeholder="ex: 12345" value="<?= (old('postal_code')) ? old('postal_code') : $contact['postal_code'] ?>" class="form-control <?= ($validation->hasError('postal_code')) ? 'is-invalid' : ''; ?>">

          <div class="invalid-feedback">
            <?= $validation->getError('postal_code'); ?>
          </div>
        </div>
      </div>

    </div>

  </form>
</div>

<?= $this->section('js') ?>
<script>
  $(function() {
    $('#languages')
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

    $('#languages').attr('class', 'form-control')
  });
</script>
<?= $this->endSection() ?>