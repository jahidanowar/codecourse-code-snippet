<?php

namespace App\Http\Controllers\Snippets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Snippet;
use App\Models\Step;

class StepController extends Controller
{
    public function update(Snippet $snippet, Step $step, Request $request)
    {
        // authorize!
        $this->validate($request, [
            'title' => 'nullable',
            'body' => 'nullable'
        ]);
        $step->update($request->only('title', 'body'));
    }
}
