<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JoinController extends Controller
{
    public function create()
    {
        $organization = User::findOrFail(request('organization_id'));

        return view('join', compact('organization'));
    }

    public function store(Request $request)
    {
        $roleId = $request->role_id == 2 ? 3 : $request->role_id;
        auth()->user()->organizations()->attach($request->input('organization_id'), ['role_id' => $roleId]);

        return redirect(route('home'));
    }

    public function organization()
    {
        $organization = User::findOrFail(request('organization_id'));

        $organization_user = DB::table('organization_user')
            ->where('organization_id', $organization->id)
            ->where('user_id', auth()->id())
            ->first();

        session([
            'organization_id' => $organization->id,
            'organization_name' => $organization->name,
            'organization_role_id' => $organization_user->role_id
        ]);

        return back();
    }
}
