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
//博客后台管理系统实现
1，设置后台管理相关的路由：
    其中管理员功能需要在web中间件路由分组中，保证非管理员无法访问
    登录功能要在web中间件路由分组中，保证session等开启
2，修改登录相关跳转路由
    修改Authenticate中间件，如果没有登录跳转到登录页面
    修改auth控制器
        登录成功后跳转到管理员博客列表页面
        注销成功后跳转到登录页面
    修改RedirectIfAuthenticated中间件，自动登录跳转到管理员博客列表页面
3，创建第一步中路由中需要的控制器
	php artisan make:controller Admin\\PostController --resource
	php artisan make:controller Admin\\TagController --resource
	php artisan make:controller Admin\\UploadController
4，设置PostController index指向的页面，用于登录后跳转地址
5，创建视图
	主题模板，导航栏视图，登录视图，显示错误视图，管理员博客列表视图（暂不实现具体显示内容）
6，添加管理员用户，注意password需要经过bcrypt函数加密后保存