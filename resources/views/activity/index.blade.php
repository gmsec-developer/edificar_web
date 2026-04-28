@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Historial del sistema</h1>

<div class="bg-white shadow rounded-lg p-6">
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