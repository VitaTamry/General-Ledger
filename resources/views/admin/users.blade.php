@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">المستخدمين</div>

                    <div class="panel-body">
                       <div class="x_panel">
                                <div class="x_title">
                                    <h2>Stripped table <small>Stripped table subtitle</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Role</th>                                               
                                                <th>Email</th>
                                                 <th>Change Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>  
                                          <?php $i=1; foreach ($users as $user): ?> 
                                            <tr>
                                                <th scope="row">{{$i}}</th>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->role['name']}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>
                                                  <FORM id='{{$user->id}}' class="edit">
                                                     <select id='roleSelect'>
                                                     <?php foreach ($roles as $role): ?>
                                                       <option value="{{$role->id}}"  
                                                       @if ($user->role['name']== $role->name)
                                                       selected
                                                       @endif
                                                       >{{$role->name}}</option>
                                                    <?php  endforeach ?>    
                                                    </select>                                        
                                                  <input type="submit" value="submit"  class="btn btn-round btn-info" id="foo" data-userid="{{$user->id}}" data-token = '{{Session::token()}}'>                                            
                                                  </FORM>    
                                                </td>  
                                                <td><a href="{{url('/user')}}/{{$user->id}}">View</a></td>                                        
                                            </tr>                                                              
                                           <?php $i++; endforeach ?>                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
@endsection