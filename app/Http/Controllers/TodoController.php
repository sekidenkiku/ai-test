<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class TodoController extends Controller
{
    use AuthorizesRequests;
    public function index(): Response
    {
        $todos = auth()->user()->todos()->orderBy('created_at', 'desc')->get();
        
        return Inertia::render('todos/index', [
            'todos' => $todos,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        auth()->user()->todos()->create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->back();
    }

    public function update(Request $request, Todo $todo)
    {
        $this->authorize('update', $todo);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_completed' => 'boolean',
        ]);

        $todo->update($request->only(['title', 'description', 'is_completed']));

        return redirect()->back();
    }

    public function destroy(Todo $todo)
    {
        $this->authorize('delete', $todo);

        $todo->delete();

        return redirect()->back();
    }
}