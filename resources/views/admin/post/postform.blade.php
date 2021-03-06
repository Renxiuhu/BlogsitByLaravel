<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <label for="title" class="col-md-2 control-label">
                Title
            </label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="title" autofocus id="title" value="{{ $title }}">
            </div>
        </div>
        <div class="form-group">
            <label for="subtitle" class="col-md-2 control-label">
                Subtitle
            </label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="subtitle" id="subtitle" value="{{ $subtitle }}">
            </div>
        </div>
        <div class="form-group">
            <label for="page_image" class="col-md-2 control-label">
                Page Image
            </label>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="page_image" id="page_image" alt="Image thumbnail" value="{{ $page_image }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="content" class="col-md-2 control-label">
                Content
            </label>
            <div class="col-md-10">
                 <textarea class="form-control" name="content" rows="14" id="content">{{ $content }}</textarea>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="publish_date" class="col-md-3 control-label">
                Pub Date
            </label>
            <div class="col-md-8">
                <input class="form-control" name="publish_date" id="publish_date" type="text" value="{{ $publish_date }}">
            </div>
        </div>
        <div class="form-group">
            <label for="publish_time" class="col-md-3 control-label">
                Pub Time
            </label>
            <div class="col-md-8">
                <input class="form-control" name="publish_time" id="publish_time" type="text" value="{{ $publish_time }}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-8 col-md-offset-3">
                <div class="checkbox">
                    <label>
                        <input {{ $is_draft ? 'checked' : ''}} type="checkbox" name="is_draft">
                        Draft?
                    </label>
                 </div>
            </div>
        </div>
        <div class="form-group">
            <label for="tags" class="col-md-3 control-label">
                Tags
            </label>
            <div class="col-md-8">
                <select name="tags[]" id="tags" class="form-control" multiple>
                @foreach ($tags as $tag)
                    <option  {{in_array($tag->tag, $selectedtags)? 'selected':''}} value="{{ $tag->tag}}">
                        {{ $tag->tag }}
                    </option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="layout" class="col-md-3 control-label">
                Layout
            </label>
            <div class="col-md-8">
                <input type="text" class="form-control" name="layout" id="layout" value="{{ $layout }}">
            </div>
        </div>
        <div class="form-group">
            <label for="meta_description" class="col-md-3 control-label">
                Meta
            </label>
            <div class="col-md-8">
                <textarea class="form-control" name="meta_description" id="meta_description" rows="6">
                    {{ $meta_description }}
                </textarea>
            </div>
        </div>

    </div>
</div>