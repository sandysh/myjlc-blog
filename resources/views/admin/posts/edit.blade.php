@extends('admin.layouts.app')
@push('styles')
<link rel="stylesheet" href="{{ asset('/css/bootstrap-tagsinput.css') }}">
  <style>
    .ck-editor__editable[role="textbox"] {
        /* editing area */
        min-height: 200px;
    }
    .bootstrap-tagsinput .tag {
        margin-right: 2px;
        color: white;
        background: #8c1717;
        border-radius: 2px;
        padding: 2px;
    }
    .bootstrap-tagsinput{
      width: 100%;;
    }
    .tt-open{
      padding: 5px;
      width: 50px;
      background: #0844a3;
      color: #ffffff;
    }
    .tt-open {
      width: 200px;
      top: 28px !important;
      left: -5px !important;
    }
  </style>
@endpush
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add New Post</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">New</h6>
    </div>  
    <div class="card-body">
        <form method="POST" action="{{ route('posts.update',[$post->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">    
                <label for="category_id">Category</label>
                <select name="category_id" class="form-select form-control" aria-label="Default select example">
                    <option selected disabled>Select a category</option>
                    @foreach ($categories as $category )
                        <option {{ $post->category_id === $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input name="title" type="text" class="form-control" id="title" aria-describedby="name" value="{{$post->title }}">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class=" ">
                <label for="body" class="form-label">Body</label>
               <textarea id="editor" name="body" style="display: none">
                {{$post->body }}
               </textarea>
                @error('body')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-3">
                <label for="tags" class="form-label">Tags</label>
                <input name="tags" id="tags" type="text" value="{{ $post->tagString }}" data-role="tagsinput" />
            </div>

            <div class="mt-3">
                <label for="readingTime" class="form-label">Reading Time</label>
                <input name="reading_time" type="text" class="form-control" id="title" aria-describedby="reading_time" value="{{$post->reading_time }}">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="m-3">
                <label for="body" class="form-label">Featured_image</label><br>
                <input type="file" name="feat_image" id="feat-image">
                <div>
                    <img class="mt-2" style="width: 10rem" id="image-preview" src="{{ Storage::disk('public')->url($post->featured_image) }}" alt="your image" />
                </div>
            </div>
            
            <div class="m-3 form-check">
                <input name="active" type="checkbox" class="form-check-input" id="exampleCheck1" {{$post->active ? 'checked' : '' }}>
                <label class="form-check-label" for="exampleCheck1">Active</label>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/super-build/ckeditor.js"></script>
<script src="{{ asset('/js/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('/js/typeahead.bundle.min.js') }}"></script>
<script>
  var citynames = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    prefetch: {
      url: '/admin/tags',
      filter: function(list) {
        return $.map(list, function(cityname) {
          console.log(cityname);
          return { name: cityname }; });
      }
    }
  });
  citynames.initialize();

  $('#tags').tagsinput({
    typeaheadjs: {
      name: 'citynames',
      displayKey: 'name',
      valueKey: 'name',
      source: citynames.ttAdapter()
    }
  });
</script>
<script>
      let editor;
      CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
          // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
          toolbar: {
              items: [
                  'exportPDF','exportWord', '|',
                  'findAndReplace', 'selectAll', '|',
                  'heading', '|',
                  'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                  'bulletedList', 'numberedList', 'todoList', '|',
                  'outdent', 'indent', '|',
                  'undo', 'redo',
                  '-',
                  'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                  'alignment', '|',
                  'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                  'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                  'sourceEditing'
              ],
              shouldNotGroupWhenFull: true
          },
          // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
          heading: {
              options: [
                  { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                  { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                  { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                  { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                  { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                  { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                  { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
              ]
          },
          // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
          placeholder: '',
          // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
          fontFamily: {
              options: [
                  'default',
                  'Arial, Helvetica, sans-serif',
                  'Courier New, Courier, monospace',
                  'Georgia, serif',
                  'Lucida Sans Unicode, Lucida Grande, sans-serif',
                  'Tahoma, Geneva, sans-serif',
                  'Times New Roman, Times, serif',
                  'Trebuchet MS, Helvetica, sans-serif',
                  'Verdana, Geneva, sans-serif'
              ],
              supportAllValues: true
          },
          // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
          fontSize: {
              options: [ 10, 12, 14, 'default', 18, 20, 22 ],
              supportAllValues: true
          },
          // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
          // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
          htmlSupport: {
              allow: [
                  {
                      name: /.*/,
                      attributes: true,
                      classes: true,
                      styles: true
                  }
              ]
          },
          // Be careful with enabling previews
          // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
          htmlEmbed: {
              showPreviews: true
          },
          // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
          link: {
              decorators: {
                  addTargetToExternalLinks: true,
                  defaultProtocol: 'https://',
                  toggleDownloadable: {
                      mode: 'manual',
                      label: 'Downloadable',
                      attributes: {
                          download: 'file'
                      }
                  }
              }
          },
          // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
          mention: {
              feeds: [
                  {
                      marker: '@',
                      feed: [
                          '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                          '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                          '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                          '@sugar', '@sweet', '@topping', '@wafer'
                      ],
                      minimumCharacters: 1
                  }
              ]
          },
          // The "super-build" contains more premium features that require additional configuration, disable them below.
          // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
          removePlugins: [
              // These two are commercial, but you can try them out without registering to a trial.
              // 'ExportPdf',
              // 'ExportWord',
              'CKBox',
              'CKFinder',
              'EasyImage',
              // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
              // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
              // Storing images as Base64 is usually a very bad idea.
              // Replace it on production website with other solutions:
              // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
              // 'Base64UploadAdapter',
              'RealTimeCollaborativeComments',
              'RealTimeCollaborativeTrackChanges',
              'RealTimeCollaborativeRevisionHistory',
              'PresenceList',
              'Comments',
              'TrackChanges',
              'TrackChangesData',
              'RevisionHistory',
              'Pagination',
              'WProofreader',
              // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
              // from a local file system (file://) - load this site via HTTP server if you enable MathType.
              'MathType',
              // The following features are part of the Productivity Pack and require additional license.
              'SlashCommand',
              'Template',
              'DocumentOutline',
              'FormatPainter',
              'TableOfContents',
              'PasteFromOfficeEnhanced'
          ]
      }).then( newEditor => {
      editor = newEditor;
      } )
      .catch( error => {
          console.error( error );
      } );

      let imgInp = document.getElementById('feat-image');
      imgInp.onchange = evt => {
      const [file] = imgInp.files
      if (file) {
        document.getElementById('image-preview').src = URL.createObjectURL(file)
      }
    }
</script>
@endpush