<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;

use App\Http\Requests;

use Storage;
use File;

use Illuminate\Support\Facades\Mail;
use Session;
use App\User as User;
use App\Products as Products;
use App\Category as Category;

class MainController extends Controller
{

    public function index()
    {
        $products = Products::paginate(24);
        $data = [
            'title' => 'Главная страница',
            'products' => $products
        ];
        return view('index', $data);
    }

    public function category($id)
    {
        $category = Category::find($id);
        if($category !== null){
            $products = Products::where('category', $id)->paginate(24);
            $data = [
                'title' => 'Категория',
                'id' => $id,
                'products' => $products,
                'name' => $category->category
            ];
            return view('index', $data);
        }else{
            return redirect('/')->with('status', 'Ошибка, такая категория не существует!');
        }
    }

    public function admin()
    {
        $data['categories'] = Category::all();
        $data['products'] = Products::get_list();
        return view('admin', $data);
    }

    public function add()
    {
        $products = new Products;

        if(Request::file('image')){
            $file = Request::file('image');
            $image = hash('md5',date('Y-m-d H:i'));
            $filename = $image . '.jpg';
            if ($file) {
                Storage::disk('public')->put($filename, File::get($file));
            }
            $products->image = '/files/'.$filename.'/preview';
        }else{
            $products->image = '/public/images/nophoto.jpg';
        }
        $products->name = Request::input('name');
        $products->price = Request::input('price');
        $products->pkg = Request::input('pkg');
        $products->category = Request::input('category');
        $products->size = Request::input('size');
        $products->save();

        return redirect('admin')->with('status', 'Добавлено');
    }

    public function catalog()
    {
        $id = Request::input('id');
        $product = Products::find($id);
        $data = [
            'product' => $product
        ];
        return view('desc', $data);
    }

    public function login()
    {
        if(Session::has('isAdmin')){
            return redirect('admin');
        }
        if(Request::has('name')){
            $login_data = [
                'name' => Request::input('name'),
                'password' => hash('md5', Request::input('password'))
            ];
            if(User::where($login_data)->first()){
                Session::put('isAdmin', true);
                return redirect('admin');
            }else{
                return redirect('login')->with('status', 'Данные не верны!');
            }
        }

        return view('login');
    }

    public function feedback()
    {
        $feed_data = [
            'name' => Request::input('name'),
            'user_email' => Request::input('email'),
            'msg' => Request::input('message')
        ];
        Mail::send('email', $feed_data, function($message)
        {
            $message->from(Request::input('email'), Request::input('name'));
            $message->to('sergofan1@yandex.ru', 'Кузьмичев Сергей')->subject('Письмо с сайта');
        });
        return redirect('/')->with('send','Отправлено');
    }
}
