<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theloai;

class TheloaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $theloai = Theloai::orderBy('id','DESC')->get();
        return view('admin.theloai.index')->with(compact('theloai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.theloai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            $data = $request->validate(
                [
                    'tentheloai' => 'required|unique:theloai|max:255',
                    'slug_theloai' => 'required|unique:theloai|max:255',
                    'mota' => 'required|max:255',
                    'kichhoat' => 'required'
                ],[
                    'tentheloai.unique' => 'Tên danh mục đã tồn tại',
                    'slug_theloai.unique' => 'Slug danh mục đã tồn tại',
                    'tentheloai.required' => 'Tên danh mục không được bỏ trống',
                    'mota.required' => 'Mô tả danh mục không được bỏ trống',
                ]
            );
    
            $theloai = new Theloai();
            $theloai->tentheloai = $data['tentheloai'];
            $theloai->slug_theloai = $data['slug_theloai'];
            $theloai->mota = $data['mota'];
            $theloai->kichhoat = $data['kichhoat'];
            $theloai->save();
    
            return redirect()->route('theloai.index')->with('success','Thêm danh mục truyện thành công');
        }
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
    public function edit($id)
    {
        $theloai =  Theloai::find($id);
        return view('admin.theloai.edit')->with(compact('theloai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                'tentheloai' => 'required|max:255',
                'slug_theloai' => 'required|max:255',
                'mota' => 'required|max:255',
                'kichhoat' => 'required'
            ],[
                'tentheloai.required' => 'Tên danh mục không được bỏ trống',
                'slug_theloai.required' => 'Tên danh mục không được bỏ trống',
                'mota.required' => 'Mô tả danh mục không được bỏ trống',
            ]
        );

        $theloaitruyen =  Theloai::find($id);
        $theloaitruyen->tentheloai = $data['tentheloai'];
        $theloaitruyen->slug_theloai = $data['slug_theloai'];
        $theloaitruyen->mota = $data['mota'];
        $theloaitruyen->kichhoat = $data['kichhoat'];
        $theloaitruyen->save();

        return redirect()->route('theloai.index')->with('status','Cập nhật thể loại truyện thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Theloai::find($id)->delete();
        return redirect()->back()->with('status','Đã xóa thể loại thành công');
    }
}
