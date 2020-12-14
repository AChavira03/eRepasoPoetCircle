@extends('layouts.master')
@section('title', 'Inicio').
@section('header')
        @parent
    @stop
            @section('navbar')
                @parent
            @stop

            @section('content')
                <div><a href="{{action('Crud@create')}}"><h5 style="background-color: #343a40">Agregar un nuevo Poeta<img src="{{url('images/add-file.png')}}" style="width: 30px"></h5></a></div>
                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th scope="col">idPoeta</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Codigo Postal</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Borrar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($poets as $poet)
                        <tr>
                            <th scope="row">{{$poet->poet_id}}</th>
                            <td>{{$poet->fName}}</td>
                            <td>{{$poet->surname}}</td>
                            <td>{{$poet->address}}</td>
                            <td>{{$poet->postcode}}</td>
                            <td>{{$poet->phoneNum}}</td>
                            <td><a href="{{action('Crud@show',['id'=>$poet->poet_id])}}"><img src="{{url('images/edit.png')}}" style="width:30px"></a></td>
                            <td><a href="{{action('Crud@destroy',['id'=>$poet->poet_id])}}"><img src="{{url('images/delete.png') }}" style="width:30px"></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if(session('status'))
                    <div class="alert alert-danger" role="alert">
                        {{session('status')}}
                    </div>
    @endif
@stop

@section('footer')
    @parent
@stop
