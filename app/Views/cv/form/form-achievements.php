<div id="achievements-form" class="accordion-body accordion-collapse collapse" data-bs-parent="#accordion-left-tabs" aria-labelledby="achievements-tab">

  <div class="row">
    <table class="table table-bordered table-striped">
      <tbody>
        <tr class="bg-purple text-white">
          <th scope="col" class="text-center">#</th>
          <th scope="col" class="text-center">Achievement Name</th>
          <th scope="col" class="text-center">#</th>
        </tr>

        <?php if (count($achievements) <= 0) : ?>
          <tr class="border-purple">
            <td class="text-center" colspan="4">No Data</td>
          </tr>
        <?php endif; ?>

        <?php $i = 1; ?>
        <?php foreach ($achievements as $achievement) : ?>
          <tr class="border-purple">
            <td class="text-center"><?= $i++ ?></td>
            <td class="text-left"><?= $achievement['name']; ?></td>
            <td class="text-center">
              <form action="/delete/achievement-certificate/<?= $achievement['id'] ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-md btn-danger">
                  <i class="bi bi-trash text-light"></i>
                </button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>

      </tbody>
    </table>
  </div>

  <form action="/save/achievement-certificate/<?= $user['id'] ?>" method="post" class="mt-5" autocomplete="off">
    <?= csrf_field(); ?>

    <div class="row">
      <div class="col-md-6">
        <h1>Add Achievement</h1>
      </div>
      <div class="col-md-6">
        <div class="d-flex justify-content-end">
          <input type="submit" class="btn text-white bg-purple mt-2 mb-2" value="Save">
          <input name="type" type="hidden" value="1" />
        </div>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-12">
        <div class="mb-3">
          <label class="form-label">Achievement Name</label>
          <input name="name" type="text" placeholder="ex: Business Analyst" value="<?= old('name'); ?>" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>">

          <div class="invalid-feedback">
            <?= $validation->getError('name'); ?>
          </div>
        </div>
      </div>
    </div>

  </form>
</div>