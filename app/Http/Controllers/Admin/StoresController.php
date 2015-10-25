<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\AddStoreRequest;
use App\Repositories\Store\StoreRepositoryInterface;
use Illuminate\Http\Request;

class StoresController extends Controller
{

    protected $store;

    public function __construct(StoreRepositoryInterface $store) {

        parent::__construct();

        $this->store = $store;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = $this->store->all();

        return view('admin.stores.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.stores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddStoreRequest $request)
    {
        $store = $this->store->store($request->all());

        if( $request->has('featuredImage') ) {

            $this->store->addPhoto($store->id, $request->featuredImage);

        }

        flash()->success('Yay!', 'You have successfully added new Store.');

        return redirect()->route('admin.stores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($store)
    {
        return view('admin.stores.edit', compact('store'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddStoreRequest $request, $store)
    {

        $this->store->update($store->id, $request->all());

        if( $request->has('featuredImage') ) {

            $this->store->updatePhoto($store->id, $request->featuredImage);

        }

        flash()->success('Yay!', 'You successfully updated the store information.');

        return redirect()->route('admin.stores.edit', $store->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($store)
    {
        $this->store->delete($store->id);

        flash()->success('Yay!', 'You successfully deleted the store');

        return redirect()->route('admin.stores.index'); 
    }
}
