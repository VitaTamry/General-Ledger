@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    @foreach ($customers as $customer) 
                        <ul>
                            <li>
                                 <a href="customer/{{$customer->id}}">{{$customer->name}}</a>
                                - Account: {{$customer->account}}

                            </li>
                        </ul>
                    
                    @endforeach
                </div>
                {{$customers->links()}}
            </div>
        </div>
    </div>
</div>
@endsection