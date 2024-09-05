@extends('backend.master')
@section('content')
    <div class=" w-11/12 bg-white mt-6 p-4 rounded-lg mx-auto">
        <div class=" flex items-center justify-between py-3">
            <h2 class=" text-xl font-semibold">Service List</h2>
            <a class=" inline-block bg-blue-500 text-white font-semibold px-5 py-2 rounded-md"
                href="{{ route('service-feature.create') }}">Create Service</a>
        </div>

        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="border rounded-lg overflow-hidden dark:border-neutral-700">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                            <thead class="bg-gray-50 dark:bg-neutral-700">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Name</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Image</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                @foreach ($servicesf as $servicef)
                                    <tr>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                            {{ $servicef->name }}</td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                            <img class="w-10 rounded" src="{{asset('website/image/'.$servicef->image)}}" alt="">
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                            <a class=" bg-blue-400 py-1 px-2 rounded inline-block text-white"
                                                href="{{ route('service-feature.edit',$servicef->id) }}"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                            <a class=" bg-gray-100 py-1 px-2 rounded inline-block text-blak"
                                                href="{{ route('service-feature.destroy', $servicef->id) }}"><i
                                                    class="fa-regular fa-eye"></i></a>
                                        <form class="inline-block" action="{{route('service-feature.destroy',$servicef->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="bg-red-400 py-1 px-2 rounded inline-block text-white" type="submit"><i class="fa-solid fa-trash"></i></button>
                                        </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
