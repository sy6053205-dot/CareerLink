<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Job;
use App\Models\Application;
use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return match($user->role) {
            'admin' => $this->adminDashboard(),
            'employer' => $this->employerDashboard(),
            'employee' => $this->employeeDashboard(),
            default => abort(403),
        };
    }

  private function adminDashboard(){
     //code
  }
  private function employerDashboard(){
     //code
  }
  private function employeeDashboard(){
     //code
  }


}









