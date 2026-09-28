@extends('layouts.admin', ['title' => 'News & Press', 'header' => 'News & Updates'])

@section('content')

<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h3 class="text-base font-bold text-gray-800">News Articles & Press Releases</h3>
            <p class="text-xs text-gray-500">Keep stakeholders, donors, and the community updated on the foundation's progress</p>
        </div>
        <a href="{{ route('admin.news.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-[#138A4B] text-white text-xs font-bold shadow hover:bg-[#0f6c3a] transition-colors w-fit">
            <i data-lucide="plus" class="w-4 h-4"></i> Post Article
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
                        <th class="px-6 py-4">Article</th>
                        <th class="px-6 py-4">Category</th>
                        <th class="px-6 py-4">Date</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($articles as $article)
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    @if($article->featured_image)
                                        <img src="{{ $article->featured_image }}" class="w-12 h-12 rounded-xl object-cover border border-gray-100" alt="{{ $article->title }}">
                                    @else
                                        <div class="w-12 h-12 rounded-xl bg-gray-100 flex items-center justify-center text-gray-400">
                                            <i data-lucide="newspaper" class="w-5 h-5"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <div class="font-bold text-gray-800 text-sm line-clamp-1">{{ $article->title }}</div>
                                        <div class="text-[11px] text-gray-400 mt-0.5">/news/{{ $article->slug }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-[#EEF6FB] text-[#073B63]">
                                    {{ $article->category }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-gray-600">
                                {{ $article->published_at ? $article->published_at->format('d M, Y') : '-' }}
                            </td>
                            <td class="px-6 py-4">
                                @if($article->is_published)
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700">Published</span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold bg-gray-100 text-gray-600">Draft</span>
                                @endif
                                @if($article->is_featured)
                                    <span class="ml-1 inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-50 text-amber-700">Featured</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.news.edit', $article->id) }}" class="p-2 rounded-lg text-gray-500 hover:text-[#073B63] hover:bg-gray-100 transition-colors" title="Edit">
                                        <i data-lucide="edit-3" class="w-4 h-4"></i>
                                    </a>
                                    <form action="{{ route('admin.news.destroy', $article->id) }}" method="POST" onsubmit="return confirm('Delete this article?');" class="inline">
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
                                No articles found. Click "Post Article" to create your first article.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($articles->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $articles->links() }}
            </div>
        @endif
    </div>
</div>

@endsection
