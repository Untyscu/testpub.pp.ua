@extends('tamplate')
@section('content')
    <div class="wrapper">
        <div class="container">
            <form action="/departments/del" method="POST" class="popup form">
                @csrf
                @if($errors->any())
                    <ul class="errlist">
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                @endif
                <p>{{$department->name}} </p>
                <input type="hidden" name="id" value="{{$department->id}}" />
                <input type="hidden" name="employees" value="{{$uses}}">
                <input type="submit" value="Удалить" class="form__del">
                <div class="form__close"><i class="fas fa-times"></i></div>
            </form>
        </div>
    </div>
@endsection
