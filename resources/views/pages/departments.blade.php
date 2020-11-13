@extends('tamplate')
@section('content')
    <div class="container">
        <table class="table">
            <thead class="table__header">
            <tr class="table__row">
                <th class="table__cell"></th>
                <th class="table__cell">Отдел</th>
                <th class="table__cell">Кол-во сотрудников</th>
                <th class="table__cell">Максимальная заработная плата</th>
            </tr>
            </thead>
            <tbody class="table__tbody">
            @foreach($data as $element)
            <tr class="table__row">
                <td class="table__cell"><i class="fas fa-trash editable" data-page="departments" data-id="{{$element[0]}}"></i><i class="fas fa-pen edit editable" data-page="departments" data-id="{{$element[0]}}"></i></td>
                <td class="table__cell"><span class="table__cell--header">Отдел</span>{{$element[1]}}</td>
                <td class="table__cell"><span class="table__cell--header">Кол-во сотрудников</span>{{$element[2]}}</td>
                <td class="table__cell"><span class="table__cell--header">Максимальная заработная плата</span>{{$element[3]}} <i class="fas fa-dollar-sign"></i></td>
            </tr>
            @endforeach
            <tr class="table__row">
                <td class="table__cell"><i class="far fa-plus-square edit editable" data-page="departments" data-id="0"></i></td>
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
