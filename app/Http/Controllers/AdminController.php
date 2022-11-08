<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Rules\IsValidPassword;

use App\Models\File;
use App\Models\User;
use App\Models\Qcm;
use App\Models\Formation;
use App\Models\Matiere;

use App\Http\Livewire\Formations;


use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function backoffice() 
    {
        return view('admin.backoffice');
    }
}
