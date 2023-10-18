<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardForumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.index', [
            'questions' => Question::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('dashboard.create', [
        //     'categories' => Category::all()
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validateData = $request->validate([
        //     'title' => 'required',
        //     'slug' => 'required|unique:questions',
        //     'category_id' => 'required',
        //     'desc' => 'required',
        //     'image' => 'image|file|max:1024'
        // ]);

        // if ($request->file('image')) {
        //     $validateData['image'] = $request->file('image')->store('post-images');
        // }

        // $validateData['user_id'] = auth()->user()->id;

        // Question::create($validateData);

        // return redirect('/dashboard')->with('success', 'Pertanyaan anda berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // $question = Question::find($id);

        // return view('dashboard.show', [
        //     'question' => $question,
        //     'comments' => Comment::where('question_id', $id)->get()
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //
    }

    // public function checkSlug(Request $request)
    // {
    //     $slug = SlugService::createSlug(Question::class, 'slug', $request->title);
    //     return response()->json(['slug' => $slug]);
    // }
}