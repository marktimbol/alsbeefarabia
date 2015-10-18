<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Repositories\Slide\SlideRepositoryInterface;
use Illuminate\Http\Request;

class SlidesController extends Controller
{

    protected $slide;

    protected $slidesDirectory = '/images/uploads/slides/';

    public function __construct(SlideRepositoryInterface $slide) {

        parent::__construct();

        $this->slide = $slide;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $slides = $this->slide->all();

        return view('admin.slides.index', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slides.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $slide = $this->slide->store($request->all());

        /**
         * session('filename') => uploaded photo filename
         */
        if( ! empty(session('filename' )) ) {

            $this->slide->addPhoto($slide->id, session('filename'));

        }

        flash()->success('Yay!', 'You have successfully added new Slide.');

        return redirect()->route('admin.slides.index');

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
    public function edit($slide)
    {
        return view('admin.slides.edit', compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slide)
    {
        $this->slide->update($slide->id, $request->all());

        flash()->success('Yay!', 'You successfully updated the slide information.');

        return redirect()->route('admin.slides.edit', $slide->id);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slide)
    {
        $this->slide->delete($slide->id);

        flash()->success('Yay!', 'You successfully deleted the slide');

        return redirect()->route('admin.slides.index');   
    }
}
