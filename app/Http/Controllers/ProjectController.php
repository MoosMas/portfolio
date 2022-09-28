<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Project;
use App\Models\ProjectTag;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('projects.index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allTags = Tag::all();

        $tags = $this->formatTags($allTags);
        
        return view('projects.create')
            ->with(['tags'=> $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'images' => 'required',
            'images.*' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $project = new Project();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->is_highlighted = $request->highlight;
        $project->save();

        if($request->hasfile('images'))
        {
            foreach($request->file('images') as $key => $file)
            {
                $name = $file->getClientOriginalName();
                
                $path = $file->storeAs('images', $file->hashName());

                $image = new Image();
                $image->name = $name;
                $image->path = $path;
                $image->project_id = $project->id;
                $image->save();
            }
        }
        
        if($request->filled('tags')) {
            foreach ($request->tags as $tag) {
                $projectTag = new ProjectTag();
                $projectTag->project_id = $project->id;
                $projectTag->tag_id = $tag;
                $projectTag->save();
            }
        }
        
        return redirect()->route('projects.index')
            ->with('success', 'Project aangemaakt');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);

        $allTags = $this->formatTags(Tag::all());
        
        $projectTags = $this->formatTags($project->tags);
        
        return view('projects.edit')
            ->with(['project'=>$project, 'projectTags'=>$projectTags, 'allTags'=>$allTags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'images' => 'nullable',
            'images.*' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);
        
        $allTags = Tag::all();
        $project = Project::find($id);
        
        $project->title = $request->title;
        $project->description = $request->description;
        $project->is_highlighted = $request->highlight;
        $project->save();

        if($request->hasfile('images'))
        {
            foreach($request->file('images') as $key => $file)
            {
                $name = $file->getClientOriginalName();

                $path = $file->storeAs('images', $file->hashName());

                $image = new Image();
                $image->name = $name;
                $image->path = $path;
                $image->project_id = $project->id;
                $image->save();
            }
        }

        if($request->filled('tags')) {
            
            foreach ($allTags as $tag) {     
                
                // Check if project has tag
                if ($project->tags->contains('id', $tag->id)){
                    if (!in_array($tag->id, $request->tags)){
                        // Tag link verwijderen
                        $linkedTag = DB::table('project_tag')
                            ->where('project_id', '=', $project->id)
                            ->where('tag_id', '=', $tag->id)
                            ->delete();
                    }
                }
                // If project doesn't have tag
                else {
                    if (in_array($tag->id, $request->tags)){
                        // Tag toevoegen aan project
                        $projectTag = new ProjectTag();
                        $projectTag->project_id = $project->id;
                        $projectTag->tag_id = $tag->id;
                        $projectTag->save();
                    }
                }
            }
        }

        return redirect()->route('projects.index')
            ->with('success', 'Project aangemaakt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function formatTags($tags)
    {
        return $tags->map(function ($tag) {
            return ['id' => $tag->id, 'text' => $tag->tag];
        })->toArray();
    }
}
