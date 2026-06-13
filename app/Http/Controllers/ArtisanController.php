<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ArtisanProfile;
use Illuminate\Http\Request;

class ArtisanController extends Controller
{
    public function show(User $user)
    {
        $user->load([
            'artisanProfile',
            'products'
        ]);

        return view(
            'artisans.show',
            compact('user')
        );
    }


    public function edit()
    {
        $profile = auth()
            ->user()
            ->artisanProfile;

        return view(
            'artisans.edit',
            compact('profile')
        );
    }

    public function update(Request $request)
    {
        ArtisanProfile::updateOrCreate(

            [
                'user_id' => auth()->id()
            ],

            [
                'bio' => $request->bio,
                'city' => $request->city,
                'phone' => $request->phone,
            ]

        );

        return redirect(
            '/dashboard/profile'
        );
    }

}