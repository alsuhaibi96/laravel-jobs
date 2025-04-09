<x-layout>
    <x-slot:heading>
        Job details
    </x-slot:heading>
     <h1 class="font-bold text-lg">{{$job->salary}}</h1>
    <p>
        This job pays {{$job->salary}} a year.
    </p>


    <div class="mt-4" >
        @can('edit',$job)
        <x-button href="{{$job->id}}/edit" >
            Edit job
        </x-button>
        @endcan
    </div>

</x-layout>



