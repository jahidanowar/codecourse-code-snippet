<?php

namespace App\Http\Controllers\Snippets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Snippet;
use App\Models\Step;
use App\Transformers\Snippets\StepTransformer;

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

    public function store(Snippet $snippet, Request $request)
    {
        // authorize!
        $this->validate($request, [
            'title' => 'nullable',
            'body' => 'nullable'
        ]);

        $step = $snippet->steps()->create(
            array_merge($request->only('title', 'body'), [
                'order' => 1
            ])
        );

        return fractal()
            ->item($step)
            ->transformWith(new StepTransformer())
            ->toArray();
    }
}
