<div>


       <div class="container mt-5 pt-10 pl-10">
           <div class="row">
               <!-- component -->
            <div class="grid-cols-2">
                <h2 class="font-bold uppercase text-gray-800">{{Auth::user()->name}}'s Profile</h2>
                <form action="{{route('update.update_avatar')}}" method="POST">


                <div class="py-3 center mx-auto">
    <div class="bg-white px-4 py-5 rounded-lg shadow-lg text-center w-48">
      <div class="mb-4">
        <img class="w-auto mx-auto rounded-full object-cover object-center" src="/images/{{Auth::user()->avatar}}" alt="Avatar Upload" />
      </div>
      <label class="cursor-pointer mt-6">
        <span class="mt-2 text-base leading-normal px-4 py-2 bg-blue-500 text-white text-sm rounded-full" >Select Avatar</span>
        <input type='file' name="avatar" class="hidden" :multiple="multiple" :accept="accept" />
      </label>
      <input type="hidden" name="_token" value="{{ csrf_token()}}">
      <input type ="submit" value="submit" class="mt-2 text-base leading-normal px-4 py-2 bg-blue-500 text-white text-sm rounded-full">
    </div>
  </div>
</form>
   </div>
               {{--
                   <img src="{{url('/images/default.png')}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px; " alt="">

                    <input type="file">
                --}}
           </div>
       </div>


</div>
