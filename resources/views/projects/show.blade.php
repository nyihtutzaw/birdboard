@extends("layouts.app")

@section("content")
    <div class="container mx-auto">
            <header class="flex items-center mb-3 py-3">
                    <div class="flex justify-between w-full item-center">
                        <h2 class="text-gray text-sm">
                            <a href="/home">My Project</a> / {{ $project->title }}
                        </h2>
                        <a href="/projects/create" class="button py-2 px-5">Add Project</a>
                    </div>
            </header>
            <main>
                <div class="flex -mx-3">
                    <div class="lg:w-3/4 px-3">
                        <div class="mb-8">
                            <h2 class="text-grey font-normal text-lg mb-3">Tasks</h2>
                            @foreach ($project->tasks as $task)
                                <div class="bg-white mr-4 rounded shadow p-3 mb-2">{{ $task->body }}</div>
                            @endforeach
                          
                        </div>
                        <div>
                            <h2 class="text-grey font-normal text-lg mb-3">General Notes</h2>
                            <textarea class="bg-white mr-4 rounded shadow p-5 w-full" style="min-height:150px;">Bkag Blah</textarea>
                        </div>
                    
                    </div>
                    <div class="w-1/4 px-3">
                        @include ("projects.card")
                    </div>
                </div>
            </main>
        
    </div>
    
@endsection
