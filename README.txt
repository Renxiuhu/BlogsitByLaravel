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
8，下载bootstrap css文件，用于支持分页切换样式；
    jquery和bootstrap的js文件下载


//============================================================================
//博客后台管理系统实现
1，设置后台管理相关的路由：
    其中管理员功能需要在auth和web中间件路由分组中，保证非管理员无法访问
    登录功能要在web中间件路由分组中，保证session等功能开启
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

//==============================================================================
//小修改
1，修改博客列表和博客内容页面继承主题模板
2，修改注销成功后跳转到博客列表页面

//==============================================================================
//文件标签Tag查询的实现
1，创建tags表用于保存文章标签，同时添加迁移
    php artisan make:model --migration Tag
   创建tags与posts表之间的多对多关联关系表
    php artisan make:migration --create=post_tag_pivot create_post_tag_pivot
2，生成上述两个表
    php artisan migrate
3，实现admin.tag.index视图，同时修改tag控制器的index方法显示所有的tag标签
4, 创建admin.success视图，导入到admin.tag.index视图
5，下载DataTable插件的js和css文件，导入到admin.layout视图，使得tag显示表格功能增强

//===============================================================================
//修复路由问题
感悟：
    要想在多个页面判断登录成功，所有路由必须包含在session中间件中。
    最节省的方法，全部路由都放在web中间件中

//================================================================================
//文章标签tag创建保存的实现
1，设置创建tag页面默认显示的form项的值，在create方法中将设置的数据传递给视图
2，创建tag create视图，显示默认值
3，提取创建tag和修改tag时的视图布局样式，作为单独的视图文件，以便在修改tag视图时重用
4，创建request类，实现其中的验证方法，验证每个表单项是否符合要求
    php artisan make:request TagCreateRequest
5，实现控制器中store方法，保存tag，参数为第4步的request类，会自动检测

//================================================================================
//文章标签tag修改删除的实现
1，编辑tag控制器中edit方法，根据id获取指定行数据，传递给edit视图显示
2，创建edit对应的视图文件，保存form提交指向update方法
3，创建request类，实现其中的验证方法，验证每个表单项是否符合要求
    php artisan make:request TagUpdateRequest
4，实现update方法，request参数类型为之前创建的request验证类，更新数据
5，创建删除对话框视图
6，将删除对话框视图包含到tag.index视图，每一列添加删除按钮
7，实现控制器delete方法

//==============================================================================
//文章表和模型的修改
1，创建新的posts迁移文件，在原有基础上修改表的结构
    php artisan make:migration --table=posts restructure_posts_table
2，安装doctrine/dbal依赖包，运行迁移
	composer require "doctrine/dbal"
	php artisan migrate
3，修改post和tag模型，建立两者之间多对多关系

//==============================================================================
//admin文章表index显示
1，修改post控制器index，获取所有数据并显示
2，修改post.index视图，用表格显示

//==============================================================================
//admin博客文章的创建和保存
1,创建文件创建和更新的请求类，两个请求的验证时一样的，所以使用创建一个请求类即可
	php artisan make:request PostCrtOrUpRequest
2，修改post控制器create，传递默认form值给create视图
3，创建post.create视图，以及和update公用的form视图
4，下载Selectize（下拉列表优化） 和 Pickadate（日期时间选择）的js和css文件，导入到create视图中
5，修改store方法，使用第一步的请求类作为参数
6，修改blog路由下文章列表和内容显示，因为posts表列名字变了

//===============================================================================
//admin博客文章的修改和删除
1，创建确认删除对话框视图，导入到post.index中，在列表action中添加删除按钮
2，修改post控制器destory方法，删除指定的文章，并删除中间表中与tags的关联记录
3，创建edit试图，导入公共的form视图
4，修改post控制器edit方法，获取post的各个参数传递给视图显示
5，修改post控制器update方法，保存修改，并保存中间表内容

//================================================================================
//博客列表：根据标签过滤列表
1，创建一个独立的任务Job，用于将复杂逻辑从控制器中剔除
    php artisan make:job BlogIndexDataFilter
2，BlogIndexDataFilter取消实现ShouldQueue接口，不然会导致数据无法从Job传到controller
3，编辑Job handle方法，实现有标签则过滤显示该标签下的博客，无标签则显示全部博客
4，修改blog控制器index方法，调用job获取博客列表数据
5，修改blog.index视图，判断传入的数据为空时什么都不显示

//=================================================================================
//优化博客列表的显示
1，创建blog.js文件，复制clean blog开源项目中的代码实现tooltips，并且在用户滚动页面时导航条可以出现在顶端
   同时需要jquery的js文件支持
2，创建blog相关页面的主布局视图文件layout
3，创建blog.css文件，优化样式，会用到fontawesome/bootstrap/cleanblog/jquery的css文件，需要下载
3，创建blog的导航栏视图，显示内容仍然和admin的导航栏一样，多添加的是为了实现悬浮效果
4，创建blog的footer视图，仅包含一个copyright
5，修改blog的index视图，添加头部，修改列表显示和导航样式
6，在config/blog.php中添加index视图需要的配置项值

//==================================================================================
//优化博客内容详情的显示
1，修改blog.post视图，继承blog.layout布局视图

//==================================================================================
//bug 修复
1，修复在blog页面，logout下拉菜单无法显示问题
	引用js时jquery.js必须在bootstrap.js前面才能使dropdown生效
	
//==================================================================================
//contact us邮件发送功能实现（自己给自己发信息）
1，修改.env有关邮件的配置，修改config/mail.php相关配置
2，添加路由，指向邮件控制器
3，生成邮件控制器，实现get显示提交信息from和post发送邮件
	php artisan make:controller ContactController
4，实现请求验证类，对form项进行验证
	php artisan make:request ContactMeRequest
5，实现contact form视图和邮件内容视图

//==================================================================================
//修改blog列表页面跳转到详情页面不支持中文标题的bug

//==================================================================================
//修复Carbon::now()生成的时间与当前时间不一致的bug