<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tuong;
use Carbon\Carbon;

class TuongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tuong = Tuong::orderBy('id','DESC')->get();
        return view('admin.tuong.index')->with(compact('tuong'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tuong.create');
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
                    'tentuong' => 'required|unique:tuong|max:255',
                    'slug_tuong' => 'required|unique:tuong|max:255',
                    'hinhanh' => 'required|image|mimes:jpg,png,jpeg,gì,svg|max:2048|dimensions:min_width=100,min_height=100,max_width = 1000,max_height=1000',

                    'noidung' => 'required',
                    'tomtat' => 'required',
                    'kichhoat' => 'required',
                ], [
                    'tentuong.unique' => 'Tên sách đã tồn tại',
                    'slug_tuong.required' => 'Slug sách phải có',
                    'tentuong.required' => 'Tên sách không được bỏ trống',
                    'hinhanh.required' => 'Hình ảnh sách phải có',
                    'tomtat.required' => 'lượt xem của sách phải có',

                ]
            );
            $tuong = new Tuong();
            $tuong->tentuong = $data['tentuong'];
            $tuong->slug_tuong = $data['slug_tuong'];
            $tuong->noidung = $data['noidung'];
            $tuong->kichhoat = $data['kichhoat'];
            $tuong->tomtat = $data['tomtat'];

            $tuong->created_at = Carbon::now('Asia/Ho_Chi_Minh');
            //thêm ảnh
            $get_image = $request->hinhanh;
            $path = 'public/uploads/tuong/';
            $get_name_image = $get_image->getClientOriginalName(); //lấy toàn bộ ảnh
            $name_image = current(explode('.', $get_name_image)); //tách ảnh vs phần mở rộng(.jpg)
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $tuong->hinhanh = $new_image;
            $tuong->save();
            return redirect()->route('tuong.index')->with('status', 'Thêm sách thành công');
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

        $tuong = Tuong::find($id);
        return view('admin.tuong.edit')->with(compact('tuong'));
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
        {
            $data = $request->validate(
                [
                    'tentuong' => 'required|max:255',
                    'slug_tuong' => 'required|max:255',
                    'luotxem' => 'required',
                    'kichhoat' => 'required',
                ], [

                    'slug_tuong.required' => 'Slug sách phải có',
                    'tentuong.required' => 'Tên sách không được bỏ trống',
                    'luotxem.required' => 'lượt xem của sách phải có',

                ]
            );
            $tuong = Tuong::find($id);
            $tuong->tentuong = $data['tentuong'];
            $tuong->slug_tuong = $data['slug_tuong'];
            $tuong->kichhoat = $data['kichhoat'];
            $tuong->luotxem = $data['luotxem'];

            $tuong->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
            $get_image = $request->hinhanh;
            if ($get_image) {
                $path = 'public/uploads/truyen/' . $tuong->hinhanh;
                if (file_exists($path)) {
                    unlink($path);
                }
                $path = 'public/uploads/tuong/';
                $get_name_image = $get_image->getClientOriginalName(); //lấy toàn bộ ảnh
                $name_image = current(explode('.', $get_name_image)); //tách ảnh vs phần mở rộng(.jpg)
                $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
                $get_image->move($path, $new_image);

                $tuong->hinhanh = $new_image;
            }
            $tuong->save();
            return redirect()->route('tuong.index')->with('status', 'Thêm sách thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tuong = Tuong::find($id);
        $path = 'public/uploads/tuong/' . $tuong->hinhanh;
        if (file_exists($path)) {
            unlink($path);
        }
        Tuong::find($id)->delete();
        return redirect()->back()->with('status', 'Xóa sách thành công');
    }
}
