<x-layout>
    <x-slot:heading>
        Job details
    </x-slot:heading>
     <h1 class="font-bold text-lg">{{$job->salary}}</h1>
    <p>
        This job pays {{$job->salary}} a year.
    </p>


    <div class="mt-4" >
        <x-button href="{{$job->id}}/edit" >
            Edit job
        </x-button>
    </div>

</x-layout>



