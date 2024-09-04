@extends('backend.master')

@section('content')

    <div class=" max-w-2xl mt-6 p-4 mx-auto px-7  bg-white rounded-lg mb-12 shadow">
        @if (session('status'))
            <div class="bg-green-500 text-xl text-center py-2 text-white font-semibold rounded">
                {{ session('status') }}
            </div>
        @endif
        <div class=" flex items-center justify-between py-3 ">
            <h2 class=" text-xl font-semibold">Create Slide</h2>
            <a class=" inline-block bg-blue-500 text-white font-semibold px-5 py-2 rounded-md"
                href="{{ route('slide.index') }}">Back</a>
        </div>

        <form action="{{ route('slide.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid gap-4">
                <!-- Grid -->
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        @error('title')
                            <div class="error text-red-600">{{ $message }}</div>
                        @enderror
                        <input type="text" id="hs-lastname-contacts-1"
                            class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Slide Title" name="title">
                    </div>
                </div>
                <!-- End Grid -->
                <div>
                    @error('image')
                        <div class="error text-red-600">{{ $message }}</div>
                    @enderror
                    <input name="image" class="w-full" type="file">
                </div>

                <div>
                    @error('description')
                        <div class="error text-red-600">{{ $message }}</div>
                    @enderror
                    <textarea id="hs-about-contacts-1" name="description" rows="4"
                        class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                        placeholder="Description"></textarea>
                </div>
            </div>
            <!-- End Grid -->

            <div class="mt-4 grid">
                <button type="submit"
                    class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Create
                    Slide</button>
            </div>

        </form>
    </div>
@endsection
