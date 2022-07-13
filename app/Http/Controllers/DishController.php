<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use Illuminate\Http\Response;
use App\Models\Kind;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $dishes = Dish::join('kinds', 'kinds.id', 'dishes.kind_id')
            ->select('kinds.kind as kind_kinds', 'dishes.*')
            ->paginate(20);
        if ($dishes) {
            return response()->json($dishes, Response::HTTP_OK);
        } else {
            return response()->json([]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kinds=\App\Models\Kind::all();
        return view('dish-create',compact('kinds'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name='';
        if($request -> hasfile('image')){
            $this->validate($request,[
                'image'=>'mimes:jpg,png,gif,jpeg|max: 2048'
            ],[
                'image.mimes'=>'Chỉ chấp nhận file hình ảnh',
                'image.max'=>'Chỉ chấp nhận hình ảnh dưới 2Mb',
            ]);
            $file = $request->file('image');
            $name =time().'_'.$file->getClientOriginalName();
            $destinationPath=public_path('image');
            $file -> move($destinationPath, $name);
        }
        $validated = $request->validate([
            'name' => 'required',
            'des' => 'required',
            'price' => 'required|integer'
        ],[
                'name.required' => 'Chưa nhập tên món',
                'des.required' => 'Chưa nhập mô tả',
                'price.required' => 'Chưa nhập số tiền',
                'price.integer' => 'Giá tiền phải là số'
        ]);
        $dish = new Dish();
        $dish->name = $request->name;
        $dish->price = $request->price;
        $dish->des = $request->des;
        $dish->kind_id = $request->kind_id;
        $dish->ingredients = $request->ingredients;
        $dish->image = $name;
        $dish->save();
        return redirect()-> route('dishes.index')->with('success', 'Bạn đã thêm món thành công');
        // if ($dishes) {
        //     return response()->json($dishes, Response::HTTP_OK);
        // } else {
        //     return response()->json([]);
        // }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dish=Dish::find($id);
        return view('dish-detail',compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $name='';
        if($request -> hasfile('image')){
            $this->validate($request,[
                'image'=>'mimes:jpg,png,gif,jpeg|max: 2048'
            ],[
                'image.mimes'=>'Chỉ chấp nhận file hình ảnh',
                'image.max'=>'Chỉ chấp nhận hình ảnh dưới 2Mb',
            ]);
            $file = $request->file('image');
            $name =time().'_'.$file->getClientOriginalName();
            $destinationPath=public_path('image');
            $file -> move($destinationPath, $name);
        }
        $validated = $request->validate([
            'name' => 'required',
            'des' => 'required',
            'price' => 'required|integer'
        ],[
                'name.required' => 'Chưa nhập tên món',
                'des.required' => 'Chưa nhập mô tả',
                'price.required' => 'Chưa nhập số tiền',
                'price.integer' => 'Giá tiền phải là số'
        ]);
        $dish = Dish::find($id);
        $dish->name = $request->name;
        $dish->price = $request->price;
        $dish->des = $request->des;
        $dish->kind_id = $request->kind_id;
        $dish->ingredients = $request->ingredients;
        $dish->image = $name;
        $dish->save();
        // return redirect()-> route('dishes.index')->with('success', 'Bạn đã thêm món thành công');
        if ($dish) {
            return response()->json($dish, Response::HTTP_OK);
        } else {
            return response()->json([]);
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
        $dish = Dish::find($id);
       
        //Xóa hình ảnh trong folder khi xóa
        // $imgLink = public_path('image/').$car->image;    
        // if(File::exists($imgLink)) {
        //     File::delete($imgLink);
        // }
        $dish->delete();
        if($dish) {            
            return response()->json(["status" => "successful", "success" => true, "message" => "car record created successfully", "data" => $dish]);
        }else {
            return response()->json(["status" => "failed", "success" => false, "message" => "Whoops! failed to create."]);
        }
    }
}