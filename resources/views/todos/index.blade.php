@extends('layouts.app')

@section('content')

<h1>📝 To Do List</h1>

<div class="dashboard" style="
    display:grid;
    grid-template-columns: 360px 1fr; 
    gap:30px;
">

    <div class="todo-card">
        <h3 style="margin-bottom:16px;">➕ Tambah Tugas</h3>

        <form method="POST" action="/todo">
            @csrf

            <label>Judul</label>
            <input type="text" name="title" placeholder="Judul tugas" required>

            <label style="margin-top:12px; display:block;">Deadline</label>
            <input type="date" name="deadline">

            <label style="margin-top:12px; display:block;">Catatan</label>
            <textarea name="note" rows="4" placeholder="Catatan..."></textarea>

            <button class="btn-primary" style="margin-top:18px; width:100%;">
                Simpan Tugas
            </button>
        </form>
    </div>


    <div>

        @forelse ($todos as $todo)
        <div class="todo-card">

            {{-- EDIT --}}
            <form method="POST" action="/todo/update/{{ $todo->id }}">
                @csrf
                @method('PUT')

                <input type="text"
                       name="title"
                       value="{{ $todo->title }}"
                       class="{{ $todo->is_done ? 'done' : '' }}"
                       style="font-size:17px; font-weight:600;">

                <textarea name="note"
                          rows="2"
                          class="{{ $todo->is_done ? 'done' : '' }}"
                          style="margin-top:10px;">{{ $todo->note }}</textarea>

                <input type="date"
                       name="deadline"
                       value="{{ $todo->deadline }}"
                       style="margin-top:10px;">

                <div class="todo-footer">
                    <span>
                        Deadline: {{ $todo->deadline ?? '-' }} <br>
                        Selesai: {{ $todo->completed_at ?? '-' }}
                    </span>

                    <button class="success">💾</button>
                </div>
            </form>

            {{-- ACTION --}}
            <div style="
                display:flex;
                justify-content:space-between;
                margin-top:12px;
            ">
                <form method="POST" action="/todo/{{ $todo->id }}">
                    @csrf
                    @method('PUT')
                    <button class="success">
                        {{ $todo->is_done ? '✅ Selesai' : '⬜ Tandai' }}
                    </button>
                </form>

                <form method="POST" action="/todo/{{ $todo->id }}">
                    @csrf
                    @method('DELETE')
                    <button class="danger">🗑 Hapus</button>
                </form>
            </div>

        </div>
        @empty
            <p style="color:#64748b;">Belum ada tugas.</p>
        @endforelse

    </div>

</div>

@endsection
