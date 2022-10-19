<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-4 mt-5 sm:px-6 lg:px-8">
        <div class="grid grid-cols-4 gap-4 w-100 bg-gray-100">

            <div class="p-10 border border-blue-600 bg-blue-100">Sidebar</div>

            <div class="col-span-3 p-10 border border-blue-600 bg-blue-100">
              Content
            </div>
            
          </div>
    </div>
</x-app-layout>
