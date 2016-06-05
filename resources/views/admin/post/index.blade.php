<!-- 导入模板 -->
@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-6">
                <h3>Posts <small>» Listing</small></h3>
            </div>
            <div class="col-md-6 text-right">
                <a href="/admin/post/create" class="btn btn-success btn-md">
                    <i class="fa fa-plus-circle"></i> New Post
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
                            <th>Published</th>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th data-sortable="false">Actions</th>
                        </tr>
                     </thead>
                     <!-- 表内容 -->
                    <tbody>
                    @foreach ($posts as $post)
                        <tr>
                        	<!-- data-order用于DataTable表进行排序 -->
                            <td data-order="{{ $post->published_at->timestamp}}">{{ $post->published_at->format('j-M-y g:ia') }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->subtitle }}</td>
                            <td>
                                <a href="/admin/post/{{ $post->id }}/edit" class="btn btn-primary btn-md">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <a href="/blog/{{$post->slug}}" class="btn btn-primary btn-md">
                                    <i class="fa fa-edit"></i> view
                                </a>
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
            $("#tags-table").DataTable({
				order: [[0,"desc"]]
            });
        });
    </script>
@stop