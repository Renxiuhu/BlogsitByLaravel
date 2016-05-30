//博客列表和博客内容实现
1,创建数据表posts保存博客文章，并添加迁移
   php artisan make:model --migration Post
2，生成文章表
    php artisan migrate
3，通过数据库模型工厂和数据填充器给表填充数据
    php artisan db:seed
4，在config目录下新建blog的配置文件：blog.php.可以通过config()方法获取配置项
5，设置路由表
6，添加文章显示控制器
    php artisan make:controller BlogController [--plain]
7,添加视图文件：
    blog.index显示所有文章；
    blog.post显示某一篇文章
8，下载bootstrap css文件，用于支持分页切换样式
//============================================================================
