@extends('tamplate')
@section('content')
    <div class="wrapper">
        <div class="container">
            <form action="/departments/edit" method="POST" class="popup form">
            @csrf
            @isset($departments)
                <label class="form__label--text"><input type="text" name="name" value="{{$departments->name}}" class="form__input--text"/><span class="form__placeholder">Отдел</span></label>
            @else
                <label class="form__label--text"><input type="text" name="name" class="form__input--text"/><span class="form__placeholder">Отдел</span></label>
            @endisset
                <input type="submit" value="Добавить/Обновить" class="form__submit">
                <div class="form__close"><i class="fas fa-times"></i></div>
            </form>
        </div>
    </div>
@endsection
