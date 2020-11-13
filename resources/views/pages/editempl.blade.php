@extends('tamplate')
@section('content')
        <div class="container">
            @if($errors->any())
                <ul class="errlist">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif
            <form action="/employees/edit" method="POST" class="popup form">
                @csrf
                @isset($employee)
                <input type="hidden" name="id" value="{{$employee->id}}">
                <label class="form__label--text"><input type="text" name="fname" value="{{$employee->fname}}" class="form__input--text"/><span class="form__placeholder">Имя</span></label>
                <label class="form__label--text"><input type="text" name="mname" value="{{$employee->mname}}" class="form__input--text"/><span class="form__placeholder">Отчество</span></label>
                <label class="form__label--text"><input type="text" name="lname" value="{{$employee->lname}}" class="form__input--text"/><span class="form__placeholder">Фамилия</span></label>
                <label class="form__label--text"><input type="text" name="sex" value="{{$employee->sex}}" class="form__input--text"/><span class="form__placeholder">Пол</span></label>
                <label class="form__label--text"><input type="text" name="wage" value="{{$employee->wage}}" class="form__input--text"/><span class="form__placeholder">Заработная плата</span></label>
                @foreach($departments as $department)
                    <label class="form__label--checkbox"><input type="checkbox"
                    @if(array_key_exists($department->id, array_flip(explode(';', $employee->departments))))
                        {{"checked"}}
                    @endif
                    class="form__checkbox" value="{{$department->id}}" name="departments[]">{{$department->name}}</label>
                @endforeach
                @else
                    <input type="hidden" name="id" value="">
                    <label class="form__label--text"><input type="text" name="fname" class="form__input--text"/><span class="form__placeholder">Имя</span></label>
                    <label class="form__label--text"><input type="text" name="mname" class="form__input--text"/><span class="form__placeholder">Отчество</span></label>
                    <label class="form__label--text"><input type="text" name="lname" class="form__input--text"/><span class="form__placeholder">Фамилия</span></label>
                    <label class="form__label--text"><input type="text" name="sex" class="form__input--text"/><span class="form__placeholder">Пол</span></label>
                    <label class="form__label--text"><input type="text" name="wage" class="form__input--text"/><span class="form__placeholder">Заработная плата</span></label>
                    @foreach($departments as $department)
                        <label class="form__label--checkbox"><input type="checkbox" class="form__checkbox" value="{{$department->id}}" name="departments[]">{{$department->name}}</label>
                    @endforeach
                @endisset
                <input type="submit" value="Добавить/Обновить" class="form__submit">
                <div class="form__close"><i class="fas fa-times"></i></div>
            </form>
        </div>
@endsection
