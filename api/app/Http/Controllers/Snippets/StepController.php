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
        $step = $snippet->steps()->create(
            array_merge($request->only('title', 'body'), [
                'order' => $this->getOrder($request)
            ])
        );

        return fractal()
            ->item($step)
            ->transformWith(new StepTransformer())
            ->toArray();
    }

    protected function getOrder(Request $request)
    {
        return Step::where('uuid', $request->before)
            ->orWhere('uuid', $request->after)
            ->first()
            ->{($request->before ? 'before' : 'after') . 'Order'}();
    }
}
