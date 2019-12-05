<div class="bg-white mr-4 rounded shadow p-5" style="height:200px;">
        <p class="text-xl text-black-300 py-4 -ml-5 border-l-4 border-blue-300 pl-4 mb-3">
            <a href="{{ $project->path() }}">
                    {{ $project->title }}
            </a>
        </p>
        <div class="text-gray-500">
            {{  \Illuminate\Support\Str::limit($project->description,100)  }}
        </div>
</div>