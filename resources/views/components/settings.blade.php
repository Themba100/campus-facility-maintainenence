<div>

    <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
        <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Account settings</h2>
        @if(Session::has('Account updated successifully'))
            <div class="alert alert-success">
                {{Session::get('Account updated successifully')}}
            </div>
        @endif

        <form action="{{route('profile.insertdata')}}" method ="POST">
          @csrf
            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="first_name">First Name</label>
                    <input  name="first_name" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" required>
                </div>

                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="last_name">last Name</label>
                    <input name="last_name" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" required>
                </div>

          <div>
                    <label class="text-gray-700 dark:text-gray-200" for="Gender">Gender</label>

                    <select name="gender" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" required>
                        <option value="student">Male</option>
                        <option value="staff">Female</option>
                    </select>
                </div>


                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="reg_number">Registration Number</label>
                    <input   name="reg_number" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" required>
                </div>

                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="reg_number">Contact</label>
                    <input   name="contact" type="number" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" required>
                </div>
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="image">Image</label>
                    <input  type="file"  name="image" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" required>
                </div>

                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="program_of_study">Program Of Study</label>
                    <input   name="p_of_study" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" required>
                </div>
            </div>

            <div class="flex justify-end mt-6">
                <button type="submit" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-green-500 rounded-md hover:bg-green-700 focus:outline-none focus:bg-gray-600">Save</button>
            </div>
        </form>
    </section>
</div>
