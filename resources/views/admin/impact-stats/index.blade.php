@extends('layouts.admin', ['title' => 'Impact Statistics', 'header' => 'Impact Statistics & Counters'])

@section('content')

<div class="flex items-center justify-between">
    <div>
        <h2 class="text-lg font-bold text-[#073B63]">Homepage Impact Counters</h2>
        <p class="text-xs text-gray-500">Edit numeric counts, suffixes, and labels in all 3 languages</p>
    </div>
    <a href="{{ route('admin.impact-stats.create') }}" class="inline-flex items-center space-x-2 px-4 py-2.5 rounded-xl bg-[#138A4B] text-white text-xs font-bold shadow-sm transition">
        <i data-lucide="plus" class="w-4 h-4"></i>
        <span>Add New Statistic</span>
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-xs">
            <thead class="bg-gray-50 text-gray-500 uppercase tracking-wider text-[11px] border-b border-gray-100">
                <tr>
                    <th class="py-3 px-4">Display Number</th>
                    <th class="py-3 px-4">Marathi Label</th>
                    <th class="py-3 px-4">Hindi Label</th>
                    <th class="py-3 px-4">English Label</th>
                    <th class="py-3 px-4">Order</th>
                    <th class="py-3 px-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($stats as $s)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-3.5 px-4 font-black text-sm text-[#073B63]">
                            {{ number_format($s->number_value) }}{{ $s->number_suffix }}
                        </td>
                        <td class="py-3.5 px-4 font-bold text-gray-800">{{ $s->translation('mr')?->label }}</td>
                        <td class="py-3.5 px-4 text-gray-600">{{ $s->translation('hi')?->label }}</td>
                        <td class="py-3.5 px-4 text-gray-600">{{ $s->translation('en')?->label }}</td>
                        <td class="py-3.5 px-4 font-mono text-gray-500">{{ $s->order }}</td>
                        <td class="py-3.5 px-4 text-right space-x-2">
                            <a href="{{ route('admin.impact-stats.edit', $s->id) }}" class="inline-flex items-center px-2.5 py-1.5 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold text-xs">
                                <i data-lucide="edit-3" class="w-3.5 h-3.5 mr-1"></i> Edit
                            </a>
                            <form action="{{ route('admin.impact-stats.destroy', $s->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this statistic?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-2.5 py-1.5 rounded-lg bg-red-50 text-red-600 font-semibold text-xs">
                                    <i data-lucide="trash-2" class="w-3.5 h-3.5 mr-1"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
