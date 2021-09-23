<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Project;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProjectRequest;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        $users = User::all();
        return view('dashboard')->with( compact('projects', 'users') );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function projects()
    {
        $projects = Project::where('archived', 0)->paginate(10);
        return view('projects')->with( compact('projects') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add-projects');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        if ( $request->hasFile('image') && $request->file('image')->isValid()  ) {
            $filepath = storage_path('app/public/image');
            $timestamp = time();
            $filename = $timestamp . "-" .$request->file('image')->getClientOriginalName();
        }

        if ( $request->url ) {
            if(!filter_var($request->url, FILTER_VALIDATE_URL)) {
                $request->url = "http://". $request->url;
            }
        }

        $project = Project::create([
            'image' => $filename,
            'title' => $request->title,
            'content' => $request->content,
            'url' => $request->url,
        ]);

        // $request->file('image')->move($filepath, $filename);
        // $request->file('thumbnail')->move($filepath2, $filename2);

        $img = Image::make( $request->file('image') );
        $img->save ( storage_path().'/app/public/image/'.$filename, 60 );

        $img = Image::make( $request->file('image') );
        $img->fit(634, 300, null, 'top');
        $img->save ( storage_path().'/app/public/thumbnail/'.$filename, 70 );

        return redirect()->route('projects')->withStatus('Project successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view('delete-project')->with( compact('project') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('edit-project')->with( compact('project') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, $id)
    {
        $project = Project::findOrFail($id);

        if ( $request->hasFile('image') && $request->file('image')->isValid() ) {
            $filepath = storage_path('app/public/image');
            $timestamp = time();
            $filename = $timestamp . "-" .$request->file('image')->getClientOriginalName();

            if ( Storage::exists('public/image/' . $project->image ) ) {
                Storage::delete('public/image/' . $project->image);
            }

            if ( Storage::exists('public/thumbnail/' . $project->image ) ) {
                Storage::delete('public/thumbnail/' . $project->image);
            }

            // $request->file('image')->move($filepath, $filename);

            $img = Image::make( $request->file('image') );
            $img->save ( storage_path().'/app/public/image/'.$filename, 60 );

            $img = Image::make( $request->file('image') );
            $img->fit(634, 300, null, 'top');
            $img->save ( storage_path().'/app/public/thumbnail/'.$filename, 70 );
        }

        if ( !$request->hasFile('image') ) {
            $filename = $project->image;
        }

        if ( $request->url ) {
            if(!filter_var($request->url, FILTER_VALIDATE_URL)) {
                $request->url = "http://". $request->url;
            }
        }

        $project->update([
            'image' => $filename,
            'title' => $request->title,
            'content' => $request->content,
            'url' => $request->url,
        ]);

        return redirect()->route('projects')->withStatus('Project successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        if ( Storage::exists('public/image/' . $project->image ) ) {
            Storage::delete('public/image/' . $project->image);
        }

        if ( Storage::exists('public/thumbnail/' . $project->image ) ) {
            Storage::delete('public/thumbnail/' . $project->image);
        }

        $project->delete();

        return redirect()->route('projects')->withStatus('Project successfully deleted!');
    }

    public function archive(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $project->update([
            'archived' => $request->status,
        ]);

        if ( $request->status == 0 ) {
            return redirect()->route('projects')->withStatus('Project successfully unarchived!');
        } else {
            return redirect()->route('projects')->withStatus('Project successfully archived!');
        }

    }

    public function archived_projects()
    {
        $projects = Project::where('archived', 1)->paginate(6);
        return view('archived-projects')->with( compact('projects') );
    }
}
