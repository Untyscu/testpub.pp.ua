@extends('tamplate')
@section('content')
<div class="container">
    <table class="table">
        <thead class="table__header">
        <tr class="table__row">
            <th class="table__cell">Сотрудники</th>
            @foreach($departments as $department)
            <th class="table__cell">{{$department->name}}</th>
            @endforeach
        </tr>
        </thead>
        <tbody class="table__tbody">
        @foreach($employees as $employee)
            <tr class="table__row">
                <td class="table__cell"><span class="table__cell--header">Сотрудник</span>{{$employee->fname." ".$employee->lname}}</td>
                @foreach($departments as $department)
                    <td class="table__cell">
                        <span class="table__cell--header">{{$department->name}}</span>
                        @if(array_key_exists($department->id, array_flip(explode(';', $employee->departments))))
                            <i class="fas fa-check"></i>
                        @endif
                    </td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection

