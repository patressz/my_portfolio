@extends('dashboard-master')

@section('dashboard-content')
    <h4 class="text-center">Add new project</h4>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('store.project') }}" method="post" enctype="multipart/form-data">
                @csrf
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
                    <input type="text" class="form-control" id="url" name="url" value="{{ old('url') }}">
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                    @error('title')
                        <div class="invalid-feedback d-inline-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" id="content" rows="3" name="content">{{ old('content') }}</textarea>
                    @error('content')
                        <div class="invalid-feedback d-inline-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="button" class="btn btn-primary" onclick="this.disabled=true;this.innerText='Sending, please wait...';this.form.submit();">Submit</button>

            </form>
        </div>
    </div>
@endsection
