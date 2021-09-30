<x-app-layout>
    <div class="w-full px-4 mx-auto mt-24 mb-12 xl:w-8/12 xl:mb-0">
        @if (session()->has('article.destroyed'))
        <x-flash>
            {{ session('article.destroyed') }}
        </x-flash>
    @endif
        <div class="relative flex-1 flex-grow w-full max-w-full px-4 text-right">
            <a href="{{ route('dashboard') }}">
                <button class="px-3 py-1 mb-1 mr-1 text-xs font-bold text-white uppercase transition-all duration-150 ease-linear bg-indigo-500 rounded outline-none active:bg-indigo-600 focus:outline-none" type="button">Back to Dashboard index</button>
            </a>
        </div>
        <div class="relative flex flex-col w-full min-w-0 mb-6 break-words bg-white rounded shadow-lg ">
            <div class="px-4 py-3 mb-0 border-0 rounded-t">
                <div class="flex flex-wrap items-center">
                    <div class="relative flex-1 flex-grow w-full max-w-full px-4">
                        <h3 class="text-base font-semibold text-blueGray-700">Articles</h3>
                    </div>
                    <div class="relative flex-1 flex-grow w-full max-w-full px-4 text-right">
                        <a href="{{ route('auth.articles.create') }}">
                            <button class="px-3 py-1 mb-1 mr-1 text-xs font-bold text-white uppercase transition-all duration-150 ease-linear bg-indigo-500 rounded outline-none active:bg-indigo-600 focus:outline-none" type="button">Create</button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="block w-full overflow-x-auto">
                <table class="items-center w-full bg-transparent border-collapse ">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid bg-blueGray-50 text-blueGray-500 border-blueGray-100 whitespace-nowrap">
                                Title
                            </th>
                            <th class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid bg-blueGray-50 text-blueGray-500 border-blueGray-100 whitespace-nowrap">
                                Created At
                            </th>
                            <th class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid bg-blueGray-50 text-blueGray-500 border-blueGray-100 whitespace-nowrap"></th>
                            <th class="px-6 py-3 text-xs font-semibold text-left uppercase align-middle border border-l-0 border-r-0 border-solid bg-blueGray-50 text-blueGray-500 border-blueGray-100 whitespace-nowrap"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($articles as $article)
                            <tr>
                                <td class="p-4 px-6 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 wditespace-nowrap text-blueGray-700 ">
                                    <a href="{{ $article->url }}">{{ $article->title }}</a>
                                </th>
                                <td class="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap ">
                                    {{ $article->created_at }}
                                </td>
                                <td class="p-4 px-6 text-xs border-t-0 border-l-0 border-r-0 align-center whitespace-nowrap">
                                    <a href="{{ route('auth.articles.edit', $article) }}">edit</a>
                                </td>
                                <td class="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                    <x-form method="DELETE" action="{{ route('auth.articles.destroy', $article) }}">
                                        <div>
                                            <button class="bg-indigo-400 text-white rounded py-2 px-4 hover:bg-indigo-500" type="submit">
                                                Delete
                                            </button>
                                        </div>
                                    </x-form>
                                </td>
                            </tr>
                        @empty
                            There aren't any articles, create your first one! {{-- give it some style --}}
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $articles->links() }}
        </div>
    </div>
</x-app-layout>