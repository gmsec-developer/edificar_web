@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Historial del sistema</h1>

<div class="bg-white shadow rounded-lg p-6">

    <form method="GET" class="mb-4 flex gap-2 flex-wrap">
        <select name="user" class="border p-2 rounded">
            <option value="">Todos los usuarios</option>
            @foreach ($users as $id => $name)
                <option value="{{ $id }}" @selected(request('user') == $id)>
                    {{ $name }}
                </option>
            @endforeach
        </select>

        <input type="date" name="from" value="{{ request('from') }}" class="border p-2 rounded">
        <input type="date" name="to" value="{{ request('to') }}" class="border p-2 rounded">

        <button class="bg-indigo-600 text-white px-4 py-2 rounded">
            Filtrar
        </button>
    </form>

    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-4 py-3 text-left text-xs text-gray-500">Usuario</th>
                <th class="px-4 py-3 text-left text-xs text-gray-500">Acción</th>
                <th class="px-4 py-3 text-left text-xs text-gray-500">Fecha</th>
            </tr>
        </thead>

        <tbody class="divide-y">
            @forelse ($logs as $log)
                <tr>
                    <td class="px-4 py-3 text-sm">
                        {{ $log->causer->name ?? 'Sistema' }}
                    </td>

                    <td class="px-4 py-3 text-sm">
                        {{ $log->description }}
                    </td>

                    <td class="px-4 py-3 text-sm">
                        {{ $log->created_at->format('d/m/Y H:i') }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center p-4">
                        Sin registros
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $logs->links() }}
    </div>
</div>
@endsection