<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
     <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Category form</h3>
                </div>
                @if($errors->any())
                <p class="mt-2" style="background: red">
                    {{$errors->first()}}
                </p>
                @endif
                @if(session('success'))
                    <p class="mt-2" style="background: #0A9E67">
                        {{session()->get('success', 'Успешно')}}
                    </p>
                @endif
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                    @if($item->exists)
                        <form action="{{route('blog.admin.categories.update', $item->id)}}" method="POST">
                        @method('PATCH')
                    @else
                        <form action="{{route('blog.admin.categories.store')}}" method="POST">
                    @endif

                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="title" class="block text-sm font-medium text-gray-700">Заголовок</label>
                                    <input value="{{$item->title}}" type="text" name="title" id="title" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="slug" class="block text-sm font-medium text-gray-700">Идентификатор</label>
                                    <input value="{{$item->slug}}" type="text" name="slug" id="slug" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="parent_id" class="block text-sm font-medium text-gray-700">Родитель</label>
                                    <select required id="parent_id" name="parent_id"  class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @foreach($categoryList as $category)
                                        <option value="{{$category->id}}" @if($category->id == $item->parent_id)selected @endif>
                                            {{$category->id.' '.$category->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Сохранить
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>