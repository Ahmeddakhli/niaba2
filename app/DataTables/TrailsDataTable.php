<?php
  
namespace App\DataTables;
  
use App\Models\Trail;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
  
class TrailsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->rawColumns(['action', 'id','procedure','behave','note'])

            ->editColumn('procedure', function ($row) {
               
                return $row->procedure ;
           
            })
            ->editColumn('behave', function ($row) {
               
                return $row->behave ;
           
            })
            ->editColumn('note', function ($row) {
               
                return $row->note ;
           
            })
            ->editColumn('id', function ($row) {
                return '<a href="">'.$row->id.'</a>';
            })
            ->addColumn('action',  function($row){
                $actionBtn = '
                 <a href="'. route('trails.edit', $row->id) .'" class="edit btn btn-success btn-sm mb-1">عرض وتعديل</a>
                 <form action="'. route('trails.destroy', $row->id) .'" method="POST">
                 '.csrf_field().'
                 '.method_field("DELETE").'
                 <button trail_id="'.$row->id.'" class=" delete_btn delete btn btn-danger btn-sm "
                     onclick="return confirm(\'سوف يتم حذف الملف  بشكل نهائى هل تريد الحذف؟\')">  حذف</a>
                 </form>';
                return $actionBtn;
            })
            ->setRowId(function ($row) {
                return $row->id;
            })
            ->setRowAttr([
                'text-align' => 'center',
                
                
            ]) ;
    }
  
    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Trail $model)
    {
        return $model->newQuery();
    }
  
    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                   // ->autoWidth(false)
                    ->setTableId('trails-table')
                   // ->columns($this->getColumns())
            
                    ->minifiedAjax()
                    ->orderBy(0)
                    ->parameters([
                        'dom'          => 'Bfrtip',
                       // 'buttons'      => ['excel', 'csv'],
                    ])
                    ->language([
                        'buttoms' => [
                            'Excel' =>'إكسيل',
                            'print' =>'طباعه',
                            'Export' =>'تحميل',
                            'Reload' =>'تحميل البيانات الجديده',
                            'Reset' =>'الغاء البحث',
                
                        ],
                        'url' => url('//cdn.datatables.net/plug-ins/1.10.25/i18n/Arabic.json')
                    ])
                  
                    ->parameters([
                      
                        
                        'initComplete' => "function () {
                            this.api().columns().every(function () {
                                var column = this;
                                var input = document.createElement(\"input\");
                                $(input).appendTo($(column.footer()).empty())
                                .on('keyup change clear', function () {
                                    column.search($(this).val(), false, false, true).draw();
                                });
                            });
                        }",
                     //   "autoWidth"=>false,
                    ])
                    // ->columnDefs( [
                    //     [ "width"=> "10px", "targets"=> 0 ],
                    // ])
                   ->responsive(true)
                    ->serverSide(true)
                    ->processing(True)
                   
                    ->scrollX(true)
                    
  
                    ->buttons(
                      
                        Button::make('export')
                        ->title("تحميل")
                        ,
                        Button::make('print')
                        ->title("طباعة"),
                        Button::make('reset')
                        ->title("حذف البحث"),
                        Button::make('reload')
                        ->title("تحميل المنتجات الجديدة")
                        ,

                       

                    ) 
                    ->columns([
    
                        ['data' => 'id', 'name' => 'id', 'title' => 'م','width'=>'0%'],
                        ['data' => 'national_number', 'name' => 'national_number', 'title' => 'رقم قومى','width'=>'8%'],
                        ['data' => 'complained', 'name' => 'complained', 'title' => 'الجهه المشكو بها','width'=>'8%'],
                        ['data' => 'phone_number', 'name' => 'phone_number', 'title' => 'الهاتف','width'=>'6%'],
                        ['data' => 'complainer_name', 'name' => 'complainer_name', 'title' => 'اسم الشاكى','width'=>'8%'],
                        ['data' => 'created_at', 'name' => 'created_at', 'title' => 'تاريخ الاضافة'],


                        ['data' => 'procedure', 'name' => 'procedure', 'title' => 'الاجراءت'],
    
                        ['data' => 'behave', 'name' => 'behave', 'title' => 'التصرف'],
    
                        ['data' => 'note', 'name' => 'note', 'title' => 'ملاحظات'],
                        ['data' => 'action', 'name' => 'action', 'title' => 'عمليات'  ,'width'=>'6%'],

                     
                  
                        
                      
                
                    ]);
    }
  
    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
           
            
           Column::make('id')->title("رقم"),

            Column::make('national_number')->title(" رقم قومى"),
            Column::make('complained')->title("الجهه المشكو بها"),
            Column::make('phone_number')->title("الهاتف"),
            Column::make('procedure')->title("الاجراءت"),
           Column::make( 'behave')->title("التصرف"),
         
          
    // Column::make('updated_at')->title("تاريخ التعديل"),
           
            Column::computed('action')
            ->title(" عمليات")
            ->searchable(false),
            Column::make('note')->title("ملاحظات"),
            Column::make('created_at')->title("تاريخ الاضافة"),

        ];
    }
  
    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Trails_' . date('YmdHis');
    }
}
