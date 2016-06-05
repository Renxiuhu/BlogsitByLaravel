@extends('admin.layout')
<!-- 导入Selectize（下拉列表优化） 和 Pickadate（日期时间选择）的css文件 -->
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
            <h3>Posts <small>» Add New Post</small></h3>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">New Post Form</h3>
                </div>
                <div class="panel-body">
					<!-- 导入显示错误视图 -->
                    @include('admin.errors')

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.post.store') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
						<!-- 导入公共form视图 -->
                        @include('admin.post.postform')

                        <div class="col-md-8">
                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-2">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fa fa-disk-o"></i>
                                        Save New Post
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
<!-- 导入Selectize（下拉列表优化） 和 Pickadate（日期时间选择）的js文件 -->
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