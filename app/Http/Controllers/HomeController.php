<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Trail;
use Illuminate\Support\Arr;
use App\DataTables\TrailsDataTable;
use \App\Http\Requests\StoreTrailRequest;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TrailsDataTable $dataTable)
    {
        return $dataTable->render('trails.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trails.add');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrailRequest $request)
    {
                
                
                
                
                    //store new room 
                try {
                    //  after make validation 
                $inputss=$request->input();

                if($request->hasfile('filenames'))
                { 
                    $imges=[];
                    //store img
                
                    foreach ($request->file('filenames') as $ke=> $img) {
            
                        $file=$img;
                        $name = time().rand(1,100).'.'.$file->extension();
                        $file->storeAs('public/images', $name); 
                    $imges[]= $name;
                    }
                    $str=  implode(",",$imges);
                    $inputss = Arr::add($inputss, 'filenames', $str);
                }
            //create new room in table 

                $room= Trail::create($inputss);

            

                if ($room)
                return redirect(route('trails.index'))->with('success','Product updated successfully');    
            
            } 
            catch (Throwable $e)
            {
            report($e);
            // if any errors
            return redirect()->back()->with('error','call the support an problem  exists ');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trail  $Trail
     * @return \Illuminate\Http\Response
     */
    public function show(Trail $Trail)
    {
        
    
        return view('trails.show',['trail'=>$Trail]);
       
    }



     // delete img
    public function img_del( Trail $id ,$name)
    {
     $arr= explode(",",$id->filenames);

     
     if ( $key=array_search($name, $arr)) {

        unset($arr[$key]);
    }
   $str= implode(',',  $arr);

  
      $id->update(['filenames' => $str]);


     if (File::exists(public_path('storage/images/'.$name ))) {
            File::delete(public_path('storage/images/'.$name ));
 
           return redirect(route('trails.edit',['trail'=>$id])); 
      }
      return redirect(route('trails.edit',['trail'=>$id]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trail  $Trail
     * @return \Illuminate\Http\Response
     */
    public function edit(Trail $Trail)
    {
        
        return view('trails.edit',['trail'=>$Trail]);
  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trail  $Trail
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTrailRequest $request, Trail $Trail)
    {
         
       
    
    
       
           //store new room 
    try {
        //  after make validation 
    $inputss=$request->input();

    if($request->hasfile('filenames'))
    { 
        $imges=explode(",",$Trail->filenames);
        //store img
     
        foreach ($request->file('filenames') as $ke=> $img) {
 
            $file=$img;
            $name = time().rand(1,100).'.'.$file->extension();
            $file->storeAs('public/images', $name); 
           $imges[]= $name;
        }
         $str=  implode(",",$imges);
        $inputss = Arr::add($inputss, 'filenames', $str);
    }
//create new room in table 

    
        $room=$Trail->update($inputss);
   

    if ($room)
    return redirect(route('trails.edit',['trail'=>$Trail]));  
 
} 
catch (Throwable $e)
{
report($e);
// if any errors
return redirect()->back()->with('error','call the support an problem  exists ');
}
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trail  $Trail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trail $Trail)
    {
        $Trail->delete();
    
        return redirect()->route('trails.index')
                        ->with('success','Product deleted successfully');
    }
}
