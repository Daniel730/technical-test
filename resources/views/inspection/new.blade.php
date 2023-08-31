@extends('layouts.app')

@section('content')
    <div class="w-full px-4">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-white">New Inspection</h2>
        <h2 class="text-center text-2xl font-bold leading-9 tracking-tight text-white">Turbine: Name</h2>

        <form method="POST" action="{{ route('store-inspection') }}" class="mt-10 sm:mx-auto p-4 sm:w-full sm:max-w-sm grid justify-items-center">
            @csrf
            <input type="hidden" value="{{ $turbine_id }}" name="turbine_id">
            @foreach ($components as $component)
                <div>
                    <label for="{{ $component->name }}" class="block mb-2 text-sm font-medium text-white dark:text-white">{{ $component->name }}</label>
                    <input id="{{ $component->name }}" name="grades[]" type="range" min="1" max="5" value="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700" oninput="this.nextElementSibling.innerHTML = this.value">
                    <label class="block mb-2 text-sm font-medium text-white dark:text-white">1</label>
                    <input type="hidden" value="{{ $component->id }}" name="component_ids[]">
                </div>
            @endforeach
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>
@endsection
