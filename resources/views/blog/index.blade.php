<h1>This is a view file inside of the blog folder</h1>
{{-- <a href={{ route('blog') }}>Blog</a> --}}
<a href={{ route('show',['id'=>1]) }}>Show single blog</a>
<a href={{ route('create') }}>show the form</a>
<a href={{ route('store') }}>store the data</a>
<a href={{ route('edit',['id'=>1]) }}>show the editing form</a>
<a href={{ route('update',['id'=>1]) }}>update</a>