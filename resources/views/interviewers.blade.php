@extends('layouts.app')

@section('content')

<!--<div class="panel-body">-->
    
@include('common.errors')
    
<div class="pure-g">
    <div class="pure-u-1-8"></div>
    <div class="pure-u-1-8"></div>
    <div class="pure-u-5-8">
    
    <form action="{{ url('interviewer') }}" method="POST" class="pure-form pure-form-aligned">
        {{ csrf_field() }}
        <div class="pure-control-group">
            <label for="interviewer-intnr" >Interviewernummer</label>
            <input type="text" name="intnr" id="interviewer-intnr" >
        </div>
        <div class="pure-control-group">
            <label for="interviewer-vorname">Vorname</label>
            <input type="text" name="vorname" id="interviewer-vorname">
        </div>
        <div class="pure-control-group">
            <label for="interviewer-nachname">Nachname</label>
            <input type="text" name="nachname" id="interviewer-nachname">
        </div>
        
        <div class="pure-control-group">
            <button class="pure-button pure-button-primary">
                <i class="fa fa-plus"></i> Add Interviewer
            </button>
        </div>
    </form>
    </div>
    <div class="pure-u-1-8"></div>
</div>
    
    @if (count($interviewers) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Interviewerliste
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                    <th>Intnr</th>
                    <th>Vorname</th>
                    <th>Nachname</th>
                    <th>&nbsp</th>
                    </thead>

                    <tbody>
                        @foreach ($interviewers as $interviewer)
                            <tr>
                                <td class="table-bordered">
                                    <div>{{ $interviewer->intnr }} </div>
                                </td>
                                <td class="table-bordered">
                                    <div>{{ $interviewer->vorname }} </div>
                                </td>
                                <td class="table-bordered">
                                    <div>{{ $interviewer->nachname }} </div>
                                </td>
                                <td>
                                     <form action="{{ url('interviewer/'.$interviewer->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>    
    @endif

@endsection