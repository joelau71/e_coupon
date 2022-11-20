<div class="mt-2">
    @props(['disabled' => false])
    <textarea
        {{ $disabled ? 'disabled' : '' }}
        class="w-full rounded shadow-sm mt-2 border-gray-300 focus:outline-none h-20 p-2{{ $attributes['isRichText'] ? ' tinymce-textarea': ''}}"
        name="{{ $attributes['name'] }}"
    >{{ $slot }}</textarea>
</div>

@once
    @push('footer')
        <script>
            function tinymceInit() {
                tinymce.init({
                    selector: ".tinymce",
                    height: 500,
                    plugins: [
                        "advlist autolink lists link image charmap print preview anchor",
                        "searchreplace visualblocks code fullscreen",
                        "insertdatetime media table paste imagetools wordcount template"
                    ],
                    inline: true,
                    toolbar:
                        "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | code template",
                    //content_style:"body { font-family:Helvetica,Arial,sans-serif; font-size:14px }",
                    image_title: true,
                    automatic_uploads: true,
                    images_upload_url: "/backend/upload",
                    //images_upload_url: "/admin/media-popup",
                    relative_urls: false,
                    file_picker_types: "image",
                    content_css: "/css/app.css",
                    //file_browser_callback: "fileBrowserCallBack",
                    //images_upload_base_path: "/media",

                    /* style_formats: [
                        {
                            title: "Container",
                            selector: "div",
                            classes: "container px-8 mx-auto"
                        },
                        {
                            title: "Page Title",
                            selector: "p",
                            classes: "text-3xl sm:text-4xl lg:text-5xl lg:leading-normal"
                        },
                        {
                            title: "Block Title",
                            selector: "p",
                            classes: "text-2xl sm:text-3xl lg:text-4xl lg:leading-normal"
                        },
                        {
                            title: "Block Sub Title",
                            selector: "p",
                            classes: "text-xs lg:text-base font-bold"
                        },
                        { title: "Text", selector: "p", classes: "text-xs lg:text-base" }
                    ], */
                    file_picker_callback: function(callback, value, meta) {
                        const input = document.createElement("input");
                        input.setAttribute("type", "file");
                        input.setAttribute("accept", "image/*");
                        input.onchange = function() {
                            var file = this.files[0];
                            var reader = new FileReader();
                            reader.onload = function() {
                                var id = "blobid_" + new Date().getTime();
                                var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                                var base64 = reader.result.split(",")[1];
                                var blobInfo = blobCache.create(id, file, base64);
                                blobCache.add(blobInfo);
                                callback(blobInfo.blobUri(), { title: file.name });
                            };
                            reader.readAsDataURL(file);
                        };
                        input.click();
                    },
                    video_template_callback: function(data) {
                        return (
                            '<div class="my-test"><video width="' +
                            data.width +
                            '" height="' +
                            data.height +
                            '"' +
                            (data.poster ? ' poster="' + data.poster + '"' : "") +
                            ' controls="controls">\n' +
                            '<source src="' +
                            data.source +
                            '"' +
                            (data.sourcemime ? ' type="' + data.sourcemime + '"' : "") +
                            " />\n" +
                            (data.altsource
                                ? '<source src="' +
                                data.altsource +
                                '"' +
                                (data.altsourcemime
                                    ? ' type="' + data.altsourcemime + '"'
                                    : "") +
                                " />\n"
                                : "") +
                            "</video></div>"
                        );
                    },
                    /* setup: function(editor) {
                        editor.on("blur", function(e) {
                            const id = this.id;
                            const $element = $("#" + id);
                            const lang = $element.attr("data-lang");
                            Livewire.emit("updateContent", lang, editor.getContent());
                        });
                    } */
                    /* setup: function(editor) {
                        editor.on("change", function(e) {
                            const id = this.id;
                            const $element = $("#" + id);
                            const lang = $element.attr("data-lang");
                            Livewire.emit("updateContent", lang, editor.getContent());
                        });
                    } */
                    templates: [
                      {
                        title: "Video Button",
                        description: "Display on Top Video Button",
                        content: `<a href="https://www.youtube.com/watch?v=RKNJxvYN4yw" rel="noopener noreferrer" target="_blank" style="display: inline-block; padding: 5px 20px; text-decoration: none; border: 1px solid #EF4123; border-radius: 100vmax; color: #EF4123; font-family: '微軟正黑體', Arial, Helvetica, sans-serif; font-weight: bold;">立即觀看</a>`,
                      },
                    ],
                });

                tinymce.init({
                    selector: ".tinymce-textarea",
                    height: 500,
                    plugins: [
                        "advlist autolink lists link image charmap print preview anchor",
                        "searchreplace visualblocks code fullscreen",
                        "insertdatetime media table paste imagetools wordcount template"
                    ],
                    toolbar:
                        "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | code template",
                    //content_style:"body { font-family:Helvetica,Arial,sans-serif; font-size:14px }",
                    image_title: true,
                    automatic_uploads: true,
                    images_upload_url: "/backend/upload",
                    //images_upload_url: "/admin/media-popup",
                    relative_urls: false,
                    file_picker_types: "image",
                    content_css: "/css/app.css",
                    //file_browser_callback: "fileBrowserCallBack",
                    //images_upload_base_path: "/media",

                    /* style_formats: [
                        {
                            title: "Container",
                            selector: "div",
                            classes: "container px-8 mx-auto"
                        },
                        {
                            title: "Page Title",
                            selector: "p",
                            classes: "text-3xl sm:text-4xl lg:text-5xl lg:leading-normal"
                        },
                        {
                            title: "Block Title",
                            selector: "p",
                            classes: "text-2xl sm:text-3xl lg:text-4xl lg:leading-normal"
                        },
                        {
                            title: "Block Sub Title",
                            selector: "p",
                            classes: "text-xs lg:text-base font-bold"
                        },
                        { title: "Text", selector: "p", classes: "text-xs lg:text-base" }
                    ], */
                    file_picker_callback: function(callback, value, meta) {
                        const input = document.createElement("input");
                        input.setAttribute("type", "file");
                        input.setAttribute("accept", "image/*");
                        input.onchange = function() {
                            var file = this.files[0];
                            var reader = new FileReader();
                            reader.onload = function() {
                                var id = "blobid_" + new Date().getTime();
                                var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                                var base64 = reader.result.split(",")[1];
                                var blobInfo = blobCache.create(id, file, base64);
                                blobCache.add(blobInfo);
                                callback(blobInfo.blobUri(), { title: file.name });
                            };
                            reader.readAsDataURL(file);
                        };
                        input.click();
                    },
                    video_template_callback: function(data) {
                        return (
                            '<div class="my-test"><video width="' +
                            data.width +
                            '" height="' +
                            data.height +
                            '"' +
                            (data.poster ? ' poster="' + data.poster + '"' : "") +
                            ' controls="controls">\n' +
                            '<source src="' +
                            data.source +
                            '"' +
                            (data.sourcemime ? ' type="' + data.sourcemime + '"' : "") +
                            " />\n" +
                            (data.altsource
                                ? '<source src="' +
                                data.altsource +
                                '"' +
                                (data.altsourcemime
                                    ? ' type="' + data.altsourcemime + '"'
                                    : "") +
                                " />\n"
                                : "") +
                            "</video></div>"
                        );
                    },
                    /* setup: function(editor) {
                        editor.on("blur", function(e) {
                            const id = this.id;
                            const $element = $("#" + id);
                            const lang = $element.attr("data-lang");
                            Livewire.emit("updateContent", lang, editor.getContent());
                        });
                    } */
                    /* setup: function(editor) {
                        editor.on("change", function(e) {
                            const id = this.id;
                            const $element = $("#" + id);
                            const lang = $element.attr("data-lang");
                            Livewire.emit("updateContent", lang, editor.getContent());
                        });
                    } */
                    templates: [
                      {
                        title: "Video Button",
                        description: "Display on Top Video Button",
                        content: `
                        <div>
                            <div style="font-size: 1.2rem; font-weight: bold;margin:1rem">標題</div>
                            <div>內容</div>
                            <div style="margin-top:0.625rem">
                                <a href="https://www.youtube.com/watch?v=RKNJxvYN4yw" rel="noopener noreferrer" target="_blank" style="display: inline-block; padding: 5px 20px; text-decoration: none; border: 1px solid #EF4123; border-radius: 100vmax; color: #EF4123; font-family: '微軟正黑體', Arial, Helvetica, sans-serif; font-weight: bold;">立即觀看</a>
                            </div>
                        </div>`,
                      },
                    ]
                });
            }

            tinymceInit();
        </script>
    @endpush
@endonce