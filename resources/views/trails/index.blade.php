  @extends('layouts.app')

@section('content')

  <style>
   col {
  display: table-column;}
  td {
  height: 70px !important; 
  
 
}
b {
    height:60px !important;
    line-height:20px !important; /* Height / no. of lines to display */
    overflow:hidden !important;
}

  </style>

 <section class="content">
           <div class="row m-3">
    <div class="box  box-primary" text-center>
    <div class="box-header with-border">
      <h3 class="box-title"> <h1 style="  text-align: center; background-color:gray; color:white;">برنامج الشكاوي نيابة مغاغه 
</h1></h3>
    </div><!-- /.box-header -->
    <div class="box-body no-padding" >

          <a  class="btn btn-info mr-auto"href="{{ route('trails.create') }}"><i class="fa fa-plus"></i> اضافة</a>

            
  
    {!! $dataTable->table(['class' => 'table   table-striped   row-border table-hover ' ,'style'=>'
  border: 1px solid black; width:100%;text-align:center;    margin: 0 auto;
  
  clear: both;
  border-collapse: collapse;
  
 table-layout: auto ; 
  word-wrap:break-word; '],true) !!}
    </div><!-- /.box-body -->
  </div>
 

 
</div>
    </section>

     
{!! $dataTable->scripts() !!}
  
@endsection