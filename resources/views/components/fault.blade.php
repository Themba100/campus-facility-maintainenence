@extends('layout.master')
@section('content')
<div>
        @if(Session::has('The fault has been reported successifully'))
        <div class="alert alert-success">
            {{Session::get('The fault has been reported successifully')}}
        </div>
        @endif

            <form action="{{route('staff.report')}}" method="POST">
               @csrf
    
    <section class="w-full max-w-2xl px-6 py-4 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
        <h2 class="text-3xl font-semibold text-center text-gray-800 dark:text-white">Fault Report</h2>
        <p class="mt-3 text-center text-gray-600 dark:text-gray-400">Raise your issues here</p>

        <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 md:grid-cols-3">
          

         
        </div>

        <div class="mt-6 ">
            <div class="items-center -mx-2 md:flex">
                <div class="w-full mx-2">
                    <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" >Fault name</label>

                    <input name="fault_name" class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" type="text" required>
                </div>

                <div class="w-full mx-2 mt-4 md:mt-0">
                    <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200">category</label>
                    <select name="category" id="" class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" required>
                    <option value="electric_fault">Electric Fault</option>
                    <option value="broken_utilities">Broken Utilities</option>
                    <option value="washrooms">Washrooms</option>
                    </select>
                    <!-- <input name="category" class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" type="text" required> -->
                </div>
                 <div class="w-full mx-2 mt-4 md:mt-0">
                    <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200">Location</label>

                    <input name="location" class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" type="text" required>
                </div>
            </div>

            <div class="w-full mt-4">
                <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200">Description</label>

                <textarea name="description" class="block w-full h-40 px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" required></textarea>
            </div>

            <div class="flex justify-center mt-6">
                <button type="submit" class="px-4 py-2 text-white transition-colors duration-200 transform bg-green-900 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Submit</button>
            </div>
        </div>
    </section>
</form>
</div>
@endsection