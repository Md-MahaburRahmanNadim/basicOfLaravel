<h1>This is a view file inside of the blog folder</h1>
<a href={{ route('blog.index') }}>Blog</a>
<a href={{ route('blog.show',['id'=>1]) }}>show the specific blog</a>
<a href={{ route('blog.create') }}>show the blog create form</a>
<a href={{ route('blog.store') }}>save the form</a>
<a href={{ route('blog.edit',['id'=>1]) }}>edit the specific record or blog</a>
<a href={{ route('blog.update',['id'=>1]) }}>update</a>
<a href={{ route('blog.destory',['id'=>1]) }}>Delete</a>