@extends('layouts.dash')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if(isset($subtitle))
                        <div class="card-title">
                            <h4>{{$subtitle}}</h4>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table id="drivers-table" class="display nowrap table table-hover table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Driver ID</th>
                                <th>Phone Number</th>
                                <th>Vehicle Type</th>
                                <th>Zone</th>
                                <th>Active</th>
                                <th>Banned</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th class="type-filter">Name</th>
                                <th class="type-filter">Driver ID</th>
                                <th class="type-filter">Phone Number</th>
                                <th class="type-filter">Vehicle Type</th>
                                <th class="type-filter">Zone</th>
                                <th class="select-filter">Active</th>
                                <th class="select-filter">Banned</th>
                                <th class="non_searchable">Actions</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection

@push('scripts')
    <script src="{{asset('js/lib/datatables/datatables.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $("#drivers-table").DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: '{!! route('drivers.data') !!}',
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'driver_id', name: 'driver_id' },
                    { data: 'phone_number', name: 'phone_number' },
                    { data: 'vehicle_type', name: 'vehicle_type' },
                    { data: 'zone_name', name: 'zone_name' },
                    { data: 'active', name: 'active',
                        "fnCreatedCell":  function (nTd, sData, oData, iRow, iCol) {
                            $(nTd).attr('data-val',$(nTd).text());
                            $(nTd).replaceWith('<td>'+user_status(sData+'__'+oData.id)+'</td>');
                        }
                    },
                    { data: 'banned', name: 'banned',
                        "fnCreatedCell":  function (nTd, sData, oData, iRow, iCol) {
                            $(nTd).attr('data-val',$(nTd).text());
                            $(nTd).replaceWith('<td>'+banned_status(sData+'__'+oData.id)+'</td>');
                        }
                    },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ],
                lengthMenu: [[10, 25, 50,100, -1], [10, 25, 50, 100, 'All']],
                initComplete: function () {
                    this.api().columns().every(function () {
                        var column = this;
                        var columnClass = column.footer().className;
                        var placeholder = column.footer().innerText;
                        if(columnClass != 'non_searchable' && columnClass != 'select-filter'){
                            var input = document.createElement("input");
                            input.className = 'col-sm-12';
                            input.placeholder = 'Search ' +placeholder;
                            $(input).appendTo($(column.footer()).empty())
                                .on('change', function () {
                                    column.search($(this).val(), false, false, true).draw();
                                });
                        }
                    });

                    this.api().columns().every( function () {
                        var column = this;
                        var columnClass = column.footer().className;

                        if(columnClass != 'non_searchable' && columnClass != 'type-filter'){

                            var select = $('<select class="col-sm-12"><option value="">--Select--</option></select>')
                                .appendTo( $(column.footer()).empty() )
                                .on( 'change', function () {
                                    var val = $.fn.dataTable.util.escapeRegex(
                                        $(this).val()
                                    );

                                    column
                                        .search( val ? '^'+val+'$' : '', true, false )
                                        .draw();
                                } );

                            column.data().unique().sort().each( function ( d, j ) {
                                if(d == 0){
                                    var opt = 'Inactive';
                                }else{
                                    var opt = 'Active';
                                }
                                select.append( '<option value="'+d+'">'+opt+'</option>' )
                            } );
                        }

                    } );

                }
            });
        });

    </script>
@endpush