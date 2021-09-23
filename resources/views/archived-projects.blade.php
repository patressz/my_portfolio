@extends('dashboard-master')

@section('dashboard-content')
    <h4 class="text-center">Archived projects</h4>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                @forelse ($projects as $project)
                    <div class="col-md-6 my-3">
                        <div class="dropdown d-flex justify-content-end">
                            <button class="ellipsis btn shadow-none" type="button" id="dropdownB-{{ $project->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class='bx bx-dots-vertical-rounded'></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownB-{{ $project->id }}">
                                <li><a class="dropdown-item" href="{{ route('edit.project', $project->id) }}">Edit</a></li>
                                <li><a class="dropdown-item" href="{{ route('delete.project', $project->id) }}">Delete</a></li>
                                <li>
                                    <form method="POST" action="{{ route('archive.project', $project->id) }}" class="my-0">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="0">
                                        <a class="dropdown-item" href="{{ route('archive.project', $project->id) }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                            Unarchive
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <div class="card mb-3 shadow-lg">
                            <a href="{{ route('edit.project', $project->id) }}">
                                <img src="{{ asset('storage/thumbnail/' . $project->image ) }}" class="cover card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $project->title }}</h5>
                                <p class="card-text">{{ $project->content }}</p>
                                <p class="card-text"><small class="text-muted">Last updated {{ $project->updated_at->diffforhumans() }}</small></p>
                            </div>

                        </div>
                    </div>

                @empty
                    <div class="col-md-12">
                        <h5>Nothing to show:/</h5>
                    </div>
                @endforelse
                {{ $projects->links() }}
            </div>
        </div>
    </div>
@endsection
