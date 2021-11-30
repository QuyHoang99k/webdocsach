<?php

namespace App\Http\Controllers;

use App\Models\DanhmucTruyen;
use App\Models\Theloai;
use App\Models\Truyen;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TruyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_truyen = Truyen::with('danhmuctruyen', 'theloai')->orderBy('id', 'DESC')->get();

        return view('admin.truyen.index')->with(compact('list_truyen'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $theloai = Theloai::orderBy('id', 'DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
        return view('admin.truyen.create')->with(compact('danhmuc', 'theloai'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'tentruyen' => 'required|unique:truyen|max:255',
                'slug_truyen' => 'required|unique:truyen|max:255',
                'hinhanh' => 'required|image|mimes:jpg,png,jpeg,gì,svg|max:2048|dimensions:min_width=100,min_height=100,max_width = 1000,max_height=1000',
                'tomtat' => 'required',
                'tacgia' => 'required',
                'luotxem' => 'required',
                'tukhoa' => 'required',
                'kichhoat' => 'required',
                'danhmuc' => 'required',
                'theloai' => 'required',
                'truyennoibat' => 'required',
            ], [
                'tentruyen.unique' => 'Tên truyện đã tồn tại',
                'slug_truyen.required' => 'Slug truyện phải có',
                'tentruyen.required' => 'Tên truyện không được bỏ trống',
                'tomtat.required' => 'Mô tả truyện không được bỏ trống',
                'tacgia.required' => 'Tác giả truyện không được bỏ trống',
                'hinhanh.required' => 'Hình ảnh truyện phải có',
                'theloai.required' => 'Thể loại truyện phải có',
                'luotxem.required' => 'lượt xem của truyện phải có',
                'tukhoa.required' => 'từ khóa của truyện phải có',
            ]
        );

        $truyen = new Truyen();
        $truyen->tentruyen = $data['tentruyen'];
        $truyen->slug_truyen = $data['slug_truyen'];
        $truyen->theloai_id = $data['theloai'];
        $truyen->tomtat = $data['tomtat'];
        $truyen->kichhoat = $data['kichhoat'];
        $truyen->tacgia = $data['tacgia'];
        $truyen->luotxem = $data['luotxem'];
        $truyen->truyen_noibat = $data['truyennoibat'];
        $truyen->tukhoa = $data['tukhoa'];
        $truyen->danhmuc_id = $data['danhmuc'];
        $truyen->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        //thêm ảnh
        $get_image = $request->hinhanh;
        $path = 'public/uploads/truyen/';
        $get_name_image = $get_image->getClientOriginalName(); //lấy toàn bộ ảnh
        $name_image = current(explode('.', $get_name_image)); //tách ảnh vs phần mở rộng(.jpg)
        $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);

        $truyen->hinhanh = $new_image;

        $truyen->save();
        return redirect()->back()->with('status', 'Thêm truyện thành công');
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
        $theloai = Theloai::orderBy('id', 'DESC')->get();
        $truyen = Truyen::find($id);
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
        return view('admin.truyen.edit')->with(compact('truyen', 'danhmuc', 'theloai'));

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
                    'tentruyen' => 'required|max:255',
                    'slug_truyen' => 'required|max:255',

                    'tomtat' => 'required',
                    'tacgia' => 'required',
                    'luotxem' => 'required',
                    'tukhoa' => 'required',
                    'kichhoat' => 'required',
                    'danhmuc' => 'required',
                    'theloai' => 'required',
                    'truyennoibat' => 'required',

                ], [
                    'slug_truyen.required' => 'Slug truyện phải có',
                    'tentruyen.required' => 'Tên truyện không được bỏ trống',
                    'tomtat.required' => 'Mô tả truyện không được bỏ trống',
                    'tacgia.required' => 'Tác giả truyện không được bỏ trống',
                    'luotxem.required' => 'lượt xem không được bỏ trống',
                ]
            );

            $truyen = Truyen::find($id);
            $truyen->tentruyen = $data['tentruyen'];
            $truyen->slug_truyen = $data['slug_truyen'];
            $truyen->theloai_id = $data['theloai'];
            $truyen->tomtat = $data['tomtat'];
            $truyen->tacgia = $data['tacgia'];
            $truyen->luotxem = $data['luotxem'];
            $truyen->tukhoa = $data['tukhoa'];
            $truyen->kichhoat = $data['kichhoat'];
            $truyen->danhmuc_id = $data['danhmuc'];
            $truyen->truyen_noibat = $data['truyennoibat'];
            $truyen->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
            $get_image = $request->hinhanh;
            if ($get_image) {
                $path = 'public/uploads/truyen/' . $truyen->hinhanh;
                if (file_exists($path)) {
                    unlink($path);
                }
                $path = 'public/uploads/truyen/';
                $get_name_image = $get_image->getClientOriginalName(); //lấy toàn bộ ảnh
                $name_image = current(explode('.', $get_name_image)); //tách ảnh vs phần mở rộng(.jpg)
                $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
                $get_image->move($path, $new_image);

                $truyen->hinhanh = $new_image;
            }
            $truyen->save();
            return redirect()->route('truyen.index')->with('status', 'Cập nhật truyện thành công');
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
        $truyen = Truyen::find($id);
        $path = 'public/uploads/truyen/' . $truyen->hinhanh;
        if (file_exists($path)) {
            unlink($path);
        }
        Truyen::find($id)->delete();
        return redirect()->back()->with('status', 'Xóa truyện thành công');

    }
    public function truyennoibat(Request $request){
        $data = $request->all();
        $truyen = Truyen::find($data['truyen_id']);
        $truyen->truyen_noibat = $data['truyennoibat'];
        $truyen->save();
    }
}
