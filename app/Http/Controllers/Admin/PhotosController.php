<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Menu\MenuRepositoryInterface;
use App\Repositories\Slide\SlideRepositoryInterface;
use App\Repositories\Store\StoreRepositoryInterface;
use Illuminate\Http\Request;
use Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PhotosController extends Controller
{

	protected $uploadsDirectory = '/images/uploads/';


    protected $category;

    protected $menu;

    protected $slide;

    protected $store;


    public function __construct(
        CategoryRepositoryInterface $category,
        MenuRepositoryInterface $menu,
        SlideRepositoryInterface $slide,
        StoreRepositoryInterface $store)
    {
        
        $this->category = $category;

        $this->menu = $menu;

        $this->slide = $slide;

        $this->store = $store;

    }

    public function uploadCategoryPhoto(Request $request) {

        
        if( $request->hasFile('photo') ) {

            $file = $request->file('photo');

            $filename = $this->makeThumbnail($file);

            /**
             * admin/categories/edit.blade.php
             */
            if( $request->has('category_id') ) {
                
                return $this->category->updatePhoto($request->category_id, $filename);
            }
            
            session(['filename' => $filename]);

        }

    }       

    public function uploadMenuPhoto(Request $request) {
        
        if( $request->hasFile('photo') ) {

            $file = $request->file('photo');

            $filename = $this->makeThumbnail($file);

            /**
             * admin/menus/edit.blade.php
             */
            if( $request->has('menu_id') ) {
                
                return $this->menu->updatePhoto($request->menu_id, $filename);
            }            

            session(['filename' => $filename]);

        }

    }  

    public function uploadSlidePhoto(Request $request) {
        
        if( $request->hasFile('photo') ) {

            $file = $request->file('photo');

            $filename = time() . '-' . $file->getClientOriginalName();

            $file->move(public_path($this->uploadsDirectory), $filename);

            /**
             * admin/menus/edit.blade.php
             */
            if( $request->has('slide_id') ) {
                
                return $this->slide->updatePhoto($request->slide_id, $filename);
            }            

            session(['filename' => $filename]);

        }

    }   

    public function uploadStorePhoto(Request $request) {
        
        if( $request->hasFile('photo') ) {

            $file = $request->file('photo');

            $filename = time() . '-' . $file->getClientOriginalName();

            $file->move(public_path($this->uploadsDirectory), $filename);

            /**
             * admin/menus/edit.blade.php
             */
            if( $request->has('store_id') ) {
                
                return $this->store->updatePhoto($request->store_id, $filename);
            }            

            session(['filename' => $filename]);

        }

    }          


    protected function makeThumbnail(UploadedFile $photo)
    {   

        $filename = sprintf('%s.%s', time(), $photo->getClientOriginalExtension());

        $image = Image::make($photo->getRealPath());

        $image->resize(500, null, function($constraint) {

            $constraint->aspectRatio();
        
        })->save( $this->fullPath($filename) );  

        return $filename;
        
    }    

    protected function fullPath($filename) {
    
        return public_path() . $this->uploadsDirectory . $filename;
    
    }

}
