<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Routing\Controller;

class ShowController extends Controller
{
    public function __invoke(User $user)
    {
        return view('user.show', compact('user'));
    }
}
