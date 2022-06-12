<div id="work-experience-form" class="accordion-body accordion-collapse collapse" data-bs-parent="#accordion-left-tabs" aria-labelledby="work-experience-tab">

  <div class="row">
    <table class="table table-bordered table-striped">
      <tbody>
        <tr class="bg-purple text-white">
          <th scope="col" class="text-center">#</th>
          <th scope="col" class="text-center">Job</th>
          <th scope="col" class="text-center">Company</th>
          <th scope="col" class="text-center">Start Date</th>
          <th scope="col" class="text-center">End Date</th>
          <th scope="col" class="text-center">Location</th>
          <th scope="col" class="text-center">Description</th>
          <th scope="col" class="text-center">#</th>
        </tr>

        <?php if (count($works) <= 0) : ?>
          <tr class="border-purple">
            <td class="text-center" colspan="8">No Data</td>
          </tr>
        <?php endif; ?>

        <?php $i = 1; ?>
        <?php foreach ($works as $work) : ?>
          <tr class="border-purple">
            <td class="text-center"><?= $i++ ?></td>
            <td class="text-center"><?= $work['job']; ?></td>
            <td class="text-center"><?= $work['company']; ?></td>
            <td class="text-center"><?= $work['start_date']; ?></td>
            <td class="text-center"><?= $work['end_date']; ?></td>
            <td class="text-center"><?= $work['location']; ?></td>
            <td class="text-left"><?= substr($work['description'], 0, 150); ?></td>
            <td class="text-center">
              <form action="/delete/work/<?= $work['id'] ?>" method="post">
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

  <form action="/save/work/<?= $user['id'] ?>" method="post" class="mt-5" autocomplete="off">
    <?= csrf_field(); ?>

    <div class="row">
      <div class="col-md-6">
        <h1>Add Work Experience</h1>
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
          <label class="form-label">Job</label>
          <input name="job" type="text" placeholder="ex: Business Analyst" value="<?= old('job'); ?>" class="form-control <?= ($validation->hasError('job')) ? 'is-invalid' : ''; ?>">

          <div class="invalid-feedback">
            <?= $validation->getError('job'); ?>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="mb-3">
          <label class="form-label">Company</label>
          <input name="company" type="text" class="form-control <?= ($validation->hasError('company')) ? 'is-invalid' : ''; ?>" placeholder="ex: Google" value="<?= old('company'); ?>">

          <div class="invalid-feedback">
            <?= $validation->getError('company'); ?>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="mb-3">
          <label class="form-label">Start Date</label>
          <input name="start_date" type="text" class="form-control <?= ($validation->hasError('start_date')) ? 'is-invalid' : ''; ?>" placeholder="Start Date" value="<?= old('start_date'); ?>">

          <div class="invalid-feedback">
            <?= $validation->getError('start_date'); ?>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="mb-3">
          <label class="form-label">End Date</label>
          <input name="end_date" type="text" class="form-control <?= ($validation->hasError('end_date')) ? 'is-invalid' : ''; ?>" placeholder="End Date" value="<?= old('end_date'); ?>">

          <div class="invalid-feedback">
            <?= $validation->getError('end_date'); ?>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="mb-3">
          <label class="form-label">Location</label>
          <input name="location" type="text" class="form-control <?= ($validation->hasError('location')) ? 'is-invalid' : ''; ?>" placeholder="ex: Jakarta" value="<?= old('location'); ?>">

          <div class="invalid-feedback">
            <?= $validation->getError('location'); ?>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="mb-3">
          <label class="form-label">Description</label>
          <textarea name="description" class="form-control <?= ($validation->hasError('description')) ? 'is-invalid' : ''; ?>" rows="3" placeholder="Write your summary here"><?= old('description'); ?></textarea>

          <div class="invalid-feedback">
            <?= $validation->getError('description'); ?>
          </div>
        </div>
      </div>

    </div>

  </form>
</div>