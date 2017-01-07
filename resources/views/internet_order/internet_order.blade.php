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
                        <button id="show-modal" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i> Add row</button>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                <table class="table table-hover demo-table-dynamic" id="tableWithDynamicRows">
                    <thead>
                    <tr>
                        <th>App name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Notes</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="v-align-middle">
                            <p>Hyperlapse</p>
                        </td>
                        <td class="v-align-middle">
                            <p>Description goes here</p>
                        </td>
                        <td class="v-align-middle">
                            <p>FREE</p>
                        </td>
                        <td class="v-align-middle">
                            <p>Notes go here</p>
                        </td>
                    </tr>
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
                        <h5>Payment <span class="semi-bold">Information</span></h5>
                        <p class="p-b-10">We need payment information inorder to process your order</p>
                    </div>
                    <div class="modal-body">
                        <form role="form">
                            <div class="form-group-attached">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default">
                                            <label>Company Name</label>
                                            <input type="email" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group form-group-default">
                                            <label>Card Number</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group form-group-default">
                                            <label>Card Holder</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="p-t-20 clearfix p-l-10 p-r-10">
                                    <div class="pull-left">
                                        <p class="bold font-montserrat text-uppercase">TOTAL</p>
                                    </div>
                                    <div class="pull-right">
                                        <p class="bold font-montserrat text-uppercase">$20.00</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 m-t-10 sm-m-t-10">
                                <button type="button" class="btn btn-primary btn-block m-t-5">Pay Now</button>
                            </div>
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
        // Update
        // Delete
    </script>
    @endsection