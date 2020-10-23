<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Transformers\Users\PublicUserTransformer;

class UserController extends Controller
{
    public function show(User $user) {
        return fractal()
            ->item($user)
            ->transformWith(new PublicUserTransformer())
            ->toArray();
    }
}
