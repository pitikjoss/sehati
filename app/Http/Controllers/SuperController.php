<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Peraturan;
use App\Bantuan;

class SuperController extends Controller
{
    public function tim()
    {
        $relations = [
            'roles' => \App\Role::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        $user = Auth::user();

        return view('members.show', compact('user') + $relations);
    }

        public function bantuan()
    {


        $bantuan = Bantuan::all();

        return view('members.bantuan', compact('bantuan'));
    }


    public function peraturan()
    {


        $peraturan = Peraturan::all();

        return view('members.peraturan', compact('peraturan'));
    }

}
