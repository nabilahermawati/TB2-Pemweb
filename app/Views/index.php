<?= $this->extend('layout/header') ?>

<?= $this->section('content') ?>

<?php if (session()->getFlashdata('message')) :  ?>
  <div class="alert alert-success" role="alert">
    <?= session()->getFlashdata('message'); ?>
  </div>
<?php endif; ?>

<div class="row">
  <div class="col-md-6">
    <h1>User</h1>
  </div>
  <div class="col-md-6">
    <div class="d-flex justify-content-end">
      <a href="/add-user" class="btn text-white bg-purple mt-2 mb-2">Add User</a>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <table class="table table-bordered table-striped">
      <tr class="bg-purple text-white">
        <th scope="col" class="text-center text-white">#</th>
        <th scope="col" class="text-center text-white">User Name</th>
        <th scope="col" class="text-center text-white">#</th>
      </tr>

      <?php if (count($users) <= 0) : ?>
        <tr class="border-purple">
          <td class="text-center" colspan="3">No Data</td>
        </tr>
      <?php endif; ?>

      <?php $i = 1; ?>
      <?php foreach ($users as $user) : ?>
        <tr class="border-purple">
          <td class="text-center"><?= $i++ ?></td>
          <td class="text-left"><?= $user['name']; ?></td>
          <td class="text-center">
            <a class="btn btn-success" href="/cv/<?= $user['id'] ?>">
              <i class="bi bi-eye text-light"></i>
            </a>
            <a class="btn btn-info" href="/update/<?= $user['id'] ?>">
              <i class="bi bi-pencil text-light"></i>
            </a>
            <form action="/delete/user/<?= $user['id'] ?>" method="post" class="d-inline">
              <?= csrf_field(); ?>
              <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="btn btn-md btn-danger">
                <i class="bi bi-trash text-light"></i>
              </button>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>

    </table>
  </div>
</div>

<?= $this->endSection() ?>