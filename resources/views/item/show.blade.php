
@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    item {{$item->name}}
                        <div class="row">

                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2 class="pull-right">فواتير المنتج   </h2> &nbsp<h2 class="pull-right">{{$item->name}}</h2>
                                        
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <table id="example" class="table table-striped responsive-utilities jambo_table">
                                            <thead>
                                                <tr class="headings">
                                                    {{-- <th>
                                                        <input type="checkbox" class="tableflat">
                                                    </th> --}}
                                                    <th>الحالة </th>
                                                    <th class=" no-link last"><span class="nobr">مشاهدة</span>
                                                    <th>تاريخ الفاتورة </th>
                                                    <th>المدفوع </th>
                                                    <th>القيمة </th>
                                                    <th>العميل</th>
                                                    <th>رقم </th>                                 
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                
                                                @foreach ($invoices as $invoice )
                                               <?php $customer_id = $invoice->customer_id; ?>
                                               <?php $customer = App\Customer::find($customer_id); ?>
                                                <tr class="even pointer">
                                                    @if ($invoice->pending == 0)
                                                    <td><i class="glyphicon glyphicon-check"></i> </td>
                                                    @else
                                                    <td class="glyphicon glyphicon-remove-sign"></td>
                                                    @endif
                                                     <td class=" last"><a href="customer/{{$customer_id}}/invoice/{{$invoice->id}}">عرض</a></td>
                                                    <td class=" ">{{$invoice->created_at}}</td>
                                                    <td class=" ">{{$invoice->paid}}</td>
                                                    <td class=" ">{{$invoice->total}}</td>
                                                    <td>{{$customer->name}}</td>
                                                    <td class=" ">{{$invoice->invoice_no}}</td>
                                                </tr>
                                            @endforeach
                                                
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>

                            <br />
                            <br />
                            <br />

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
            $(document).ready(function () {
                $('input.tableflat').iCheck({
                    checkboxClass: 'icheckbox_flat-green',
                    radioClass: 'iradio_flat-green'
                });
            });

            var asInitVals = new Array();
            $(document).ready(function () {
                var oTable = $('#example').dataTable({
                    "oLanguage": {
                        "sSearch": "Search all columns:"
                    },
                    "aoColumnDefs": [
                        {
                            'bSortable': false,
                            'aTargets': [0]
                        } //disables sorting for column one
            ],
                    'iDisplayLength': 12,
                    "sPaginationType": "full_numbers",
                    "dom": 'T<"clear">lfrtip',
                    "tableTools": {
                        "sSwfPath": "{{URL::asset('assets/js/Datatables/tools/swf/copy_csv_xls_pdf.swf')}}"
                    }
                });
                $("tfoot input").keyup(function () {
                    /* Filter on the column based on the index of this element's parent <th> */
                    oTable.fnFilter(this.value, $("tfoot th").index($(this).parent()));
                });
                $("tfoot input").each(function (i) {
                    asInitVals[i] = this.value;
                });
                $("tfoot input").focus(function () {
                    if (this.className == "search_init") {
                        this.className = "";
                        this.value = "";
                    }
                });
                $("tfoot input").blur(function (i) {
                    if (this.value == "") {
                        this.className = "search_init";
                        this.value = asInitVals[$("tfoot input").index(this)];
                    }
                });
            });
        </script>
@endsection