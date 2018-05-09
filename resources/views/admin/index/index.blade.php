@component('admin.public.header',['title'=>'成语后台'])
    @slot('css')

    @endslot
@endcomponent
<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
    <div id="wrapper">
        <!--左侧导航开始-->
    @component('admin/public/navbar')
    @endcomponent
        <!--左侧导航结束-->
        <!--右侧部分开始-->
    @component('admin/public/wrapper')
    @endcomponent
        <!--右侧部分结束-->
        <!--右侧边栏开始-->
    @component('admin/public/right_sidebar')
    @endcomponent
        <!--右侧边栏结束-->
        <!--mini聊天窗口开始-->

    </div>
@component('admin/public/footer')
    @slot('js')
        <script src="{{asset('admin/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
        <script src="{{asset('admin/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('admin/js/plugins/layer/layer.min.js')}}"></script>
        <script src="{{asset('admin/js/hplus.min.js?v=4.1.0')}}"></script>
        <script type="text/javascript" src="{{asset('admin/js/contabs.min.js')}}"></script>
        <script src="{{'admin/js/plugins/pace/pace.min.js'}}"></script>

    @endslot
@endcomponent