@extends('layouts.app')

@section('content')
    <div class="w-2/5">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm grid justify-items-center">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-white">Your Inspections</h2>
        </div>

        <ul role="list" class="divide-y divide-gray-100">
            <li class="flex justify-between gap-x-6 py-5">
                <div class="flex min-w-0 gap-x-4">
                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="https://cdn-icons-png.flaticon.com/512/1946/1946166.png" alt="">
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm font-semibold leading-6 text-white">Turbine Name</p>
                        <p class="mt-1 truncate text-xs leading-5 text-white">Farm Name</p>
                    </div>
                </div>
                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                    <p class="text-sm leading-6 text-white">Nº of components damaged</p>
                    <p class="mt-1 text-xs leading-5 text-white">Inspection date: </p>
                </div>
            </li>
        </ul>
    </div>
@endsection
