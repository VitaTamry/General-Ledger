 <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <h3>hello</h3>
                            <ul class="nav side-menu">
                                <li><a href="{{ url('/home') }}"><i class="fa fa-home"></i> الرئيسية </span></a>
                                  
                                </li>
                                <li><a><i class="fa fa-edit"></i> الفواتير <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="{{ url('/newInvoice') }}">فاتورة جديدة</a>
                                        </li>
                                        <li><a href="form_validation.html">بحث</a>
                                        </li>
                                        <li><a href="form_wizards.html">Form Wizard</a>
                                        </li>
                                        <li><a href="form_upload.html">Form Upload</a>
                                        </li>
                                        <li><a href="form_buttons.html">Form Buttons</a>
                                        </li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-desktop"></i> العملاء <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="general_elements.html">عميل جديد</a>
                                        </li>
                                        <li><a href="{{ url('/customer') }}">كل العملاء</a>
                                        </li>
                                        <li><a href="typography.html">بحث</a>
                                        </li>
                                  
                                    </ul>
                                </li>
                                 <li><a><i class="fa fa-table"></i> المنتجات <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="{{url('/item')}}">عرض</a>
                                        </li>
                                        <li><a href="{{url('/item/create')}}">إضافة</a>
                                        </li>
                                    </ul>
                                </li>
                                
                                <li><a><i class="fa fa-table"></i> الموظفين <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="{{url('/user')}}">الصلاحيات</a>
                                        </li>
                                        <li><a href="tables_dynamic.html">Table Dynamic</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-bar-chart-o"></i> الموردين <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="chartjs.html">Chart JS</a>
                                        </li>
                                        <li><a href="chartjs2.html">Chart JS2</a>
                                        </li>
                                     </ul>
                                </li>
                            </ul>
                        </div>
                        </div>