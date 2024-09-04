@extends('backend.master')
@section('content')
    <div class=" max-w-2xl mt-6 p-4 mx-auto px-7  bg-white rounded-lg mb-12 shadow">
        <div class=" flex items-center justify-between py-3 ">
            <h2 class=" text-xl font-semibold">Edit Slide</h2>
            <a class=" inline-block bg-blue-500 text-white font-semibold px-5 py-2 rounded-md"
                href="{{ route('slide.index') }}">Back</a>
        </div>
        <form action="{{ route('slide.update',$slide->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="grid gap-4">
                <!-- Grid -->
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        @error('title')
                            <div class="error text-red-600">{{ $message }}</div>
                        @enderror
                        <input type="text" id="hs-lastname-contacts-1"
                            class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Slide Title" name="title" value="{{$slide->title}}">
                    </div>
                </div>
                <!-- End Grid -->
                @error('image')
                <div class="error text-red-600">{{ $message }}</div>
            @enderror
                <div class="flex items-end justify-between">
                    <input name="image" class="w-full" type="file">
                    <div>
                        <img class="w-24" src="{{asset('website/image/'.$slide->image)}}" alt="">
                    </div>
                </div>

                <div>
                    @error('description')
                        <div class="error text-red-600">{{ $message }}</div>
                    @enderror
                    <textarea id="hs-about-contacts-1" name="description" rows="4"
                        class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                        placeholder="Description">{{$slide->description}}</textarea>
                </div>
            </div>
            <!-- End Grid -->

            <div class="mt-4 grid">
                <button type="submit"
                    class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Update
                    Slide</button>
            </div>

        </form>
    </div>
@endsection
