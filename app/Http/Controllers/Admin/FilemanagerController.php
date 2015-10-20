<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use GuillermoMartinez\Filemanager\Filemanager;
use Illuminate\Http\Request;

class FilemanagerController extends Controller
{
    public function __construct(){
        // $this->middleware('auth');
        parent::__construct();
    }

    public function getIndex()
    {
        return view('admin.filemanager.index');
    }
    
    public function getConnection()
    {
        $extra = array(
            // path after of root folder
            // if /var/www/public_html is your document root web server
            // then source= usefiles o filemanager/usefiles
            "source" => "/github/filemanagertest/laravel/public/userfiles",
            // url domain
            // so that the files and show well http://php-filemanager.rhcloud.com/userfiles/imagen.jpg
            // o http://php-filemanager.rhcloud.com/filemanager/userfiles/imagen.jpg
            "url" => url('/'),
            );                      
        $f = new Filemanager($extra);
        $f->run();
    }

    public function postConnection()
    {
        $extra = array(
            // path after of root folder
            // if /var/www/public_html is your document root web server
            // then source= usefiles o filemanager/usefiles
            "source" => "/github/filemanagertest/laravel/public/userfiles",
            // url domain
            // so that the files and show well http://php-filemanager.rhcloud.com/userfiles/imagen.jpg
            // o http://php-filemanager.rhcloud.com/filemanager/userfiles/imagen.jpg
            "url" => url('/'),
            );
        if(isset($_POST['typeFile']) && $_POST['typeFile']=='images'){
            $extra['type_file'] = 'images';
        }
        $f = new Filemanager($extra);
        $f->run();
    }
}
