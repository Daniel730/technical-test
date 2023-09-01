@extends('layouts.app')

@section('content')
    <div class="w-full px-4">
        <div class="sm:mx-auto p-4 sm:w-full sm:max-w-sm grid justify-items-center">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-white">Your Turbines</h2>
        </div>

        <div class="grid grid-cols-1 gap-2 sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4">
            @foreach ($turbines as $turbine)
                <div class="flex flex-col justify-between px-1 items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <div class="flex flex-col justify-between p-1 leading-normal w-full">
                        <div class="flex flex-row justify-between">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ substr($turbine->uuid, 0, 8) }}</h5>
                            <a href="{{ route('edit-turbine', ['id' => $turbine->id]) }}" class="text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center mr-2 mb-2 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900">
                                Edit
                            </a>
                            <a href="{{ route('new-inspection', ['turbine_id' => $turbine->id]) }}" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">
                                New Inspection
                            </a>
                        </div>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Lat: {{ unserialize($turbine->location)['latitude'] }}</p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Lon: {{ unserialize($turbine->location)['longitude'] }}</p>
                        <div class="flex flex-col">
                            <div class="flex flex-row">
                                @foreach ($turbine->inspection as $inspection)
                                    <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ $inspection->component->name }}: {{ $inspection->grade }}</span>
                                @endforeach
                            </div>
                            <div class="flex flex-row">
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ _("Last Update: ".$lastUpdate) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
