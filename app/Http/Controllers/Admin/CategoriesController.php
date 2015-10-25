<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddCategoryRequest;
use App\Repositories\Category\CategoryRepositoryInterface;

class CategoriesController extends Controller
{   

    protected $category;

    public function __construct(CategoryRepositoryInterface $category) {

        parent::__construct();

        $this->category = $category;

    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->category->all();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddCategoryRequest $request)
    {

        $category = $this->category->store($request->all());

        if( $request->has('featuredImage') ) {

            $this->category->addPhoto($category->id, $request->featuredImage);

        }

        flash()->success('Yay!', 'You have successfully added new Menu Category.');

        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddCategoryRequest $request, $category)
    {   
        $this->category->update($category->id, $request->all());

        if( $request->has('featuredImage') ) {

            $this->category->updatePhoto($category->id, $request->featuredImage);

        }

        flash()->success('Yay!', 'You successfully updated the category information.');

        return redirect()->route('admin.categories.edit', $category->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category)
    {
        $this->category->delete($category->id);

        flash()->success('Yay!', 'You successfully deleted the category');

        return redirect()->route('admin.categories.index');        
    }
}
