<?php

namespace App\Controllers;

use App\Models\AchievementCertificate;
use App\Models\ContactInformation;
use App\Models\UserInformation;
use App\Models\WorkExperience;

class CvController extends BaseController
{

  protected $userInformation;
  protected $contactInformation;
  protected $workExperience;
  protected $achievementCertificate;

  public function __construct()
  {
    $this->userInformation = new UserInformation();
    $this->contactInformation = new ContactInformation();
    $this->workExperience = new WorkExperience();
    $this->achievementCertificate = new AchievementCertificate();
  }

  public function index($id)
  {
    $data = [
      'user' => $this->userInformation->find($id),
      'contact' => $this->contactInformation->where('user_id', $id)->first(),
      'works' => $this->workExperience->where('user_id', $id)->findAll(),
      'achievements' => $this->achievementCertificate->where('user_id', $id)->where('type', 1)->findAll(),
      'certificates' => $this->achievementCertificate->where('user_id', $id)->where('type', 2)->findAll(),
    ];

    return view('cv/index', $data);
  }

  public function add()
  {
    $data = [
      'validation' => \Config\Services::validation(),
    ];

    return view('cv/add', $data);
  }

  public function createUser()
  {
    if (!$this->validate([
      'name' => 'required',
      'profession' => 'required',
      'about' => 'required',
      'education' => 'required',
      'skills' => 'required',
      'photo' => [
        'rules' => 'uploaded[photo]|max_size[photo,2048]|is_image[photo]|mime_in[photo,image/jpg,image/jpeg,image/png]',
      ],
    ])) {
      return redirect()->to('/add-user')->withInput();
    }

    $data = [
      'name' => $this->request->getVar('name'),
      'profession' => $this->request->getVar('profession'),
      'about' => $this->request->getVar('about'),
      'education' => $this->request->getVar('education'),
      'skills' => $this->request->getVar('skills'),
    ];

    $photo = $this->request->getFile('photo');
    if ($photo->getError() == 0) {
      $randomName = $photo->getRandomName();

      $photo->move('images', $randomName);
      $data['photo'] = $randomName;
    }

    $this->userInformation->save($data);

    session()->setFlashdata('message', 'User created successfully');
    return redirect()->to('/');
  }

  public function update($id)
  {

    $data = [
      'user' => $this->userInformation->find($id),
      'contact' => $this->contactInformation->where('user_id', $id)->first(),
      'works' => $this->workExperience->where('user_id', $id)->findAll(),
      'achievements' => $this->achievementCertificate->where('user_id', $id)->where('type', 1)->findAll(),
      'certificates' => $this->achievementCertificate->where('user_id', $id)->where('type', 2)->findAll(),
      'validation' => \Config\Services::validation(),
    ];

    return view('cv/update', $data);
  }

  public function updateUser($id)
  {
    if (!$this->validate([
      'name' => 'required',
      'profession' => 'required',
      'about' => 'required',
      'education' => 'required',
      'skills' => 'required',
      'photo' => [
        'rules' => 'max_size[photo,2048]|is_image[photo]|mime_in[photo,image/jpg,image/jpeg,image/png]',
      ],
    ])) {
      return redirect()->to('/update/' . $id . '#user-information')->withInput();
    }

    $data = [
      'id' => $id,
      'name' => $this->request->getVar('name'),
      'profession' => $this->request->getVar('profession'),
      'about' => $this->request->getVar('about'),
      'education' => $this->request->getVar('education'),
      'skills' => $this->request->getVar('skills'),
    ];

    $photo = $this->request->getFile('photo');
    if ($photo->getError() == 0) {
      $randomName = $photo->getRandomName();

      $photo->move('images', $randomName);
      $data['photo'] = $randomName;

      unlink('images/' . $this->request->getVar('oldPhoto'));
    }

    $this->userInformation->save($data);

    session()->setFlashdata('message', 'Data updated successfully');
    return redirect()->to('/update/' . $id . '#user-information');
  }

  public function updateContact($userId)
  {
    if (!$this->validate([
      'email' => 'required',
      'linkedin' => 'required',
      'phone' => 'required',
      'languages' => 'required',
      'address' => 'required',
      'city' => 'required',
      'country' => 'required',
      'postal_code' => 'required',
    ])) {
      $validation = \Config\Services::validation();
      return redirect()->to('/update/' . $userId . '#contact-information')->withInput()->with('validation', $validation);
    }

    $data = [
      'email' => $this->request->getVar('email'),
      'linkedin' => $this->request->getVar('linkedin'),
      'phone' => $this->request->getVar('phone'),
      'languages' => $this->request->getVar('languages'),
      'address' => $this->request->getVar('address'),
      'city' => $this->request->getVar('city'),
      'country' => $this->request->getVar('country'),
      'postal_code' => $this->request->getVar('postal_code'),
      'user_id' => $userId,
    ];

    if ($this->request->getVar('id') != 0) {
      $data['id'] = $this->request->getVar('id');
    }

    $this->contactInformation->save($data);

    session()->setFlashdata('message', 'Data updated successfully');
    return redirect()->to('/update/' . $userId . '#contact-information');
  }

  public function updateWork($userId)
  {
    if (!$this->validate([
      'job' => 'required',
      'company' => 'required',
      'start_date' => 'required',
      'end_date' => 'required',
      'location' => 'required',
      'description' => 'required',
    ])) {
      $validation = \Config\Services::validation();
      return redirect()->to('/update/' . $userId . '#work-experience')->withInput()->with('validation', $validation);
    }

    $this->workExperience->save([
      'job' => $this->request->getVar('job'),
      'company' => $this->request->getVar('company'),
      'start_date' => $this->request->getVar('start_date'),
      'end_date' => $this->request->getVar('end_date'),
      'location' => $this->request->getVar('location'),
      'description' => $this->request->getVar('description'),
      'user_id' => $userId,
    ]);

    session()->setFlashdata('message', 'Data added successfully');
    return redirect()->to('/update/' . $userId . '#work-experience');
  }

  public function updateAchievementCertificate($userId)
  {

    $type = $this->request->getVar('type');

    if ($type == 2) {
      if (!$this->validate([
        'name' => 'required',
        'institution' => 'required',
        'year' => 'required',
        'type' => 'required',
      ])) {
        $validation = \Config\Services::validation();
        return redirect()->to('/update/' . $userId . '#certificates')->withInput()->with('validation', $validation);
      }
    } else {
      if (!$this->validate([
        'name' => 'required',
        'type' => 'required',
      ])) {
        $validation = \Config\Services::validation();
        return redirect()->to('/update/' . $userId . '#achievements')->withInput()->with('validation', $validation);
      }
    }

    $this->achievementCertificate->save([
      'name' => $this->request->getVar('name'),
      'institution' => $this->request->getVar('institution'),
      'year' => $this->request->getVar('year'),
      'type' => $this->request->getVar('type'),
      'user_id' => $userId,
    ]);

    session()->setFlashdata('message', 'Data added successfully');

    if ($type == 2) return redirect()->to('/update/' . $userId . '#certificates');

    return redirect()->to('/update/' . $userId . '#achievements');
  }

  public function deleteUser($id)
  {
    $this->achievementCertificate->where('user_id', $id)->delete();
    $this->contactInformation->where('user_id', $id)->delete();
    $this->workExperience->where('user_id', $id)->delete();

    $this->userInformation->delete($id);

    session()->setFlashdata('message', 'User deleted successfully');
    return redirect()->to('/');
  }

  public function deleteWork($id)
  {
    $ac = $this->workExperience->find($id);
    $this->workExperience->delete($id);

    session()->setFlashdata('message', 'Data deleted successfully');
    return redirect()->to('/update/' . $ac['user_id'] . '#work-experience');
  }

  public function deleteAchievementCertificate($id)
  {
    $ac = $this->achievementCertificate->find($id);
    $this->achievementCertificate->delete($id);

    session()->setFlashdata('message', 'Data deleted successfully');

    if ($ac['type'] == 2) return redirect()->to('/update/' . $ac['user_id'] . '#certificates');

    return redirect()->to('/update/' . $ac['user_id'] . '#achievements');
  }
}
