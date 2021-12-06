@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header   text-center" >اضافه</div>

                <div class="card-body">
                      <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('trails.index') }}"> رجوع >>></a>
            </div>
            <form action="{{ route('trails.store') }}" method="POST"  enctype="multipart/form-data" >
                @csrf
                         <div class="form-group row">
                            <label for="national_number" class="col-md-4 col-form-label text-right">شكوى "رقم قومى"</label>

                            <div class="col-md-12">
                                <input   id="national_number" type="number"   class="form-control @error('national_number') is-invalid @enderror" name="national_number" value="{{ old('national_number') }}"    autocomplete="national_number" autofocus>

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
                                <input id="complained" type="text" class="form-control @error('complained') is-invalid @enderror" name="complained" value="{{ old('complained') }}"    autocomplete="complained" autofocus>

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
                                <input id="complainer_name" type="text" class="form-control @error('complainer_name') is-invalid @enderror" name="complainer_name" value="{{ old('complainer_name') }}"    autocomplete="complainer_name" autofocus>

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
                                <input id="phone_number" type="tel"  class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}"    autocomplete="phone_number" autofocus>

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
                            <select name="action" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                              <option selected>قم باختيار الاجراء</option>
                              <option value="1">قيدالفحص</option>
                              <option value="2">تم التحويل </option>
                              <option value="3">تم الحفظ</option>
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
                    <textarea id ="procedure" class=" ckeditor form-control @error('procedure') is-invalid @enderror" rows="3" name="procedure"> 
                     @if( old('procedure') )
                         {{old('procedure')}} 
                    @else
                  <p>الاجراء/</p>

                    <p>الاستاذ/</p>
                    <p>تاريخ الاستلام/</p>
                    <p> ارسلت واتس</p>

                    <p>الى الاستاذ/</p>   
                    @endif  
 

                    </textarea>

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
                    <textarea class="ckeditor form-control" rows="3" name="behave">    {{old('behave')}} 
</textarea>

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
                    <textarea class="ckeditor form-control" rows="3" name="note">
                     {{old('note')}} 
                    </textarea>

                                @error('note')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>
 
  
                  
                       <div class="form-group row">
                            <label for="filenames" class="col-md-4 col-form-label text-right ">اختر صوره او اكثر </label>

                            <div class="col-md-12">
                            <input type="file" name="filenames[]"   multiple   class="myfrm form-control  @error('filenames') is-invalid @enderror">

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
                                   حفظ
                                </button>
                            </div>
                        </div>
    </div>
   
</form>
                </div>
     
            </div>
        </div>
    </div>
</div>
@endsection