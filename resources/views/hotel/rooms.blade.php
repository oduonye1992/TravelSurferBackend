@extends('bare')
@section('content')

    <!-- START JUMBOTRON -->
    <div class="jumbotron" data-pages="parallax">
        <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
            <div class="inner">
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Tables</a>
                    </li>
                    <li><a href="#" class="active">Data Tables</a>
                    </li>
                </ul>
                <!-- END BREADCRUMB -->
                <div class="row">
                    <div class="col-lg-7 col-md-6 ">
                        <!-- START PANEL -->
                        <div class="full-height">
                            <div class="panel-body text-center">
                                <img class="image-responsive-height demo-mw-600" src="{{asset('assets/img/demo/tables.jpg')}}" alt="">
                            </div>
                        </div>
                        <!-- END PANEL -->
                    </div>
                    <div class="col-lg-5 col-md-6 ">
                        <!-- START PANEL -->
                        <div class="panel panel-transparent">
                            <div class="panel-heading">
                                <div class="panel-title">Getting started
                                </div>
                            </div>
                            <div class="panel-body">
                                <h3>Easier than finding a needle in the haystack.</h3>
                                <p>Sharing the same stylized design layout, these tables allows for the effective compilation and organization of data with easy access and maneuverability for users. </p>
                                <p class="small hint-text m-t-5">VIA senior product manage
                                    <br> for UI/UX at REVOX</p>
                                <br>
                                <button class="btn btn-primary btn-cons">More</button>
                            </div>
                        </div>
                        <!-- END PANEL -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- START CONTAINER FLUID -->
    <div class="container-fluid container-fixed-lg">
        <!-- START PANEL -->
        <div class="panel panel-transparent">
            <div class="panel-heading">
                <div class="panel-title">Table with Dynamic Rows
                </div>
                <div class="pull-right">
                    <div class="col-xs-12">
                        <button id="add-btn" class="btn btn-complete btn-cons"> Add row</button>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                <table class="table table-hover demo-table-dynamic" id="tableWithDynamicRows">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Options</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($rooms as $room)
                        <tr>
                            <td class="v-align-middle">
                                <p>{{$room['name']}}</p>
                            </td>
                            <td class="v-align-middle">
                                <div class="btn-group dropdown-default">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="width: 141px;" aria-expanded="false">
                                        Options
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu" style="width: 141px;">
                                        <li><a data-obj="{{json_encode($room)}}" class="edit-btn" href="#">Edit Image</a>
                                        </li>
                                        <li><a href="#" data-id="{{$room['id']}}" class="delete-btn btn-danger btn btn-cons">Delete Image</a>
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
                                            <label>Name</label>
                                            <input id="name" type="text" class="form-control">
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
        var endpoint = "{{url('api/hotel_image')}}/";
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
            if (window.confirm('Are you sure you want to delete this Image')){
                deleteForm($(this).attr('data-id'));
            }
        });

        function openEditModal(data){
            // Populate the data and show modal
            $('#name').val(data.image);

            // Update mode to edit
            $('#save-btn').attr('data-mode', 'edit').attr('data-id', data.id);
            $('#modalSlideUp').modal('toggle');
        }
        function openModal(){
            $('#name').val('');

            $('#modalSlideUp').modal('toggle');
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
                url : endpoint+id,
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
                url : endpoint+id,
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
                hotel_id : "{{$hotel->id}}"
            }
        }

        var fetch = function(options){
            var txDeferred = $.Deferred();
            $.ajax({
                url : options.url,
                method : options.method || 'GET',
                data : options.data || {},
                headers : options.headers || {},
                success : txDeferred.resolve,
                error : txDeferred.reject
            });
            return txDeferred.promise();
        };
    </script>
@endsection