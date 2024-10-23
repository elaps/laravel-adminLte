

<div class="editorjs" id="editorjs">
    1111
</div>

@assets
<script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/list@latest"></script>
@endassets

@script
<script>

    const editor = new EditorJS({
        holder: 'editorjs',
        tools: {
            list: {
                class: List,
                inlineToolbar: true
            }
        },
    })</script>
@endscript