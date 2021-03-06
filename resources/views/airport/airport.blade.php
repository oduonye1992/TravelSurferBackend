@extends('bare')
@section('content')

    <!-- START JUMBOTRON -->
    <div class="jumbotron" data-pages="parallax">
        <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
            <div class="inner">
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li><a href="#" class="active">Airports</a>
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
                <div class="panel-title">List of Airports
                </div>
                <div class="pull-right">
                    <div class="col-xs-12">
                        <button id="add-btn" class="btn btn-complete btn-cons"> Add an Airport</button>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                <table class="table table-hover demo-table-dynamic" id="tableWithDynamicRows">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Country</th>
                        <th>Image</th>
                        <th>Options</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($airports as $airport)
                        <tr>
                            <td class="v-align-middle">
                                <p>{{$airport['name']}}</p>
                            </td>
                            <td class="v-align-middle">
                                <p>{{$airport['location']}}</p>
                            </td>
                            <td class="v-align-middle">
                                <p>{{$airport['country']['title']}}</p>
                            </td>
                            <td class="v-align-middle">
                                <p><img src="{{$airport['image']}}" width="100"/></p>
                            </td>
                            <td class="v-align-middle">
                                <div class="btn-group dropdown-default">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="width: 141px;" aria-expanded="false">
                                        Options
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu" style="width: 141px;">
                                        <li><a data-obj="{{json_encode($airport)}}" class="edit-btn" href="#">Edit Hotel</a>
                                        </li>
                                        <li><a href="#" data-id="{{$airport['id']}}" class="delete-btn btn-danger btn btn-cons">Delete Hotel</a>
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
                        <h5 style="text-align: center;">Add Airport</h5>
                        <p class="p-b-10"></p>
                    </div>
                    <div class="modal-body">
                        <form role="form">
                            <div class="form-group-attached">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default">
                                            <label>Airport Name</label>
                                            <input id="name" type="email" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default">
                                            <label>Address</label>
                                            <textarea id="location" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default">
                                            <label>Country</label>
                                            <select id="country" class="form-control">
                                                @foreach($countries as $country)
                                                    <option value="{{$country->id}}">{{$country->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default">
                                            <label>Image Link</label>
                                            <input id="image" type="text" class="form-control">
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
        var endpoint = "{{url('api/airports')}}";
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
        $('.delete-btn').click(function(){
            if (window.confirm('Are you sure you want to delete this Airport')){
                deleteForm($(this).attr('data-id'));
            }
        });

        function openEditModal(data){
            // Populate the data and show modal
            $('#name').val(data.name);
            $('#location').val(data.location);
            $('#country').val(data.country_id);
            $('#image').val(data.image);
            // Update mode to edit
            $('#save-btn').attr('data-mode', 'edit').attr('data-id', data.id);
            $('#modalSlideUp').modal('toggle');
        }
        function openModal(){
            $('#name').val('');
            $('#location').val('');
            $('#country').val('');
            $('#image').val('');
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
                        location.reload();
                    })
                    .fail(function(err){
                        console.error(err);
                        alert('Error: '+err.message +' | '+JSON.stringify(err));
                    })
        }
        function getValues(){
            return    {
                name : $('#name').val(),
                location : $('#location').val(),
                country_id : $('#country').val(),
                image : $('#image').val()
            }
        }

    </script>
@endsection