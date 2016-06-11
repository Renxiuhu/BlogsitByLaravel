<!-- 导入模板 -->
@extends('admin.layout')

@section('styles')
    <style>
        td{
            word-wrap:break-word;
            word-break:break-all;
        }
    </style>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-6">
                <h3>Tags <small>» Listing</small></h3>
            </div>
            <div class="col-md-6 text-right">
                <a href="/admin/tag/create" class="btn btn-success btn-md">
                    <i class="fa fa-plus-circle"></i> New Tag
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
				<!-- 导入其他视图文件 -->
                @include('admin.errors')
                @include('admin.success')

                <table id="tags-table" class="table table-striped table-bordered">
                    <!-- 表头 -->
                    <thead>
                        <tr>
                            <th>Tag</th>
                            <th>Title</th>
                            <th class="hidden-xs">Subtitle</th>
                            <th class="hidden-md">Meta Description</th>
                            <th class="hidden-xs">Direction</th>
                            <th data-sortable="false">Actions</th>
                        </tr>
                     </thead>
                     <!-- 表内容 -->
                    <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $tag->tag }}</td>
                            <td>{{ $tag->title }}</td>
                            <td class="hidden-xs">{{ $tag->subtitle }}</td>
                            <td class="hidden-md">{{ $tag->meta_description }}</td>
                            <td class="hidden-xs">
                                @if ($tag->reverse_direction)
                                    Reverse
                                @else
                                    Normal
                                @endif
                            </td>
                            <td>
                                <a href="/admin/tag/{{ $tag->id }}/edit" class="btn btn-primary btn-md">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#modal-delete">
                                    <i class="fa fa-times-circle"></i>
                                    Delete
                                </button>
                            </td>
                            @include('admin.tag.deldialog')
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@stop

@section('scripts')
    <script>
        $(function() {
            //将表格转换为DataTable样式
            $("#tags-table").DataTable({});
        });
    </script>
@stop