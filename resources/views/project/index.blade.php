<x-site-layout>
    <div class="flex flex-row flex-wrap ">
        @foreach ($projects as $project)
        <x-project-card :project="$project" />
        @endforeach

    </div>

</x-site-layout>
