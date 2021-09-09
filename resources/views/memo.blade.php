<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Memo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white h-screen overflow-hidden shadow-xl sm:rounded-lg">

                <!-- memo frame -->
                <div class="h-full bg-white">
                    <div class="container w-full h-full flex flex-wrap mx-auto">

                        <div class="w-1/4 h-full m-0 p-4 border-left border-right bg-gray-50 border-r border-gray-300">
                            <div class="flex justify-between pt-2">
                                <div class="">
                                    {{ $name }}
                                </div>
                                <div class=" pr-1">
                                    <a href="{{ route('memo.store') }}" class="bg-green-500 text-white inline-block h-6 w-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                        </svg></a>
                                    <a href="" class="bg-gray-500 text-white inline-block h-6 w-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="">
                                メモリスト
                            </div>
                            <div class=" left-memo-list list-group-flush p-0">

                                @if ($memos->count() === 0)
                                <div class="pl-3 pt-3 h5 text-info text-center">
                                    <i class="far fa-surprise"></i>メモがありません。
                                </div>
                                @endif

                                @foreach ($memos as $memo)
                                <a href="{{ route('memo.select', ['id' => $memo->id]) }}" class="bg-gray-100 block px-8 py-6 border-b border-gray-300 @if ($select_memo) {{ $select_memo->id == $memo->id ? 'active' : '' }} @endif ">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="text-sm text-gray-700 pb-2">{{ $memo->title }} </h5>
                                        <p class="text-xs text-gray-600 pb-4">
                                            @if (50 >= mb_strlen($memo->content))
                                            {{ $memo->content }}
                                            @else
                                            {{ mb_substr($memo->content, 0, 50) . '...' }}
                                            @endif
                                        </p>
                                        <p class="text-xs text-gray-400">{{ date('Y/m/d H:i', strtotime($memo->updated_at)) }}</p>
                                    </div>
                                </a>
                                @endforeach

                            </div>
                        </div>

                        <div class="w-3/4 h-full m-0 p-4">

                            <!-----ここから追加する----->
                            @if ($select_memo)
                            <form class="w-full h-full" method="post">
                                @csrf
                                <input type="hidden" name="edit_id" value="{{ $select_memo->id }}" />
                                <div id="memo-menu">
                                    <button type="submit" class="bg-red-500 text-white inline-block h-6 w-6" formaction="{{ route('memo.delete') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                    <button type="submit" class="bg-gray-500 text-white inline-block h-6 w-6" formaction="{{ route('memo.update') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                                        </svg>
                                    </button>
                                </div>
                                <input type="text" id="memo-title" name="edit_title" placeholder="タイトルを入力する..." value="{{ $select_memo->title }}" />
                                <textarea id="memo-content" name="edit_content" placeholder="内容を入力する...">{{ $select_memo->content }}</textarea>
                            </form>
                            @else
                            <div class="mt-3 alert alert-info">
                                <i class="fas fa-info-circle"></i>メモを新規作成するか選択してください。
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
                <!-- /memo frame -->

            </div>
        </div>
    </div>
</x-app-layout>