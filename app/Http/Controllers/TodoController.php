<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::latest()->get();
        return view('todos.index', compact('todos'));
    }

    // Tambah tugas
    public function store(Request $request)
    {
        $request->validate([
            'title'    => 'required|string|max:255',
            'deadline' => 'nullable|date',
            'note'     => 'nullable|string',
        ]);

        Todo::create([
            'title'    => $request->title,
            'deadline' => $request->deadline,
            'note'     => $request->note,
        ]);

        return redirect()->back();
    }

    // Toggle selesai / belum
    public function toggle($id)
    {
        $todo = Todo::findOrFail($id);

        $todo->is_done = !$todo->is_done;
        $todo->completed_at = $todo->is_done
            ? now()->toDateString()
            : null;

        $todo->save();

        return redirect()->back();
    }

    //  Edit tugas
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'    => 'required|string|max:255',
            'deadline' => 'nullable|date',
            'note'     => 'nullable|string',
        ]);

        $todo = Todo::findOrFail($id);

        $todo->update([
            'title'    => $request->title,
            'deadline' => $request->deadline,
            'note'     => $request->note,
        ]);

        return redirect()->back();
    }

    //  Hapus tugas
    public function destroy($id)
    {
        Todo::findOrFail($id)->delete();
        return redirect()->back();
    }
}
