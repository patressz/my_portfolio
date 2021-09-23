@extends('dashboard-master')

@section('dashboard-content')
    <h4 class="text-center">Project</h4>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="row">
                <form action="{{ route('update.project', $project->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="file" class="form-label">Image</label>
                        <input class="form-control" type="file" id="file" name="image">
                        @error('image')
                            <div class="invalid-feedback d-inline-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="url" class="form-label">Url</label>
                        <input type="text" class="form-control" id="url" name="url" value="{{ $project->url }}">
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $project->title }}">
                        @error('title')
                            <div class="invalid-feedback d-inline-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control" id="content" rows="3" name="content">{{ $project->content }}</textarea>
                        @error('content')
                            <div class="invalid-feedback d-inline-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success" onclick="this.disabled=true;this.innerText='Saving, please wait...';this.form.submit();">Save</button>
                    <button type="button" class="btn btn-link" onclick="window.location.href='{{ route('projects') }}'">Cancel</button>

                </form>
            </div>
        </div>
    </div>
@endsection
