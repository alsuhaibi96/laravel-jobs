<x-layout>
    <x-slot:heading>
        Job details
    </x-slot:heading>
     <h1 class="font-bold text-lg">{{$job['title']}}</h1>
    <p>
        This job pays {{$job['salary']}} a year.
    </p>

</x-layout>



