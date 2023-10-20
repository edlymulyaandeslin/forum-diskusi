<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;


class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.forum.index', [
            'questions' => Question::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.forum.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:questions',
            'category_id' => 'required',
            'desc' => 'required',
            'image' => 'image|file|max:1024'
        ]);

        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('post-images');
        }

        $validateData['user_id'] = auth()->user()->id;

        Question::create($validateData);

        return redirect('/dashboard/forum')->with('success', 'New question added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $question = Question::find($id);

        return view('dashboard.forum.show', [
            'question' => $question,
            'comments' => Comment::where('question_id', $id)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $questions = Question::find($id);

        return view('dashboard.forum.edit', [
            'questions' => $questions,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {

        $question = Question::find($id);

        $rules = [
            'title' => 'required',
            'category_id' => 'required',
            'desc' => 'required',
            'image' => 'image|file|max:1024'
        ];

        if ($request->slug != $question->slug) {
            $rules['slug'] =   'required|unique:questions';
        }

        $validateData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('post-images');
        }

        $validateData['user_id'] = auth()->user()->id;

        Question::where('id', $question->id)->update($validateData);

        return redirect('/dashboard/forum')->with('success', 'Question has been updated!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $question = Question::find($id);

        if ($question->image) {
            Storage::delete($question->image);
        }

        Comment::where('question_id', $id)->delete();

        Question::destroy($id);

        return redirect()->back()->with('success', 'Question deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Question::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}