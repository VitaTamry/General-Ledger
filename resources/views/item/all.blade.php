@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>عرض كل المنتجات<small>Sessions</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a href="#"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                                        <thead>
                                            <tr class="headings">
                                                <th>االمبيعات</th>
                                                <th>المتاح</th>
                                                <th>التكلفة</th>
                                                <th>سعر الدستة</th>
                                                <th>سعر الوحدة </th>
                                                <th>اسم المنتج </th>
                                                <th>رقم </th>                                 
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($items as $item ) 
                                            <tr class="even pointer">
                                                <td ><a href="item/{{$item->id}}">عرض</a></td>
                                                <th>{{$item->instock}}</th>
                                                <th>{{$item->cost}}</th>
                                                <th>{{$item->package_price}}</th>
                                                <th>{{$item->unite_price}}</th>
                                                <th >{{$item->name}}</th>
                                                <th>{{$item->id}}</th>
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