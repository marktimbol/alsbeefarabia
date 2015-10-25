<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddMenuRequest;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Menu\MenuRepositoryInterface;

class MenusController extends Controller
{
    protected $category;
    protected $menu;

    public function __construct(CategoryRepositoryInterface $category, MenuRepositoryInterface $menu) {

        parent::__construct();

        $this->category = $category;
        $this->menu = $menu;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = $this->menu->all();

        return view('admin.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category->all();

        return view('admin.menus.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddMenuRequest $request)
    {
        
        $category = $this->category->find($request->category);

        $menu = $category->menus()->create($request->all());

        /**
         * session('filename') => uploaded photo filename
         */
        if( $request->has('featuredImage') ) {

            $this->menu->addPhoto($menu->id, $request->featuredImage);

        }        

        flash()->success('Yay!', 'You have successfully added new Menu.');

        return redirect()->route('admin.menus.index');
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
    public function edit($menu)
    {
        $categories = $this->category->all();

        return view('admin.menus.edit', compact('menu', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddMenuRequest $request, $menu)
    {
        $this->menu->update($menu->id, $request->all());

        if( $request->has('featuredImage') ) {

            $this->menu->updatePhoto($menu->id, $request->featuredImage);

        }        

        flash()->success('Yay!', 'You successfully updated the menu information.');

        return redirect()->route('admin.menus.edit', $menu->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($menu)
    {
        $this->menu->delete($menu->id);

        flash()->success('Yay!', 'You successfully deleted the menu');

        return redirect()->route('admin.menus.index'); 
    }
}
