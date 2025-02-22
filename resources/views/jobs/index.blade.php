<x-layout>
    <x-slot:heading>
        Job listings
    </x-slot:heading>

    <div class="space-y-4">
        @foreach($jobs as $job)

            <a href="/jobs/{{$job['id']}}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                <label class="block font-bold text-blue-500 text-sm">
                    {{$job->employer->company}}
                </label>
                <strong>{{$job['title']}} :</strong> Pays  {{$job['salary']}}
            </a>

        @endforeach
            {{$jobs->links()}}
        
    </div>


</x-layout>



