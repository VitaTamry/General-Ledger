@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                    <div class="panel-body">
                       show a certain customer {{$customer->name}}
                       <ul>
                        @foreach ($invoices as $invoice) 
                    
                           <li>
                               <h3>Total: &nbsp{{$invoice->total}}</h3>
                               <p>date:{{$invoice->created_at}}</p>
                           </li>
                         @endforeach  
                       </ul>
                   </div>
                 </div>      

                        </div>
                        <div class="clearfix"></div>

                        <div class="row">

                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Daily active users <small>Sessions</small></h2>
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
                                                    {{-- <th>
                                                        <input type="checkbox" class="tableflat">
                                                    </th> --}}
                                                    <th>الحالة </th>
                                                    <th class=" no-link last"><span class="nobr">مشاهدة</span>
                                                    <th>تاريخ الفاتورة </th>
                                                    <th>المدفوع </th>
                                                    <th>القيمة </th>
                                                    <th>رقم </th>                                 
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($invoices as $invoice ) 
                                                <tr class="even pointer">
                                                    @if ($invoice->pending == 0)
                                                    <td><i class="glyphicon glyphicon-check"></i> </td>
                                                    @else
                                                    <td class="glyphicon glyphicon-remove-sign"></td>
                                                    @endif
                                                     <td class=" last"><a href="{{$customer->id}}/invoices/{{$invoice->id}}">عرض</a></td>
                                                    <td class=" ">{{$invoice->created_at}}</td>
                                                    <td class=" ">{{$invoice->paid}}</td>
                                                    <td class=" ">{{$invoice->total}}</td>
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
<script type="text/javascript">
    
    
</script>
      
@endsection