# Laravel模板引擎Blade中section的一些标签的区别介绍

Laravel 框架中的 Blade 模板引擎，很好用，但是在官方文档中有关 Blade 的介绍并不详细，有些东西没有写出来，而有些则是没有说清楚。比如，使用中可能会遇到这样的问题：
1.@yield 和 @section 都可以预定义可替代的区块，这两者有什么区别呢？
2.@section 可以用 @show, @stop, @overwrite 以及 @append 来结束，这三者又有什么区别呢？
本文试对这些问题做一个比较浅显但是直观的介绍。

## @yield 与 @section
首先，@yield 是不可扩展的，如果你要定义的部分没有默认内容让子模板扩展的，那么用 @yield($name, $default) 的形式会比较方便，如果你在子模板中并没有指定这个区块的内容，它就会显示默认内容，如果定义了，就会显示你定义的内容。非此即彼。
与之相比， @section 则既可以被替代，又可以被扩展，这是最大的区别。比如：
复制代码 代码如下:
```html
{{-- layout.master --}}
@yield('title','默认标题') 
@section('content')
默认的内容
@show
```html
复制代码 代码如下:
```html
{{-- home.index --}}
@extends('layout.master')
 
@section('title')
  @parent
  新的标题
@stop
 
@section('content')
  @parent
  扩展的内容
@stop
```html
上面的例子中，模板用 @yield 和 @section 分别定义了一个区块，然后在子模板中去定义内容，由于 @yield 不能被扩展，所以即使加上了 @parent 也不起作用，输出的内容只有“新的标题”，替换了“默认的标题”。因此最终生成的页面只能是“默认的标题”或者“新的标题”，不能并存。而 @section 定义的部分，由于使用了 @parent 关键字，父模板中的内容会被保留，然后再扩展后添加的内容进去，输出的内容会是 “默认的内容 扩展的内容”。
官方网站上的文档中并没有涉及 @parent关键字，说的是默认行为是“扩展”，要覆盖需要用 @override 来结束，这是错的，[github 上的最新文档][docs] 已经做了修正。@section 加上 @stop，默认是替换（注入），必须用 @parent 关键字才能扩展。而@override 关键字实际上有另外的应用场景。

## @show 与 @stop
接下来再说说与 @section 对应的结束关键字，@show, @stop 有什么区别呢？（网上的部分文章，以及一些编辑器插件还会提示 @endsection, 这个在 4.0 版本中已经被移除，虽然向下兼容，但是不建议使用）。
@show 指的是执行到此处时将该 section 中的内容输出到页面，而 @stop 则只是进行内容解析，并且不再处理当前模板中后续对该section的处理，除非用 @override覆盖（详见下一部分）。通常来说，在首次定义某个 section 的时候，应该用 @show，而在替换它或者扩展它的时候，不应该用 @show，应该用 @stop。下面用例子说明：
复制代码 代码如下:
```html
{{-- layout.master --}}
<div id="zoneA">
  @section('zoneA')
      AAA
      @show
</div>
<div id="zoneB">
  @section('zoneB')
      BBB
      @stop 
</div>
<div id="zoneC">
  @section('zoneC')
      CCC
      @show 
</div>
```html
复制代码 代码如下:

```html
{{-- page.view --}}
@extends('layout.master')
 
@section('zoneA')
aaa
@stop
 
@section('zoneB')
bbb
@stop
 
@section('zoneC')
ccc
@show
```
在 layout.master 中，用 @stop 来结束 "zoneB"，由于整个模板体系中，没有以 @show 结束的 "zoneB" 的定义，因此这个区块不会被显示。而在 page.view 中，用 @show 定义了 'zoneC'，这会在执行到这里时立即显示内容，并按照模板继承机制继续覆盖内容，因此最终显示的内容会是：
复制代码 代码如下:
```html
ccc // 来自 page.view

<div class="zoneA">
  aaa   
</div>
<div class="zoneB">   
</div>
<div class="zoneC">
  ccc  
</div>
```
从结果可以看到，zoneB 的内容丢失，因为没有用 @show 告诉引擎输出这部分的内容，而 zoneC 的内容会显示两次，并且还破坏了 layout.master 的页面结构，因为 @show 出现了两次。

## @append 和 @override
刚才说到了，@override 并不是在子模板中指明内容替换父模板的默认内容，而是另有用途，那么是如何使用呢？这又涉及到一个 section 在模板中可以多次使用的问题。也即我们所定义的每一个 section ，在随后的子模板中其实是可以多次出现的。比如：
复制代码 代码如下:
```html
{{-- master --}}
<div>
  @yield('content')  
</div>
```
复制代码 代码如下:
```html
{{-- subview --}}
@extends('master')
 
@section('content')
加一行内容
@append
 
@section('content')
再加一行内容
@append
 
@section('content')
加够了，到此为止吧。
@stop
```
在上例中，我在父级模板中只定义了一个名为 "content" 的 section，而在子模板中三次指定了这个 section 的内容。 这个例子最终的输出是：
复制代码 代码如下:
```html
<div>
加一行内容
再加一行内容
加够了，到此为止吧。
</div>
```
三次指定的内容都显示出来了，关键就在于 @append 这个关键字，它表明“此处的内容添加到”，因此内容会不断扩展。而最后用了 @stop，表示这个 section 的处理到此为止。如果在后面继续用 @append 或者 @stop 来指定这个 section 的内容，都不会生效。除非用 @override 来处理。 @override 的意思就是“覆盖之前的所有定义，以这次的为准”。比如：
复制代码 代码如下:
```html
{{-- master --}}
<div>
    @yield('content')
    @yield('message')  
</div>
```
复制代码 代码如下:
```html
{{-- master --}}
<div>
  @section('content')
    加一行内容
    @append
    @section('content')
    再加一行内容
    @append
    @section('content')
    加够了，结束吧
    @stop
    @section('content')
    都不要了，我说的。
    @override
</div>
```
这个例子和刚才的类似，只不过最后加了一组定义。最终的输出会是：
复制代码 代码如下:
```html
<div>
  都不要了，我说的。
</div>
```
所以，在正式的项目中，有时候需要对数据进行遍历输出的，可以使用 @append，而如果遍历到了某个数据发现前面的都错了呢？用 @override 就可以全部推翻。