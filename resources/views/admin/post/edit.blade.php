@extends('admin.layout')

@section('styles')
    <link href="/css/pickadate/themes/default.css" rel="stylesheet">
    <link href="/css/pickadate/themes/default.date.css" rel="stylesheet">
    <link href="/css/pickadate/themes/default.time.css" rel="stylesheet">
    <link href="/css/selectize/selectize.css" rel="stylesheet">
    <link href="/css/selectize/selectize.bootstrap3.css" rel="stylesheet">
@stop

@section('content')
<div class="container-fluid">
    <div class="row page-title-row">
        <div class="col-md-12">
            <h3>Posts <small>» Edit Post</small></h3>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Post Edit Form</h3>
                </div>
                <div class="panel-body">

                    @include('admin.errors')
                    @include('admin.success')

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.post.update', $id) }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">

                        @include('admin.post.postform')

                        <div class="col-md-8">
                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-2">
                                    <button type="submit" class="btn btn-success btn-lg" name="action" value="finished">
                                        <i class="fa fa-floppy-o"></i>
                                            Save
                                    </button>
                                </div>
                            </div>
                        </div>
 
                    </form>

                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
<script src="/js/pickadate/picker.js"></script>
<script src="/js/pickadate/picker.date.js"></script>
<script src="/js/pickadate/picker.time.js"></script>
<script src="/js/selectize.min.js"></script>
<script>
    $(function() {
        //格式化日期和时间
        $("#publish_date").pickadate({
            format: "mmm-d-yyyy"
        });
        $("#publish_time").pickatime({
            format: "h:i A"
        });
        //
        $("#tags").selectize({
            create: true
        });
    });
</script>
@stop
