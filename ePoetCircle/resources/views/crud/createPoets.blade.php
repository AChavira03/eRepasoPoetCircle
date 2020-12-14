@extends('layouts.master')

@if(isset($poet) and is_object($poet))
    @php
        $title='Modificación de Poeta';
        $boton = 'Actualizar';
        $id = $poet->poet_id;
        $fName = $poet->fName;
        $surname = $poet->surname;
        $address = $poet->address;
        $postcode = $poet->postcode;
        $phoneNum = $poet->phoneNum;
    @endphp
@else
    @php
        $title='Alta de Poeta';
        $boton = 'Dar de alta';
        $id = '';
        $fName = '';
        $surname = '';
        $address = '';
        $postcode = '';
        $phoneNum = '';
    @endphp
@endif

@section('title', 'Inicio').
@section('header')
    @parent
            @stop

            @section('navbar')
                @parent
            @stop

            @section('content')
                <form action="{{isset($poet) ? action('Crud@update') :action('Crud@store')}}" method="post" style="text-align: center">
                    {{csrf_field()}}
                    @if(isset($poet) and is_object($poet))
                        <input type="hidden" name="id" value="{{$id}}">
                    @endif
                    <label for="firstname">Nombre:</label>
                    <input type="text" name="firstname" value="{{$fName}}">
                    <br>
                    <label for="surname">Apellido:</label>
                    <input type="text" name="surname" value="{{$surname}}">
                    <br>
                    <label for="address">Direccion:</label>
                    <input type="text" name="address" value="{{$address}}">
                    <br>
                    <label for="postcode">Codigo Postal:</label>
                    <input type="text" name="postcode" value="{{$postcode}}">
                    <br>
                    <label for="phoneNum">Telefono:</label>
                    <input type="text" name="phoneNum" value="{{$phoneNum}}">
                    <br>
                    <input type="submit" value="{{$boton}}">
                </form>
@stop

@section('footer')
    @parent
@stop
