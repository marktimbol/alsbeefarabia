<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\ApplicationFormRequest;
use App\Mailers\AdminMailer;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Slide\SlideRepositoryInterface;
use App\Repositories\Store\StoreRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    protected $user;

    protected $category;

    protected $slide;

    protected $store;

    protected $mailer;


    public function __construct(
        UserRepositoryInterface $user,
        CategoryRepositoryInterface $category,
        SlideRepositoryInterface $slide,
        StoreRepositoryInterface $store,
        AdminMailer $mailer)
    {
        $this->user = $user;
        $this->category = $category;
        $this->slide = $slide;
        $this->store = $store;
        $this->mailer = $mailer;
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

    public function menu($menu) {
        
        return view('public.menu-details', compact('menu'));

    }


    public function franchise() {
    
    	return view('public.franchise');
    
    }

    public function contact() {

    	return view('public.contact');

    }

    public function submitContact(Request $request) {
        return 'Process information here.';
    }


    public function franchiseApplication() {

        return view('public.franchise-application');

    }

    public function submitFranchiseApplication(ApplicationFormRequest $request) {
        
        $admin = $this->user->find(1);

        $userData = $this->user->store($request->all());

        $this->mailer->franchiseApplication($admin, $userData);

        flash()->overlay('Yeys!', 'Thank you for submitting a franchise application. We will contact you shortly.');

        return redirect()->back();
        
    }
}
