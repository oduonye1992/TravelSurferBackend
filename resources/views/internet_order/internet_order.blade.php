@extends('bare')
@section('content')

    <!-- START JUMBOTRON -->
    <div class="jumbotron" data-pages="parallax">
        <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
            <div class="inner">
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Search Order</a>
                    </li>
                    <li><a href="#" class="active">Internet Price Offer</a>
                    </li>
                </ul>
                <!-- END BREADCRUMB -->
            </div>
        </div>
    </div>
    <!-- START CONTAINER FLUID -->
    <div class="container-fluid container-fixed-lg">
        <!-- START PANEL -->
        <div class="panel panel-transparent">
            <div class="panel-heading">
                <div class="panel-title">Internet Price Orders
                </div>
                <div class="pull-right">
                    <div class="col-xs-12">
                        <button id="add-btn" class="btn btn-complete btn-cons"> Add Item</button>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                <table class="table table-hover demo-table-dynamic" id="tableWithDynamicRows">
                    <thead>
                    <tr>
                        <th>Price (USD)</th>
                        <th>Flight Included</th>
                        <th>Baggage</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Boarding Type</th>
                        <th>Transport Included</th>
                        <th>Room Type</th>
                        <th>Booking Url</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td class="v-align-middle">
                                <p>{{$order['price']}}</p>
                            </td>
                            <td class="v-align-middle">
                                <p>{{$order['flight_included']}}</p>
                            </td>
                            <td class="v-align-middle">
                                <p>{{$order['baggage']}}</p>
                            </td>
                            <td class="v-align-middle">
                                <p>{{$order['travel_start_date']}}</p>
                            </td>
                            <td class="v-align-middle">
                                <p>{{$order['travel_end_date']}}</p>
                            </td>
                            <td class="v-align-middle">
                                <p>{{$order['boarding_type']}}</p>
                            </td>
                            <td class="v-align-middle">
                                <p>{{$order['transport_included']}}</p>
                            </td>
                            <td class="v-align-middle">
                                <p>{{$order['room_type']['name']}}</p>
                            </td>
                            <td class="v-align-middle">
                                <p>{{$order['booking_url']}}</p>
                            </td>
                            <td class="v-align-middle">
                                <div class="btn-group dropdown-default">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="width: 141px;" aria-expanded="false">
                                        Options
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu" style="width: 141px;">
                                        <li><a data-obj="{{json_encode($order)}}" class="edit-btn" href="#">Edit</a>
                                        </li>
                                        <li><a data-obj="{{json_encode($order)}}" class="push-btn" href="#">Send Push Notification</a>
                                        </li>
                                        <li><a href="#" data-id="{{$order['id']}}" class="delete-btn btn-danger btn btn-cons">Delete</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END PANEL -->
    </div>
    <!-- END CONTAINER FLUID -->



@endsection

@section('modal')
    <!-- Modal -->
    <div class="modal fade slide-up disable-scroll" id="modalSlideUp" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog ">
            <div class="modal-content-wrapper">
                <div class="modal-content">
                    <div class="modal-header clearfix text-left">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                        </button>
                        <h5 style="text-align: center;">Add Internet Order</h5>
                        <p class="p-b-10"></p>
                    </div>
                    <div class="modal-body">
                        <form role="form">
                            <div class="form-group-attached">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default">
                                            <label>Price (USD)</label>
                                            <input id="price" type="number" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default">
                                            <label>Flight Included</label>
                                            <select id="flight_included" class="form-control">
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default">
                                            <label>Baggage Included</label>
                                            <select id="baggage" class="form-control">
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default">
                                            <label>Start Date</label>
                                            <input id="travel_start_date" type="date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default">
                                            <label>End Date</label>
                                            <input id="travel_end_date" type="date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default">
                                            <label>Transport Included</label>
                                            <select id="transport_included" class="form-control">
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default">
                                            <label>Boarding Type</label>
                                            <select id="boarding_type" class="form-control">
                                                <option value="Full">Full</option>
                                                <option value="Weekly">Weekly</option>
                                                <option value="Maxi">Maxi</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default">
                                            <label>Booking Url</label>
                                            <input id="booking_url" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                        <div class="row">
                            <div class="col-sm-4 m-t-10 sm-m-t-10">
                                <button type="button" class="btn btn-complete btn-block m-t-5" id="save-btn">Save</button>
                            </div>
                            <div class="col-sm-4 m-t-10 sm-m-t-10"></div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
    <!-- /.modal-dialog -->
@endsection

@section('css')
    <link href="{{asset('assets/plugins/jquery-datatable/media/css/jquery.dataTables.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/datatables-responsive/css/datatables.responsive.css')}}" rel="stylesheet" type="text/css" media="screen" />
@endsection

@section('javascript')
    <script src="{{asset('assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/datatables-responsive/js/datatables.responsive.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/datatables-responsive/js/lodash.min.js')}}"></script>
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="{{asset('assets/js/datatables.js')}}" type="text/javascript"></script>
    <script>
        // Create
        var endpoint = "{{url('api/internet_price_order')}}";

        $('#add-btn').click(function(){
            openModal('new');
        });
        $('#save-btn').click(function(){
            var isEdit = $(this).attr('data-mode');
            if (isEdit && isEdit == 'edit'){
                update($(this).attr('data-id'));
            } else {
                saveForm();
            }
        });
        $('.edit-btn').click(function(){
            openEditModal(JSON.parse($(this).attr('data-obj')));
        });
        $('.push-btn').click(function(){
            push(JSON.parse($(this).attr('data-obj')));
        });
        $('.delete-btn').click(function(){
            if (window.confirm('Are you sure you want to delete this Airport')){
                deleteForm($(this).attr('data-id'));
            }
        });
        function push(data){
            var options = {
                url : endpoint+'/'+data.id+'/push',
                data : data,
                method : 'POST'
            };
            console.log(data);
            $.when(fetch(options))
                .done(function(data){
                    console.log(data);
                    notify({
                        message : "Notification sent!",
                        type : 'success'
                    });
                })
                .fail(function(err){
                    console.error(err);
                    notify('An error occured. Please try again', 'danger');
                });
        }
        function openEditModal(data){
            // Populate the data and show modal
            $('#title').val(data.title);
            $('#price').val(data.price);
            $('#flight_included').val(data.flight_included);
            $('#baggage').val(data.baggage);
            $('#travel_start_date').val(data.travel_start_date);
            $('#travel_end_date').val(data.travel_end_date);
            $('#boarding_type').val(data.boarding_type);
            $('#booking_url').val(data.booking_url);
            $('#transport_included').val(data.transport_included);
            // Update mode to edit
            $('#save-btn').attr('data-mode', 'edit').attr('data-id', data.id);
            $('#modalSlideUp').modal('toggle');
        }
        function openModal(){
            $('#title').val('');
            $('#price').val('');
            $('#flight_included').val('');
            $('#baggage').val('');
            $('#travel_start_date').val('');
            $('#travel_end_date').val('');
            $('#boarding_type').val('');
            $('#booking_url').val('');
            $('#transport_included').val('');

            $('#modalSlideUp').modal('toggle');
            // Hide the delete button
            $('#delete-btn').hide();
        }
        function saveForm(){
            // Get all value
            var values = getValues();
            save(values);
        }
        function save(data){
            var options = {
                url : endpoint,
                data : data,
                method : 'POST'
            };
            console.log(data);
            $.when(fetch(options))
                .done(function(data){
                    console.log(data);
                    location.reload();
                })
                .fail(function(err){
                    console.error(err);
                    alert('Error: '+err.message +' | '+JSON.stringify(err));
                })
        }
        function deleteForm(id){
            var options = {
                url : endpoint+'/'+id,
                method : 'DELETE'
            };
            $.when(fetch(options))
                .done(function(data){
                    console.log(data);
                    location.reload();
                })
                .fail(function(err){
                    console.error(err);
                    alert('Error: '+err.message +' | '+JSON.stringify(err));
                })
        }
        function update(id){
            var data = getValues();
            var options = {
                url : endpoint+'/'+id,
                data : data,
                method : 'PUT'
            };
            console.log(data);
            $.when(fetch(options))
                .done(function(data){
                    console.log(data);
                    //location.reload();
                })
                .fail(function(err){
                    console.error(err);
                    alert('Error: '+err.message +' | '+JSON.stringify(err));
                })
        }
        function getValues(){
            return    {
                price : $('#price').val(),
                flight_included : $('#flight_included').val(),
                baggage : $('#baggage').val(),
                travel_start_date : $('#travel_start_date').val(),
                travel_end_date : $('#travel_end_date').val(),
                boarding_type : $('#boarding_type').val(),
                room_type: {{$search_order->room_type}},
                booking_url: $('#booking_url').val(),
                search_order_id : {{$search_order->id}},
                hotel_id : {{$search_order->hotel_id}},
                airport_id : {{$search_order->airport_id}},
                transport_included : $('#transport_included').val()
            }
        }
    </script>
@endsection