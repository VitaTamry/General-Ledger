@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row " data-role="header" data-position="fixed">

            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12 pull-right" style="position: relative; direction: rtl;">
                <div class="tile-stats" style="direction: rtl;margin-right: 20px;">
                    <h3 style="margin-right: 10px;">إسم العميل</h3>
                        <form>
                            <div class="row" style="margin-right: 20px;">
                            <select class="select_customer" style="width: 300px; dir: rtl; ">
                              <option value="3620194" selected="selected">إختر عميلا</option>
                            </select>
                            </div>
                       </form>
                       <h4 id="account" style="margin-right: 10px;">الحساب : </h4>
                </div>
            </div>
            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12 pull-right" style="position: relative; direction: rtl;">
                <div class="tile-stats" style="direction: rtl;margin-right: 20px;">
                    <h3 style="margin-right: 10px;">التاريخ </h3>
                    <input style="margin-right: 10px; "type="date" class="datepicker">
                </div>
            </div>
            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12 pull-right" style="position: relative; direction: rtl;">
                <div class="tile-stats" style="direction: rtl;margin-right: 20px;">
                    <h3 style="margin-right: 10px;">إضافة منتج</h3>
                    <select class="select_item form-control" style="width: 300px; dir: rtl; ">
                        <option value="3620194" selected="selected">أضف منتج</option>
                     </select>
                </div>
            </div>
     </div>
      <div class="x_panel pull-right">
          
          <div class="x_content" style="direction: rtl;">

              <table class=" table table-striped "  style="direction: rtl; " >
                  <thead  >
                      <tr>
                          <th class="text-center">#</th>
                          <th class="text-center">اسم المنتج</th>
                          <th class="text-center">الوحدة</th>                                               
                          <th class="text-center">سعر الوحدة</th>
                          <th class="text-center">الكمية </th>
                          <th class="text-center">خصم</th>
                          <th class="text-center">السعر</th>
                          <th class="text-center">حذف</td>
                      </tr>
                  </thead>
            
                  <tbody id="table">  
                      <form class="form-group items-form">
                        <tr id="itemRow">
                          <td class="item-count" id="del">0</td>
                          <td id="item-name"><input type="text" class="form-control" > </td>
                          <td width="15%">
                            <select class="form-control" id="unite_select" onchange="changeUnite()">
                              <option value="unite">قطعة</option>
                              <option value="package">دستة</option>
                            </select>
                          </td>
                          <td width="15%" ><input type="number" class="form-control col-xs-3" id="unite_price"></td>
                          <td width="15%"><input type="number" class="form-control" max=""  id="qty"></td>
                          <td width="15%"><input type="number" class="form-control" id="discount"></td>
                          <td width="15%"><p class="form-control" id="price"></p></td>
                          <td><button type="button"class="glyphicon glyphicon-remove red" id="removeItem"></button></td>
                        </tr> 
                       </form>

                  </tbody>
              </table>
          </div>
      </div>
</div>

@endsection