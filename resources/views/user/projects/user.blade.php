<x-layout>

    <div class="flex flex-col justify-center py-10 gap-3 ">
        <div class="flex mx-auto justify-center text-center border-transparent border-2 py-10 px-3 flex-col gap-3 max-w-1/3  rounded-xl max-w-sm shadow-xl  hover:border-black ">
         
            <div class="name">
                <p>username:</p>
                <p class="text-2xl  font-bold">{{$user->name}}</p>
            </div>
               
                <div class="email">
                    <p>email:</p>
                   <a class="p-1 mt-1 rounded border-transparent border-2 font-bold hover:border-endless-oasis" href="mailto:{{$user->email}}">{{$user->email}}</a> 
                </div>
               
                
        </div>
        <a class="btn-primary max-w-min mx-auto" href="{{URL::previous()}}">Back</a>
    </div>

</x-layout>