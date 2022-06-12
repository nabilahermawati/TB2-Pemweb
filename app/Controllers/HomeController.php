<?php

namespace App\Controllers;

use App\Models\AchievementCertificate;
use App\Models\ContactInformation;
use App\Models\UserInformation;
use App\Models\WorkExperience;

class HomeController extends BaseController
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

  public function index()
  {
    $data = [
      'users' => $this->userInformation->findAll(),
    ];

    return view('index', $data);
  }
}
