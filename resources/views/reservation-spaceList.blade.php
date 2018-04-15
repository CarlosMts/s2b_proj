@extends('layouts.admin')
@section('content')
<div class="admin-content">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Space Reservations</h2>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="panel panel-default panel-table">
        <div class="panel-body">
            <table class="table table-striped table-bordered table-list">
                <tr>
                    <th>ID</th>
                    <th>Data Início</th>
                    <th>Data Fim</th>
                    <th>Nome</th>
                    <th>Detalhes</th>
                    <th width="80px">Preço</th>
                    <th width="80px">Action</th>
                </tr>
                @foreach ($reservation as $key => $res)
                <tr>
                    <td>{{ $res->id }}</td>
                    <td>{{ $res->date_begin }}</td>
                    <td>{{ $res->date_end }}</td>
                    <td>{{ $res->name }}</td>
                    <td>{{ $res->type }} - {{ $res->weekend === 0 ? "Sem fins de semana" : "Fins de semana incluídos" }}</td>
                    <td style="text-align: right;">{{ number_format($res->total_with_discount, 2, '.', ',') }}€</td>
                    <td>
                        <a class="btn btn-danger deleteSpaceModal" href="#">Cancelar</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    {!! $reservation->render() !!}
</div>
@endsection