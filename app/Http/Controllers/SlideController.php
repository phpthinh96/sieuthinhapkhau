<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
    //
    public function getDanhSach(){
    	$slide = Slide::all();
    	return view('admin.slide.danhsach',['slide'=>$slide]);
    }

    public function getThem(){
    	return view('admin.slide.them');
    }

    public function postThem(Request $request){
    	
    	$slide = new Slide;
    	if ($request->hasFile('slide_anh')) {
        $file = $request->slide_anh;
        $filename = $file->getClientOriginalName('slide_anh');
        $ext = $file->getClientOriginalExtension('slide_anh');
            if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg') {
                return redirect('admin/slide/them')->with('loi','Bạn chỉ được upload file có đuôi jpg,png,jpeg');
            }
            else {
        $image = str_random('5').'_'.$filename;
        while(file_exists("images/slide/".$image)){
                $image = str_random(5)."_".$filename;
            }
        $file->move("images/slide",$image);
        $slide->slide_anh = $image;
            }
        }
        else {
            $slide->slide_anh = "";
        }
    	$slide->save();
    	return redirect('admin/slide/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($id){
    		$slide = Slide::find($id);
    		return view('admin.slide.sua',['slide'=>$slide]);
    }

    public function postSua(Request $request,$id){
    	$slide = Slide::find($id);

    	if ($request->hasFile('slide_anh')) {
        $file = $request->slide_anh;
        $filename = $file->getClientOriginalName('slide_anh');
        $ext = $file->getClientOriginalExtension('slide_anh');
            if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg') {
                return redirect('admin/slide/sua/'.$id)->with('loi','Bạn chỉ được upload file có đuôi jpg,png,jpeg');
            }
            else {
        $image = str_random('5').'_'.$filename;
        while(file_exists("images/slide/".$image)){
                $image = str_random(5)."_".$filename;
            }
        $file->move("images/slide",$image);
        unlink("images/slide/".$slide->slide_anh);
        $slide->slide_anh = $image;
            }
        }
        
    	$slide->save();
    	return redirect('admin/slide/sua/'.$id)->with('thongbao','Sửa thành công');
    

    }

    public function getXoa($id){
    	$slide = Slide::find($id);
    	$slide->delete();

    	return redirect('admin/slide/danhsach');
    }

}