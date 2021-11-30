<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\DanhmucTruyen;
use App\Models\Theloai;
use App\Models\Truyen;
use App\Models\Tuong;
use Illuminate\Http\Request;
use Symfony\Polyfill\Intl\Idn\Info;

class IndexController extends Controller
{
    public function timkiem_ajax(Request $request)
    {
        $data = $request->all();
        if ($data['keywords']) {
            $truyen = Truyen::where('kichhoat', 0)->where('tentruyen', 'LIKE', '%' . $data['keywords'] . '%')->get();
            $output = '<ul class="dropdown-menu" style=display:block;>';
            foreach($truyen as $key =>$tr){
                $output.= '<li class="li_timkiem_ajax"><a href="#">'.$tr->tentruyen.'</a></li>';
            }

            $output.= '</ul>';
            echo $output;
        }
    }
    
    public function home()
    {
        
        $theloai = Theloai::orderBy('id', 'DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
        $truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->get();
        return view('pages.home')->with(compact('danhmuc', 'truyen', 'theloai'));

    }
    public function xemtuong(){
        $theloai = Theloai::orderBy('id', 'DESC')->get();

        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
        $truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->get();
        $sach = Tuong::orderBy('id', 'DESC')->where('kichhoat', 0)->get();
        return view('pages.tuong')->with(compact('danhmuc', 'truyen', 'sach','theloai'));
    }
    public function danhmuc($slug)
    {
        $theloai = Theloai::orderBy('id', 'DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
        $danhmuc_id = DanhmucTruyen::where('slug_danhmuc', $slug)->first();
        $tendanhmuc = $danhmuc_id->tendanhmuc;
        $truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->where('danhmuc_id', $danhmuc_id->id)->get();
        return view('pages.danhmuc')->with(compact('danhmuc', 'truyen', 'theloai', 'tendanhmuc'));
    }
    public function theloai($slug)
    {
        $theloai = Theloai::orderBy('id', 'DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
        $theloai_id = Theloai::where('slug_theloai', $slug)->first();
        $tentheloai = $theloai_id->tentheloai;
        $truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->where('theloai_id', $theloai_id->id)->get();
        return view('pages.theloai')->with(compact('danhmuc', 'truyen', 'theloai', 'tentheloai'));
    }
    public function xemtruyen($slug)
    {
        $theloai = Theloai::orderBy('id', 'DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
        $truyen = Truyen::with('danhmuctruyen', 'theloai')->where('slug_truyen', $slug)->where('kichhoat', 0)->first();
        $truyennoibat = Truyen::where('truyen_noibat',1)->take(20)->get();
        $truyenxemnhieu = Truyen::where('truyen_noibat',2)->take(20)->get();
        $chapter = Chapter::with('truyen')->orderBy('id', 'ASC')->where('truyen_id', $truyen->id)->get();
        $chapter_dau = Chapter::with('truyen')->orderBy('id', 'ASC')->where('truyen_id', $truyen->id)->first();
        $chapter_moinhat = Chapter::with('truyen')->orderBy('id', 'DESC')->where('truyen_id', $truyen->id)->first();
        $cungdanhmuc = Truyen::with('danhmuctruyen')->where('danhmuc_id', $truyen->danhmuctruyen->id)->whereNotin('id', [$truyen->id])->get();
        return view('pages.truyen')->with(compact('danhmuc', 'truyen', 'chapter', 'cungdanhmuc', 'chapter_dau', 'theloai','chapter_moinhat','truyennoibat','truyenxemnhieu'));
    }
    public function xemchapter($slug)
    {
        $theloai = Theloai::orderBy('id', 'DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
        $truyen = Chapter::where('slug_chapter', $slug)->first();
        // breadcrumb
        $truyen_breadcrumb = Truyen::with('danhmuctruyen', 'theloai')->where('id', $truyen->truyen_id)->first();
        //end  breadcrumb
        $chapter = Chapter::with('truyen')->where('slug_chapter', $slug)->where('truyen_id', $truyen->truyen_id)->first();
        $all_chapter = Chapter::with('truyen')->orderBy('id', 'ASC')->where('truyen_id', $truyen->truyen_id)->get();
        $next_chapter = Chapter::where('truyen_id', $truyen->truyen_id)->where('id', '>', $chapter->id)->min('slug_chapter');
        $max_id = Chapter::where('truyen_id', $truyen->truyen_id)->orderBy('id', 'DESC')->first();
        $min_id = Chapter::where('truyen_id', $truyen->truyen_id)->orderBy('id', 'ASC')->first();
        $previous_chapter = Chapter::where('truyen_id', $truyen->truyen_id)->where('id', '<', $chapter->id)->max('slug_chapter');

        return view('pages.chapter')->with(compact('danhmuc', 'chapter', 'all_chapter', 'next_chapter', 'previous_chapter', 'max_id', 'min_id', 'theloai', 'truyen_breadcrumb'));
    }
    public function timkiem(Request $request)
    {
        $data = $request->all();
        $slide_truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->take(8)->get();
        $theloai = Theloai::orderBy('id', 'DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
        $tukhoa = $data['tukhoa'];
        $truyen = Truyen::with('danhmuctruyen', 'theloai')->where('tentruyen', 'LIKE', '%' . $tukhoa . '%')->Orwhere('tacgia', 'LIKE', '%' . $tukhoa . '%')->get();
        return view('pages.timkiem')->with(compact('danhmuc', 'truyen', 'theloai', 'slide_truyen', 'tukhoa'));
    }
    public function tag($tag)
    {
        $theloai = Theloai::orderBy('id', 'DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
        $tags = explode("-",$tag);
        $truyen = Truyen::with('danhmuctruyen', 'theloai')->where(function($query)use($tags){
            for($i = 0;$i < count($tags);$i++){
                $query->orwhere('tukhoa','LIKE','%'.$tags[$i].'%');
            }
        })->paginate(12);
        return view('pages.tag')->with(compact('theloai','danhmuc','tag','truyen'));
    }
}
