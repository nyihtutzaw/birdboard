@extends('layouts.app')

@section('content')
    
        <div class="container mx-auto">

            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div>
                <header class="flex items-center mb-3 py-3">
                    <div class="flex justify-between w-full item-center">
                        <h2 class="text-gray text-sm">My Project</h2>
                        <a href="/projects/create" class="button py-2 px-5">Add Project</a>
                    </div>
                </header>

                <div class="flex flex-wrap mt-5 -mx-3">
                    @foreach ($projects as $project)
                        <div class="lg:w-1/3 px-3 pb-6 rounded-lg">
                            @include ("projects.card")
                        </div>
                    
                    @endforeach
                </div>

           
            </div>
        </div>
    
@endsection

