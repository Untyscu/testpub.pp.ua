@extends('tamplate')
@section('content')
    <div class="container">
        <table class="table">
            <thead class="table__header">
            <tr class="table__row">
                <th class="table__cell"></th>
                <th class="table__cell">Имя</th>
                <th class="table__cell">Фамилия</th>
                <th class="table__cell">Отчество</th>
                <th class="table__cell">Пол</th>
                <th class="table__cell">Заработная плата</th>
                <th class="table__cell">Отделы</th>
            </tr>
            </thead>
            <tbody class="table__tbody">
            @foreach($employees as $employee)
            <tr class="table__row">
                <td class="table__cell"><i class="fas fa-trash editable" data-page="employees" data-id="{{$employee->id}}"></i><i class="fas fa-pen edit editable" data-page="employees" data-id="{{$employee->id}}"></i></td>
                <td class="table__cell"><span class="table__cell--header">Имя</span>{{$employee->fname}}</td>
                <td class="table__cell"><span class="table__cell--header">Фамилия</span>{{$employee->lname}}</td>
                <td class="table__cell"><span class="table__cell--header">Отчество</span>{{$employee->mname}}</td>
                <td class="table__cell"><span class="table__cell--header">Пол</span>{{$employee->sex}}</td>
                <td class="table__cell"><span class="table__cell--header">Заработная плата</span>{{$employee->wage}} <i class="fas fa-dollar-sign"></i></td>
                <td class="table__cell"><span class="table__cell--header">Отделы</span>
                @foreach($departments as $department)
                    @if(array_key_exists($department->id, array_flip(explode(';', $employee->departments))))
                        {{$department->name}}
                    @endif
                @endforeach
                </td>
            </tr>
            @endforeach
            <tr class="table__row">
                <td class="table__cell"><i class="far fa-plus-square edit editable" data-page="employees" data-id="0"></i></td>
                <td class="table__cell"></td>
                <td class="table__cell"></td>
                <td class="table__cell"></td>
                <td class="table__cell"></td>
                <td class="table__cell"></td>
                <td class="table__cell"></td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
