@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header   text-center" >تعديل </div>

                <div class="card-body">
                      <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('trails.index') }}"> رجوع >>></a>
            </div>
            <form action="{{ route('trails.update' ,$trail->id) }}" method="POST"  enctype="multipart/form-data" >
                @csrf
                  @method("PUT")
                         <div class="form-group row">
                            <label for="national_number" class="col-md-4 col-form-label text-right">شكوى "رقم قومى"</label>

                            <div class="col-md-12">
                                <input  type="number"   class="form-control @error('name') is-invalid @enderror" name="national_number" value="{{ $trail->national_number }}"      autocomplete="national_number" autofocus>

                                @error('national_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                         <div class="form-group row">
                            <label for="complained" class="col-md-4 col-form-label text-right"> الجهه المشكو فى حقها</label>

                            <div class="col-md-12">
                                <input id="complained" type="text" class="form-control @error('complained') is-invalid @enderror" name="complained" value="{{  $trail->complained }}"      autocomplete="complained" autofocus>

                                @error('complained')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
           <div class="form-group row">
                            <label for="complained" class="col-md-4 col-form-label text-right"> اسم الشاكى</label>

                            <div class="col-md-12">
                                <input id="complainer_name" type="text" class="form-control @error('complainer_name') is-invalid @enderror" name="complainer_name" value="{{ $trail->complainer_name }}"    autocomplete="complainer_name" autofocus>

                                @error('complainer_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                              <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-right"> الهاتف</label>

                            <div class="col-md-12">
                                <input id="phone_number" type="tel" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ $trail->phone_number }}"      autocomplete="phone_number" autofocus>

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         {{-- <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-right"> الاجراء</label>

                            <div class="col-md-12">
                            <select class="form-select form-select-lg mb-3" name="action" aria-label=".form-select-lg example">
                             
                              <option value="2">تم التحويل </option>
                              <option value="3">تم الحفظ</option>
                               <option value="1" @if($trail->action=="1")
                                   selected
                              @endif>قيد  الفحص</option>
                            </select>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}
                          <div class="form-group row">
                            <label for="procedure" class="col-md-4 col-form-label text-right">الاجراءات</label>

                            <div class="col-md-12">
                             <textarea  class="ckeditor form-control" rows="3" name="procedure" >{{$trail->procedure }}</textarea>

                                @error('procedure')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>
       
                   
                            <div class="form-group row">
                            <label for="behave" class="col-md-4 col-form-label text-right">التصرف</label>

                            <div class="col-md-12">
                             <textarea class="ckeditor form-control" rows="3" name="behave" >{{$trail->behave }}</textarea>

                                @error('behave')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>

                         <div class="form-group row">
                            <label for="note" class="col-md-4 col-form-label text-right">ملا حظات</label>

                            <div class="col-md-12">
                             <textarea  class="ckeditor form-control" rows="3" name="note" >{{$trail->note }}</textarea>

                                @error('note')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>
 
  
                  
                       <div class="form-group row">
                            <label for="filenames" class="col-md-4 col-form-label text-right">اضف صور جديده </label>

                            <div class="col-md-12">
                            <input type="file" name="filenames[]"   multiple   class="myfrm form-control">

                                @error('filenames')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>
       
                   
                        <div class="form-group row mb-0 text-center">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   حفظ التعديل
                                </button>
                            </div>
                        </div>
    </div>
   
</form>
                </div>
                @if($trail->filenames)
                       <div class="row row-cols-1 row-cols-md-3 g-4">
     @if(count( explode(",",$trail->filenames))>0)
              @foreach(  explode(",",$trail->filenames) as  $value)





  <div class="col">
    <div class="card">
       <a class="thumbnail fancybox" rel="ligthbox" href="{{ asset('storage/images/'.$value) }}">
                        <img class="card-img-top" alt="" src="{{ asset('storage/images/'.$value) }}" />
                       
                    </a>
                      <form action="{{ route('img_del' ,['id'=>$trail->id,'name'=>$value]) }}" method="get"  enctype="multipart/form-data" >
                @csrf
                 
                    <button type="submit" onclick="return confirm('سوف يتم حذف الملف  بشكل نهائى هل تريد الحذف؟')" class="close-icon btn btn-danger"><i class="glyphicon glyphicon-remove">X</i></button>
                    </form>
     
    </div>
  </div>




 @endforeach
     @else
         
     @endif

 </div>
                @else
                    
                @endif
  
            </div>
        </div>
    </div>
</div>
@endsection