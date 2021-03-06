<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\ContactFormRequest;
use App\Jobs\SendUserInformationToAdmin;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Slide\SlideRepositoryInterface;
use App\Repositories\Store\StoreRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Queue;

class PagesController extends Controller
{

    protected $user;

    protected $category;

    protected $slide;

    protected $store;


    public function __construct(
        UserRepositoryInterface $user,
        CategoryRepositoryInterface $category,
        SlideRepositoryInterface $slide,
        StoreRepositoryInterface $store)
    {
        $this->user = $user;
        $this->category = $category;
        $this->slide = $slide;
        $this->store = $store;
    }

    public function home() {

        $slides = $this->slide->all();

    	return view('public.home', compact('slides'));
    
    }

    public function about() {
    
    	return view('public.about');
    
    }

    public function stores() {
        
        $stores = $this->store->all();

        return view('public.stores', compact('stores'));

    }

    public function menus() {

        $categories = $this->category->all();

        return view('public.menus', compact('categories'));

    }

    public function menusByCategory($category) {

        return view('public.menu', compact('category'));

    }

    public function menu($category, $menu) {
            
        return view('public.menu-details', compact('menu'));

    }


    public function franchise() {
    
    	return view('public.franchise');
    
    }

    public function contact() {

    	return view('public.contact');

    }

    public function submitContact(ContactFormRequest $request) {

        $this->dispatchFrom( SendUserInformationToAdmin::class, $request);

        flash()->overlay('Yeys!', 'Thank you for contacting us. We will contact you shortly.');

        return redirect()->route('contact');   

    }
}
