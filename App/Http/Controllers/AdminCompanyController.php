<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class AdminCompanyController extends Controller
{
    public function store(Request $request) { }
    public function update(Request $request, Company $company) { }
    public function destroy(Company $company) { }
    //admin
}