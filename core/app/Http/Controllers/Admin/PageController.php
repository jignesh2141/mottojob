<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Page;
use App;
use DB;
use Session;
use Config;

class PageController extends Controller
{
    public function index(){
        $lang_locale = Session::get('lang_locale');
    	$pages = Page::where('lang',$lang_locale)->orderBy('id','desc')->paginate(config('common.pagination.item_per_page'));
        return view('admin.pages.pages',['pages'=>$pages]);
    }

    public function add_page($id = null)
    {
        if ($id == null) {
            $page = new Page();
            return view('admin.pages.page')->with(compact('page'));
        } else {
        	$en_page = Page::where('page_id',$id)->where('lang', 'en')->get();
        	$ja_page = Page::where('page_id',$id)->where('lang', 'ja')->get();
            return view('admin.pages.edit_page')->with(compact('en_page','ja_page'));
        }     
    }

    public function store(Request $request)
    {
        request()->validate([
            'en_title' => 'required',
            'en_slug' => 'required',
            'en_description' => 'required',
            'ja_title' => 'required',
            'ja_slug' => 'required',
            'ja_description' => 'required',
        ]);
        
        $id = DB::table('page')->insertGetId([]);
        /* EN */
        $page = new Page();
        $page->page_id = $id;
        $page->lang = 'en';
        $page->title = $request->en_title;
        $page->slug = $request->en_slug;
        $page->description = $request->en_description;
        $page->meta_keywords = $request->en_meta_keywords;
        $page->meta_description = $request->en_meta_description;
        $page->save();

        $page = new Page();
        $page->page_id = $id;
        $page->lang = 'ja';
        $page->title = $request->ja_title;
        $page->slug = $request->ja_slug;
        $page->description = $request->ja_description;
        $page->meta_keywords = $request->ja_meta_keywords;
        $page->meta_description = $request->ja_meta_description;
        $page->save();
        
        return redirect()->route('pages')
                        ->with('success','Page created successfully');
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'en_title' => 'required',
            'en_slug' => 'required',
            'en_description' => 'required',
            'ja_title' => 'required',
            'ja_slug' => 'required',
            'ja_description' => 'required',
        ]);
        
        
        /* EN */
        $page = Page::find($request->en_id);
        $page->page_id = $id;
        $page->lang = 'en';
        $page->title = $request->en_title;
        $page->slug = $request->en_slug;
        $page->description = $request->en_description;
        $page->meta_keywords = $request->en_meta_keywords;
        $page->meta_description = $request->en_meta_description;
        $page->save();

        $page = Page::find($request->ja_id);
        $page->page_id = $id;
        $page->lang = 'ja';
        $page->title = $request->ja_title;
        $page->slug = $request->ja_slug;
        $page->description = $request->ja_description;
        $page->meta_keywords = $request->ja_meta_keywords;
        $page->meta_description = $request->ja_meta_description;
        $page->save();
        
        return redirect()->route('pages')
                        ->with('success','Page created successfully');
    }

    public function destroy($id)
    {

        DB::table('page')->where('id', $id)->delete();
        return redirect()->route('pages')
                        ->with('success','Page deleted successfully');
    }
}
