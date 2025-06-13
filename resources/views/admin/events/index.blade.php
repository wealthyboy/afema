@extends('admin.layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="text-right">
            <a href="{{ route('admin.events.create') }}" rel="tooltip" title="Add New" class="btn btn-primary btn-simple btn-xs">
                <i class="material-icons">add</i>
                Add Event
            </a>
            <button type="button" data-toggle="tooltip" title="Delete" class="btn btn-primary btn-simple btn-xs" onclick="confirm('Are you sure?') ? $('#form-events').submit() : false;"><i class="fa fa-trash-o"></i>
                Delete
            </button>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="fa fa-list-alt" aria-hidden="true"></i>
            </div>

            <div class="card-content">
                <h4 class="card-title">Events</h4>
                <form action="{{ route('admin.events.destroy',['event' => 1]) }}" method="post" id="form-events">
                    @csrf
                    @method('DELETE')
                    <div class="table-responsive">
                        <table class="table table-shopping">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        <div class="checkbox">
                                            <label>
                                                <input onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" type="checkbox" name="optionsCheckboxes">
                                            </label>
                                        </div>
                                    </th>
                                    <th class="th-description">Title</th>
                                    <th class="th-description">Type</th>
                                    <th class="text-left">Date</th>
                                    <th class="text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($events))
                                @foreach($events as $event)

                                <tr>
                                    <td>

                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value="{{ $event->id }}" name="selected[]">
                                            </label>
                                        </div>
                                    </td>

                                    <td class="td-name">
                                        <a href="#">{{ $event->title }}</a>
                                    </td>
                                    <td>
                                        {{ $event->type }}
                                    </td>
                                    <td>
                                        {{ $event->date_of_event }}
                                    </td>
                                    <td class="td-actions">
                                        <a href="{{ route('admin.events.edit',['event'=>$event->id])  }}" class="btn btn-simple btn-warning btn-icon edit"><i class="material-icons">dvr</i> Edit</a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif




                            </tbody>
                        </table>
                    </div>

                </form>

            </div>
        </div>
    </div>

</div>

@endsection

@section('inline-scripts')
@stop

@section('pagespecificscripts')
<script src="{{ asset('adset/js/jasny-bootstrap.min.js') }}"></script>
@stop