@extends('admin.layout')

@section('content')
<div class="container-fluid">
    <div class="row page-title-row">
        <div class="col-md-12">
            <h3>Tags <small>» Edit Tag</small></h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Tag Edit Form</h3>
                </div>
                <div class="panel-body">

                    @include('admin.errors')
                    @include('admin.success')

                    <form class="form-horizontal" role="form" method="POST" action="/admin/tag/{{ $id }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="id" value="{{ $id }}">

                        <div class="form-group">
                            <label for="tag" class="col-md-3 control-label">Tag</label>
                            <div class="col-md-3">
                                <p class="form-control-static">{{ $tag }}</p>
                            </div>
                        </div>

                        @include('admin.tag.tagform')

                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-3">
                                <button type="submit" class="btn btn-primary btn-md">
                                    <i class="fa fa-save"></i>
                                    Save Changes
                                </button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@stop