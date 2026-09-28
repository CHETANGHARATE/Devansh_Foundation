@extends('layouts.admin', ['title' => 'Success Stories', 'header' => 'Success Stories & Testimonials'])

@section('content')

<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h3 class="text-base font-bold text-gray-800">Community Beneficiary Stories</h3>
            <p class="text-xs text-gray-500">Inspiring real-life accounts of positive impact and transformation</p>
        </div>
        <a href="{{ route('admin.stories.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-[#138A4B] text-white text-xs font-bold shadow hover:bg-[#0f6c3a] transition-colors w-fit">
            <i data-lucide="plus" class="w-4 h-4"></i> Add New Story
        </a>
    </div>

    @if(session('success'))
        <div class="p-4 rounded-xl bg-emerald-50 text-emerald-800 text-xs font-semibold border border-emerald-200">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-gray-50/75 border-b border-gray-100 text-gray-500 uppercase tracking-wider font-semibold">
                    <tr>
                        <th class="px-6 py-4">Beneficiary / Story</th>
                        <th class="px-6 py-4">Associated Project</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Featured</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($stories as $story)
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <img src="{{ $story->image ?: 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=200&auto=format&fit=crop&q=80' }}" class="w-12 h-12 rounded-xl object-cover border border-gray-100" alt="{{ $story->person_name }}">
                                    <div>
                                        <div class="font-bold text-gray-800 text-sm">{{ $story->person_name }}</div>
                                        <div class="text-[11px] text-gray-500">{{ $story->person_role_or_location }}</div>
                                        <div class="text-xs text-[#073B63] font-medium mt-0.5 line-clamp-1">{{ $story->title }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-600">
                                {{ $story->project ? $story->project->title : 'General / Foundation' }}
                            </td>
                            <td class="px-6 py-4">
                                @if($story->is_published)
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700">Published</span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold bg-gray-100 text-gray-600">Draft</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if($story->is_featured)
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-50 text-amber-700">Featured</span>
                                @else
                                    <span class="text-gray-400 text-[11px]">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.stories.edit', $story->id) }}" class="p-2 rounded-lg text-gray-500 hover:text-[#073B63] hover:bg-gray-100 transition-colors" title="Edit">
                                        <i data-lucide="edit-3" class="w-4 h-4"></i>
                                    </a>
                                    <form action="{{ route('admin.stories.destroy', $story->id) }}" method="POST" onsubmit="return confirm('Delete this story?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 rounded-lg text-gray-400 hover:text-red-600 hover:bg-red-50 transition-colors" title="Delete">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-400">
                                No success stories found. Click "Add New Story" to create one.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($stories->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $stories->links() }}
            </div>
        @endif
    </div>
</div>

@endsection
